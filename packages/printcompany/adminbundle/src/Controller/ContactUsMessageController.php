<?php

namespace PrintCompany\AdminBundle\Controller;

namespace PrintCompany\AdminBundle\Controller;

use App\ContactUsMessage;
use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use App\Priority;
use App\ProductCategory;
use App\ProductLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ContactUsMessageController extends Controller
{
    public function show(Request $request)
    {
         if($request->input('search')){
             $contact_us_messages=ContactUsMessage::where('isDelete',false)->orWhere('name', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
             $contact_us_messages=ContactUsMessage::where('isDelete',false)->paginate(Session::get('limitPagination'));
        }
        return view('admin::contactUs/contactUsMessages',['data'=>$contact_us_messages]);
    }

    public function index(ContactUsMessage $id)
    {
        $id->isRead=true;
        $id->save();
        return view('admin::contactUs/showContactUsMessage',["data"=>$id]);
    }

    public function destroy($id)
    {
        try {
            $message="";
            $department=ContactUsMessage::find($id);
            if($department->isDelete==1){
                $department->isDelete=0;
                $message=Constants::TEXT_FOR_ACTIVE;
            }
            else{
                $department->isDelete=1;
                $message=Constants::TEXT_FOR_DEACTIVE;
            }

            $department->save();
            return redirect()->route('contact_us_messages_read')->with('success', $message);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }
}
