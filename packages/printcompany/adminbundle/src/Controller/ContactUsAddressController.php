<?php

namespace PrintCompany\AdminBundle\Controller;

use App\ContactUsAddress;
use App\Department;
use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactUsAddressController extends Controller
{
    public function index()
    {

    }


    public function create(Request $request)
    {
        if($request->input('search')){
            $priority=ContactUsAddress::orWhere('name', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $priority=ContactUsAddress::paginate(Session::get('limitPagination'));
        }
        return view('admin::contactUs.createAddress',['data'=>$priority]);
    }


    public function store(Request $request)
    {
        try {
            $this->validate($request,['name'=>'required|min:2','address'=>'required|min:2']);
            $ContactUsAddress=new ContactUsAddress();
            $ContactUsAddress->name=$request->input('name');
            $ContactUsAddress->address=$request->input('address');
            $ContactUsAddress->lat_google=$request->input('lat_google');
            $ContactUsAddress->long_google=$request->input('long_google');
            $ContactUsAddress->save();
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


    public function show($id)
    {

    }


    public function edit(ContactUsAddress $id)
    {
        $createAddress=ContactUsAddress::paginate(Session::get('limitPagination'));
        return view('admin::contactUs.createAddress',['data'=>$createAddress,'createAddress'=>$id]);
    }


    public function update(Request $request,ContactUsAddress $id)
    {
        try {
            $ContactUsAddress=ContactUsAddress::find($id)->first();
            $ContactUsAddress->name=$request->input(['name']);
            $ContactUsAddress->address=$request->input(['address']);
            $ContactUsAddress->lat_google=$request->input('lat_google');
            $ContactUsAddress->long_google=$request->input('long_google');
            $ContactUsAddress->save();
            $request->session()->flash('success', Constants::TEXT_FOR_UPDATE_DATA);
            return redirect()->route('create_contact_us_address');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }


    }


    public function destroy($id)
    {
        try {
            $message="";
            $department=ContactUsAddress::find($id);
            if($department->isDelete==1){
                $department->isDelete=0;
                $message=Constants::TEXT_FOR_ACTIVE;
            }
            else{
                $department->isDelete=1;
                $message=Constants::TEXT_FOR_DEACTIVE;
            }

            $department->save();
            return redirect()->route('create_contact_us_address')->with('success', $message);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }
}
