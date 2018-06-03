<?php

namespace PrintCompany\AdminBundle\Controller;

use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use App\Priority;
use App\ProductCategory;
use App\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class ProductSizeController extends Controller
{


    public function create(Request $request)
    {
        if($request->input('search')){
            $category=ProductSize::orWhere('title', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $category=ProductSize::paginate(Session::get('limitPagination'));
        }

        return view('admin::product.size',['data'=>$category]);
    }


    public function store(Request $request)
    {
        try {
            $this->validate($request,['title'=>'required|min:2']);
            $product=new ProductSize();
            $product->title=$request->input('title');
            $product->save();
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


    public function show(ProductSize $productCategory)
    {
        //
    }


    public function edit(ProductSize $id)
    {
        $category=ProductSize::paginate(Session::get('limitPagination'));
        return view('admin::product.size',['data'=>$category,'size'=>$id]);
    }


    public function update(Request $request, ProductSize $id)
    {
        try {
            $product=ProductSize::find($id)->first();
            $product->title=$request->input(['title']);
            $product->save();
            $request->session()->flash('success', Constants::TEXT_FOR_UPDATE_DATA);
            return redirect()->route('create_product_size');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }


    public function destroy(ProductSize $id)
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
            return redirect()->route('create_product_size')->with('success', $message);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }
}
