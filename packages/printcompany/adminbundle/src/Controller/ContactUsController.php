<?php

namespace PrintCompany\AdminBundle\Controller;

use App\ContactUs;
use App\ContactUsAddress;
use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactUsController extends Controller
{

    public function create(Request $request)
    {
        $address= new ContactUsAddress();
        $address=$address->IsEnable()->get();
        $ContactUs=ContactUs::first();
        return view('admin::contactUs.create',['ContactUs'=>$ContactUs,'address'=>$address]);
    }


    public function store(Request $request)
    {
        try {
                $ContactUs=ContactUs::first();
            if(!$ContactUs)
                $ContactUs=new ContactUs();
            $this->validate($request,['Description'=>'required|min:2','main_address'=>'required']);
            $ContactUs->Description=$request->input('Description');
            $ContactUs->main_address=$request->input('main_address');
            $ContactUs->save();
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




    public function edit(ContactUs $id)
    {
        $ContactUs=ContactUs::paginate(Session::get('limitPagination'));
        return view('admin::contactUs.create',['data'=>$ContactUs,'ContactUs'=>$id]);
    }


    public function update(Request $request,ContactUs $id)
    {
        try {
            $this->validate($request,['Description'=>'required|min:2','main_address'=>'required']);
            $ContactUs=ContactUs::find($id)->first();
            $ContactUs->Description=$request->input(['Description']);
            $ContactUs->main_address=$request->input('main_address');
            $ContactUs->save();
            $request->session()->flash('success', Constants::TEXT_FOR_UPDATE_DATA);
            return redirect()->route('create_contact_us');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }


    }

}
