<?php

namespace PrintCompany\AdminBundle\Controller;

use App\ContactUsTellAndEmail;
use App\Department;
use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactUsTellAndEmailController extends Controller
{
    public function index()
    {

    }


    public function create(Request $request)
    {
        if($request->input('search')){
            $contact=ContactUsTellAndEmail::orWhere('name', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $contact=ContactUsTellAndEmail::paginate(Session::get('limitPagination'));
        }
        return view('admin::contactUs.createTellEmail',['data'=>$contact]);
    }


    public function store(Request $request)
    {
        try {
            $this->validate($request,['name'=>'required|min:2','value'=>'required|min:2','type'=>'required']);
            $ContactUsTellAndEmail=new ContactUsTellAndEmail();
            $ContactUsTellAndEmail->name=$request->input('name');
            $ContactUsTellAndEmail->value=$request->input('value');
            $ContactUsTellAndEmail->type=$request->input('type');
            $ContactUsTellAndEmail->save();
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


    public function edit(ContactUsTellAndEmail $id)
    {
        $ContactUsTellAndEmail=ContactUsTellAndEmail::paginate(Session::get('limitPagination'));
        return view('admin::contactUs.createTellEmail',['data'=>$ContactUsTellAndEmail,'ContactUsTellAndEmail'=>$id]);
    }


    public function update(Request $request,ContactUsTellAndEmail $id)
    {
        try {
            $this->validate($request,['name'=>'required|min:2','value'=>'required|min:2','type'=>'required']);
            $ContactUsTellAndEmail=ContactUsTellAndEmail::find($id)->first();
            $ContactUsTellAndEmail->name=$request->input(['name']);
            $ContactUsTellAndEmail->value=$request->input(['value']);
            $ContactUsTellAndEmail->type=$request->input(['type']);
            $ContactUsTellAndEmail->save();
            $request->session()->flash('success', Constants::TEXT_FOR_UPDATE_DATA);
            return redirect()->route('create_contact_us_tell_email');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }


    }


    public function destroy($id)
    {
        try {
            $message="";
            $department=ContactUsTellAndEmail::find($id);
            if($department->isDelete==1){
                $department->isDelete=0;
                $message=Constants::TEXT_FOR_ACTIVE;
            }
            else{
                $department->isDelete=1;
                $message=Constants::TEXT_FOR_DEACTIVE;
            }

            $department->save();
            return redirect()->route('create_contact_us_tell_email')->with('success', $message);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }
}
