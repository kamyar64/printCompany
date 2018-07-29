<?php

namespace App\Http\Controllers;

use App\ContactUs;
use App\ContactUsAddress;
use App\ContactUsMessage;
use App\ContactUsTellAndEmail;
use App\Libraries\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Validator;

class ContactUsMessageController extends BaseController
{
    public function save(Request $request)
    {
        $InputData = [
            'name' =>$request->get('name'),
            'mobile' =>$request->get('mobile'),
            'subject' =>$request->get('subject'),
            'message' =>$request->get('message'),
            'email'=>$request->get('email')];

        $validation = Validator::make( $InputData,array('name'=>'required','email'=>'required|email'
        ,'mobile'=>'required|regex:/(01)[0-9]{9}/','subject'=>'required','message'=>'required'));
        if ($validation->fails()) {
            $response = array(
                'status' => 'error',
                'msg' => $validation->errors()->first(),
            );
            return response()->json($response);
        }


        $response='';
        $contactus=new ContactUsMessage();
        $contactus->name=(Input::get('name'));
        $contactus->email=(Input::get('email'));
        $contactus->mobile=(Input::get('mobile'));
        $contactus->subject=(Input::get('subject'));
        $contactus->message=(Input::get('message'));
        if($contactus->save()){
            $response = array(
                'status' => 'success',
                'msg' => Constants::CONTACT_US_MESSAGE,
            );
        }
        else{
            $response = array(
                'status' => 'error',
                'msg' => Constants::CONTACT_US_MESSAGE_ERROR,
            );
        }
        return Response::json($response);
    }
    public function contactUs()
    {


        $allAdress=new ContactUsAddress();
        $allAdress=$allAdress->IsEnable()->get();
        $currentGoogleMap=new ContactUs();
        $currentGoogleMap=$currentGoogleMap->first();
        $allTellAndEmail=new ContactUsTellAndEmail();
        $allEmail=$allTellAndEmail->IsEmail()->get()->all();
        $allTell=$allTellAndEmail->IsTell()->get()->all();
        $Data = [
            'all_address' => $allAdress,
            'all_phone' => $allTell,
            'all_email' => $allEmail,
            'google_map'=>$currentGoogleMap
        ];
        return view('contactus',['data'=>$Data]);
    }
}
