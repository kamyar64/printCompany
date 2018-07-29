<?php

namespace PrintCompany\AdminBundle\Controller;

use App\ContactUs;
use App\ContactUsAddress;
use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use App\SocialNetworks;
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






    //for SocialNetwork





    public function createSocialNetwork(Request $request)
    {
        if($request->input('search')){
            $priority=SocialNetworks::orWhere('name', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $priority=SocialNetworks::paginate(Session::get('limitPagination'));
        }
        return view('admin::contactUs.createSocialNetwork',['data'=>$priority]);
    }


    public function storeSocialNetwork(Request $request)
    {
        try {
            $this->validate($request,['name'=>'required|min:2','url'=>'required|min:2','icon'=>'required|min:2']);
            $socialNetwork=new SocialNetworks();
            $socialNetwork->name=$request->input('name');
            $socialNetwork->url=$request->input('url');
            $socialNetwork->icon=$request->input('icon');
            $socialNetwork->save();
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



    public function editSocialNetwork(SocialNetworks $id)
    {
        $SocialNetworks=SocialNetworks::paginate(Session::get('limitPagination'));
        return view('admin::contactUs.createSocialNetwork',['data'=>$SocialNetworks,'createSocailNetwork'=>$id]);
    }


    public function updateSocialNetwork(Request $request,SocialNetworks $id)
    {
        try {
            $socialNetwork=SocialNetworks::find($id)->first();
            $socialNetwork->name=$request->input('name');
            $socialNetwork->url=$request->input('url');
            $socialNetwork->icon=$request->input('icon');
            $socialNetwork->save();
            $request->session()->flash('success', Constants::TEXT_FOR_UPDATE_DATA);
            return redirect()->route('create_social_network');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }


    }


    public function destroySocialNetwork($id)
    {
        try {
            $message="";
            $social=SocialNetworks::find($id);
            if($social->isDelete==1){
                $social->isDelete=0;
                $message=Constants::TEXT_FOR_ACTIVE;
            }
            else{
                $social->isDelete=1;
                $message=Constants::TEXT_FOR_DEACTIVE;
            }

            $social->save();
            return redirect()->route('create_social_network')->with('success', $message);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }
}
