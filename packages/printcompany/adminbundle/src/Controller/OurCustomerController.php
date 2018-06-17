<?php

namespace PrintCompany\AdminBundle\Controller;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use App\News;
use App\NewsGroup;
use App\OurCustomer;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Session;
class OurCustomerController extends Controller
{
    private function uploadAttachment($file, $oldFile = '')
    {

        if (!$file || !$file instanceof UploadedFile) {
            return $oldFile;
        }
        if ($oldFile) {
            @unlink(public_path().'/images/our-customers/'  . $oldFile);
        }
        $fileName = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();

        if (strpos($file->getMimeType(), 'image') !== false) {
            $fileName .= '.jpg';
            Helper::convertImageToJPG($file, public_path().'/images/our-customers/'  . $fileName, 100);
        } else {
            $file->move(public_path().'/images/our-customers/', $fileName);
        }
        return $fileName;
    }


    public function create(Request $request)
    {
        if($request->input('search')){
            $priority=OurCustomer::orWhere('title', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $priority=OurCustomer::paginate(Session::get('limitPagination'));
        }

        return view('admin::ourcustomers.create',['data'=>$priority]);
    }


    public function store(Request $request)
    {
        try {
            $this->validate($request,['title'=>'required|min:2']);
            $customers=new OurCustomer();
            $customers->title=$request->input('title');
            $customers->siteAddress=$request->input('siteAddress');
            $file = $request->file('logo');
            $customers->logo= $this->uploadAttachment($file);
            $customers->save();
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



    public function edit(OurCustomer $id)
    {
        $OurCustomer=OurCustomer::paginate(Session::get('limitPagination'));
        return view('admin::ourcustomers.create',['data'=>$OurCustomer,'customers'=>$id]);
    }


    public function update(Request $request,OurCustomer $id)
    {
        try {
            $customers=OurCustomer::find($id)->first();
            $customers->title=$request->input('title');
            $customers->siteAddress=$request->input('siteAddress');
            $file = $request->file('logo');
            $customers->logo= $this->uploadAttachment($file,$customers->logo);
            $customers->save();
            $request->session()->flash('success', Constants::TEXT_FOR_UPDATE_DATA);
            return redirect()->route('create_customer');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }


    }


    public function destroy($id)
    {
        try {
            $message="";
            $priority=OurCustomer::find($id);
            if($priority->isDelete==1){
                $priority->isDelete=0;
                $message=Constants::TEXT_FOR_ACTIVE;
            }
            else{
                $priority->isDelete=1;
                $message=Constants::TEXT_FOR_DEACTIVE;
            }

            $priority->save();
            return redirect()->route('create_customer')->with('success', $message);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }
}
