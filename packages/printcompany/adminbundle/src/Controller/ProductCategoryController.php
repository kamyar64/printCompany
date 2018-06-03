<?php

namespace PrintCompany\AdminBundle\Controller;

use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use App\Priority;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductCategoryController extends Controller
{

    public function index()
    {
        //
    }


    public function create(Request $request)
    {
        if($request->input('search')){
            $category=ProductCategory::orWhere('title', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $category=ProductCategory::paginate(Session::get('limitPagination'));
        }

        return view('admin::product.category',['data'=>$category]);
    }


    public function store(Request $request)
    {
        try {
            $this->validate($request,['title'=>'required|min:2']);
            $category=new ProductCategory();
            $category->title=$request->input('title');
            $category->save();
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


    public function show(ProductCategory $productCategory)
    {
        //
    }


    public function edit(ProductCategory $id)
    {
        $category=ProductCategory::paginate(Session::get('limitPagination'));
        return view('admin::product.category',['data'=>$category,'category'=>$id]);
    }


    public function update(Request $request, ProductCategory $id)
    {
        try {
            $category=ProductCategory::find($id)->first();
            $category->title=$request->input(['title']);
            $category->save();
            $request->session()->flash('success', Constants::TEXT_FOR_UPDATE_DATA);
            return redirect()->route('create_category');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }


    public function destroy(ProductCategory $id)
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
            return redirect()->route('create_category')->with('success', $message);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }
}
