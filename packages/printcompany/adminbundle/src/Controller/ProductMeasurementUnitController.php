<?php

namespace PrintCompany\AdminBundle\Controller;

use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use App\Priority;
use App\ProductCategory;
use App\ProductLanguage;
use App\ProductMeasurementUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductMeasurementUnitController extends Controller
{
    public function index()
    {
        //
    }


    public function create(Request $request)
    {
        if($request->input('search')){
            $measure=ProductMeasurementUnit::orWhere('title', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $measure=ProductMeasurementUnit::paginate(Session::get('limitPagination'));
        }

        return view('admin::product.measure',['data'=>$measure]);
    }


    public function store(Request $request)
    {
        try {
            $this->validate($request,['title'=>'required|min:2']);
            $measure=new ProductMeasurementUnit();
            $measure->title=$request->input('title');
            $measure->save();
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


    public function edit(ProductMeasurementUnit $id)
    {
        $measure=ProductMeasurementUnit::paginate(Session::get('limitPagination'));
        return view('admin::product.measure',['data'=>$measure,'measure'=>$id]);
    }


    public function update(Request $request, ProductMeasurementUnit $id)
    {
        try {
            $measure=ProductMeasurementUnit::find($id)->first();
            $measure->title=$request->input(['title']);
            $measure->save();
            $request->session()->flash('success', Constants::TEXT_FOR_UPDATE_DATA);
            return redirect()->route('create_product_measure');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }


    public function destroy(ProductMeasurementUnit $id)
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
            return redirect()->route('create_product_measure')->with('success', $message);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }
}
