<?php

namespace PrintCompany\AdminBundle\Controller;

use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use App\Priority;
use App\ProductCategory;
use App\ProductLanguage;
use App\ProductWeightUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductWeightUnitController extends Controller
{
    public function index()
    {
        //
    }


    public function create(Request $request)
    {
        if($request->input('search')){
            $weight=ProductWeightUnit::orWhere('title', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $weight=ProductWeightUnit::paginate(Session::get('limitPagination'));
        }

        return view('admin::product.weight',['data'=>$weight]);
    }


    public function store(Request $request)
    {
        try {
            $this->validate($request,['title'=>'required|min:2']);
            $weight=new ProductWeightUnit();
            $weight->title=$request->input('title');
            $weight->save();
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


    public function show(ProductWeightUnit $productCategory)
    {
        //
    }


    public function edit(ProductWeightUnit $id)
    {
        $weight=ProductWeightUnit::paginate(Session::get('limitPagination'));
        return view('admin::product.weight',['data'=>$weight,'weight'=>$id]);
    }


    public function update(Request $request, ProductWeightUnit $id)
    {
        try {
            $weight=ProductWeightUnit::find($id)->first();
            $weight->title=$request->input(['title']);
            $weight->save();
            $request->session()->flash('success', Constants::TEXT_FOR_UPDATE_DATA);
            return redirect()->route('create_product_weight');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }


    public function destroy(ProductWeightUnit $id)
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
            return redirect()->route('create_product_weight')->with('success', $message);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }
}
