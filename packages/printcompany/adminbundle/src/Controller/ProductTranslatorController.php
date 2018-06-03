<?php

namespace PrintCompany\AdminBundle\Controller;

use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use App\Priority;
use App\ProductCategory;
use App\ProductStatus;
use App\ProductTranslator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProductTranslatorController extends Controller
{
    public function index()
    {
        //
    }


    public function create(Request $request)
    {
        if($request->input('search')){
            $status=ProductTranslator::orWhere('title', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $status=ProductTranslator::paginate(Session::get('limitPagination'));
        }

        return view('admin::product.translator',['data'=>$status]);
    }


    public function store(Request $request)
    {
        try {
            $this->validate($request,['first_name'=>'required|min:2','last_name'=>'required|min:2']);
            $translator=new ProductTranslator();
            $translator->first_name=$request->input('first_name');
            $translator->last_name=$request->input('last_name');
            $translator->save();
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


    public function show(ProductTranslator $productCategory)
    {
        //
    }


    public function edit(ProductTranslator $id)
    {
        $status=ProductTranslator::paginate(Session::get('limitPagination'));
        return view('admin::product.translator',['data'=>$status,'translator'=>$id]);
    }


    public function update(Request $request, ProductTranslator $id)
    {
        try {
            $this->validate($request,['first_name'=>'required|min:2','last_name'=>'required|min:2']);
            $translator=ProductTranslator::find($id)->first();
            $translator->first_name=$request->input('first_name');
            $translator->last_name=$request->input('last_name');
            $translator->save();
            $request->session()->flash('success', Constants::TEXT_FOR_UPDATE_DATA);
            return redirect()->route('create_product_translator');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }


    public function destroy(ProductTranslator $id)
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
            return redirect()->route('create_product_translator')->with('success', $message);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }
}
