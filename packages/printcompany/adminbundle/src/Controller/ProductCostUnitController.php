<?php

namespace PrintCompany\AdminBundle\Controller;

use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use App\Priority;
use App\ProductCategory;
use App\ProductCostUnit;
use App\ProductLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductCostUnitController extends Controller
{
    public function index()
    {
        //
    }


    public function create(Request $request)
    {
        if($request->input('search')){
            $costUnit=ProductCostUnit::orWhere('title', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $costUnit=ProductCostUnit::paginate(Session::get('limitPagination'));
        }

        return view('admin::product.costUnit',['data'=>$costUnit]);
    }


    public function store(Request $request)
    {
        try {
            $this->validate($request,['title'=>'required|min:2']);
            $costUnit=new ProductCostUnit();
            $costUnit->title=$request->input('title');
            $costUnit->save();
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


    public function show(ProductLanguage $productCategory)
    {
        //
    }


    public function edit(ProductCostUnit $id)
    {
        $costUnit=ProductCostUnit::paginate(Session::get('limitPagination'));
        return view('admin::product.costUnit',['data'=>$costUnit,'costUnit'=>$id]);
    }


    public function update(Request $request, ProductCostUnit $id)
    {
        try {
            $costUnit=ProductCostUnit::find($id)->first();
            $costUnit->title=$request->input(['title']);
            $costUnit->save();
            $request->session()->flash('success', Constants::TEXT_FOR_UPDATE_DATA);
            return redirect()->route('create_product_costUnit');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }


    public function destroy(ProductCostUnit $id)
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
            return redirect()->route('create_product_costUnit')->with('success', $message);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }
}
