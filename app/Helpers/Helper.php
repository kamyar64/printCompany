<?php
namespace App\Helpers;


use App\Libraries\JalaliDate;
use DateTime;

class Helper

{


    public static function convertToEnglishDigit($string) {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);
        return $englishNumbersOnly;
    }
    public static function convertToPersianDigit($string) {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($num,$persian , $string);
        $englishNumbersOnly = str_replace($num,$arabic , $convertedPersianNums);
        return $englishNumbersOnly;
    }
    public static function validateDate($date, $format = 'Y/m/d')
    {
        $d = DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }
    public static  function getDateFromShamsiDate($shamsiDate)
    {
        if (!$shamsiDate) {
            return null;
        }

        if(Helper::validateDate($shamsiDate))
            return $shamsiDate;

        $datePieces = explode('/', $shamsiDate);
        return new \DateTime(implode('-', JalaliDate::JalaliToGregorian(Helper::convertToEnglishDigit($datePieces[0]), Helper::convertToEnglishDigit($datePieces[1]), Helper::convertToEnglishDigit($datePieces[2]))));
    }

    public static function convertImageToJPG($originalImage, $outputImage, $quality)
    {

        if (strpos($originalImage->getMimeType(), 'jpg') || strpos($originalImage->getMimeType(), 'jpeg'))
            $imageTmp=imagecreatefromjpeg($originalImage);
        else if (strpos($originalImage->getMimeType(), 'png'))
            $imageTmp=imagecreatefrompng($originalImage);
        else if (strpos($originalImage->getMimeType(), 'gif'))
            $imageTmp=imagecreatefromgif($originalImage);
        else
            return false;

        imagejpeg($imageTmp, $outputImage, $quality);
        imagedestroy($imageTmp);

        return true;
    }

    public static function jDateFromDateTimeWithDayName($date)
    {
        if(gettype ($date)=='string')
            $date = new DateTime($date);
        return Helper::convertToPersianDigit(JalaliDate::jDateFromDateTime('Y/n/j', $date));
    }
}
