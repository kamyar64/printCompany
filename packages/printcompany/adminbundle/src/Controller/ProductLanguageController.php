<?php

namespace PrintCompany\AdminBundle\Controller;

use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use App\Priority;
use App\ProductCategory;
use App\ProductLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductLanguageController extends Controller
{
    public function index()
    {
        //
    }


    public function create(Request $request)
    {
        if($request->input('search')){
            $language=ProductLanguage::orWhere('title', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $language=ProductLanguage::paginate(Session::get('limitPagination'));
        }

        return view('admin::product.language',['data'=>$language]);
    }


    public function store(Request $request)
    {
        try {
            $this->validate($request,['title'=>'required|min:2']);
            $language=new ProductLanguage();
            $language->title=$request->input('title');
            $language->save();
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


    public function edit(ProductLanguage $id)
    {
        $language=ProductLanguage::paginate(Session::get('limitPagination'));
        return view('admin::product.language',['data'=>$language,'language'=>$id]);
    }


    public function update(Request $request, ProductLanguage $id)
    {
        try {
            $language=ProductLanguage::find($id)->first();
            $language->title=$request->input(['title']);
            $language->save();
            $request->session()->flash('success', Constants::TEXT_FOR_UPDATE_DATA);
            return redirect()->route('create_product_language');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }


    public function destroy(ProductLanguage $id)
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
            return redirect()->route('create_product_language')->with('success', $message);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }
}
