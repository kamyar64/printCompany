<?php

namespace PrintCompany\AdminBundle\Controller;

use App\Department;
use App\Helpers\Helper;
use App\Libraries\Constants;
use App\Libraries\JalaliDate;
use App\News;
use App\NewsGroup;
use App\Priority;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{

    public function index(Request $request)
    {
        if($request->input('search')){
            $news=News::orWhere('title', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $news=News::paginate(Session::get('limitPagination'));
        }
        return view('admin::news.show',['news'=>$news]);
    }


    public function create()
    {

        $department= new Department();
        $all_department=$department->IsEnable()->get();

        $newsGroup= new NewsGroup();
        $all_news_group=$newsGroup->IsEnable()->get();

        $priority= new Priority();
        $all_priority=$priority->IsEnable()->get();


      return view('admin::news/create',['all_department'=>$all_department,'all_news_group'=>$all_news_group,'all_priority'=>$all_priority]);
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request,[
                'picture' => 'required|mimes:jpg,jpeg,png,bmp,tiff |max:4096',
                'title'=>'required|min:10',
                'body'=>'required|min:50',
                'date_published'=>'required',
                'date_expired'=>'required',
                'abstract'=>'required']);
            $file = $request->file('picture');
            $news=new News();
            $news->title=$request->input('title');
            $news->body=$request->input('body');
            $news->abstract=$request->input('abstract');
            $news->news_group=$request->input('news_group');
            $news->news_priority=$request->input('news_priority');
            $news->department=$request->input('departments');
            $news->is_archive=0;
            $news->is_expire=0;
            $news->key_words=$request->input('key_words');
            $news->reference=$request->input('reference');
            $news->news_user_insert=Auth::user()->getAuthIdentifier();
            $news->date_published=Helper::getDateFromShamsiDate($request->input('date_published'));
            $news->date_expired=Helper::getDateFromShamsiDate($request->input('date_expired'));
            $news->picture= $this->uploadAttachment($file);
            $news->save();
            return  redirect()->back()->with('success', Constants::TEXT_FOR_CREATE_DATA);
        } catch (\Illuminate\Database\QueryException $ex) {
            $errorCode = $ex->errorInfo[1];
            if($errorCode == '1062'){
                return redirect()->back()
                    ->with('error',Constants::TEXT_FOR_DUPLICATE_DATA );
            }
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR.$ex->getMessage() );
        }
    }


    public function show(News $news)
    {

    }


    public function edit(News $news)
    {

    }


    public function update(Request $request, News $news)
    {

    }


    public function destroy(News $news)
    {

    }



    private function uploadAttachment($file, $oldFile = '')
    {

        if (!$file || !$file instanceof UploadedFile) {
            return $oldFile;
        }
        if ($oldFile) {
            @unlink(public_path().'/images/news-images/'  . $oldFile);
        }
        $fileName = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();

        if (strpos($file->getMimeType(), 'image') !== false) {
            $fileName .= '.jpg';
            Helper::convertImageToJPG($file, public_path().'/images/news-images/'  . $fileName, 100);
        } else {
            $file->move(public_path().'/images/news-images/', $fileName);
        }
        return $fileName;
    }

}
