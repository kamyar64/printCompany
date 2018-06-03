<?php

namespace PrintCompany\AdminBundle\Controller;

use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use App\Priority;
use App\ProductCategory;
use App\ProductStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProductStatusController extends Controller
{

    public function index()
    {
        //
    }


    public function create(Request $request)
    {
        if($request->input('search')){
            $status=ProductStatus::orWhere('title', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $status=ProductStatus::paginate(Session::get('limitPagination'));
        }

        return view('admin::product.status',['data'=>$status]);
    }


    public function store(Request $request)
    {
        try {
            $this->validate($request,['title'=>'required|min:2']);
            $status=new ProductStatus();
            $status->title=$request->input('title');
            $status->save();
            return  redirect()->back()->with('success', Constants::TEXT_FOR_CREATE_DATA);
        } catch (\Illuminate\Database\QueryException $ex) {
            $errorCode = $ex->errorInfo[1];
            if($errorCode == '1062'){
                return redirect()->back()
                    ->with('error',Constants::TEXT_FOR_DUPLICATE_DATA );
            }
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR );
        }
    }


    public function show(ProductStatus $productCategory)
    {
        //
    }


    public function edit(ProductStatus $id)
    {
        $status=ProductStatus::paginate(Session::get('limitPagination'));
        return view('admin::product.status',['data'=>$status,'status'=>$id]);
    }


    public function update(Request $request, ProductStatus $id)
    {
        try {
            $status=ProductStatus::find($id)->first();
            $status->title=$request->input(['title']);
            $status->save();
            $request->session()->flash('success', Constants::TEXT_FOR_UPDATE_DATA);
            return redirect()->route('create_product_status');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }


    public function destroy(ProductStatus $id)
    {
        try {
            $message="";
            if($id->isDelete==1){
                $id->isDelete=0;
                $message=Constants::TEXT_FOR_ACTIVE;
            }
            else{
                $id->isDelete=1;
                $message=Constants::TEXT_FOR_DEACTIVE;
            }

            $id->save();
            return redirect()->route('create_product_status')->with('success', $message);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }
}
