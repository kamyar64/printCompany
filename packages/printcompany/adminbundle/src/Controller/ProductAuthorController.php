<?php

namespace PrintCompany\AdminBundle\Controller;

use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use App\Priority;
use App\ProductAuthor;
use App\ProductCategory;
use App\ProductStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductAuthorController extends Controller
{
    public function index()
    {
        //
    }


    public function create(Request $request)
    {
        if($request->input('search')){
            $status=ProductAuthor::orWhere('title', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $status=ProductAuthor::paginate(Session::get('limitPagination'));
        }

        return view('admin::product.author',['data'=>$status]);
    }


    public function store(Request $request)
    {
        try {
            $this->validate($request,['first_name'=>'required|min:2','last_name'=>'required|min:2']);
            $author=new ProductAuthor();
            $author->first_name=$request->input('first_name');
            $author->last_name=$request->input('last_name');
            $author->save();
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


    public function show(ProductAuthor $productCategory)
    {
        //
    }


    public function edit(ProductAuthor $id)
    {
        $status=ProductAuthor::paginate(Session::get('limitPagination'));
        return view('admin::product.author',['data'=>$status,'author'=>$id]);
    }


    public function update(Request $request, ProductAuthor $id)
    {
        try {
            $this->validate($request,['first_name'=>'required|min:2','last_name'=>'required|min:2']);
            $author=ProductAuthor::find($id)->first();
            $author->first_name=$request->input('first_name');
            $author->last_name=$request->input('last_name');
            $author->save();
            $request->session()->flash('success', Constants::TEXT_FOR_UPDATE_DATA);
            return redirect()->route('create_product_author');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }


    public function destroy(ProductAuthor $id)
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
            return redirect()->route('create_product_author')->with('success', $message);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }
}
