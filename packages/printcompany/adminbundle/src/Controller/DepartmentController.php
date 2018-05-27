<?php

namespace PrintCompany\AdminBundle\Controller;

use App\Department;
use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{
    public function index()
    {

    }


    public function create(Request $request)
    {
        if($request->input('search')){
            $priority=Department::orWhere('title', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $priority=Department::paginate(Session::get('limitPagination'));
        }
        return view('admin::department/create',['data'=>$priority]);
    }


    public function store(Request $request)
    {
        try {
            $this->validate($request,['title'=>'required|min:2']);
            $department=new Department();
            $department->title=$request->input('title');
            $department->save();
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


    public function edit(Department $id)
    {
        $priority=Department::paginate(Session::get('limitPagination'));
        return view('admin::department/create',['data'=>$priority,'priority'=>$id]);
    }


    public function update(Request $request,Department $id)
    {
        try {
            $department=Department::find($id)->first();
            $department->title=$request->input(['title']);
            $department->save();
            $request->session()->flash('success', Constants::TEXT_FOR_UPDATE_DATA);
            return redirect()->route('create_department');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }


    }


    public function destroy($id)
    {
        try {
            $message="";
            $department=Department::find($id);
            if($department->isDelete==1){
                $department->isDelete=0;
                $message=Constants::TEXT_FOR_ACTIVE;
            }
            else{
                $department->isDelete=1;
                $message=Constants::TEXT_FOR_DEACTIVE;
            }

            $department->save();
            return redirect()->route('create_department')->with('success', $message);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }
}
