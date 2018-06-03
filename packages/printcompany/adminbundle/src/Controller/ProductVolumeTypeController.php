<?php

namespace PrintCompany\AdminBundle\Controller;

use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use App\Priority;
use App\ProductCategory;
use App\ProductVolumeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductVolumeTypeController extends Controller
{
    public function index()
    {
        //
    }


    public function create(Request $request)
    {
        if($request->input('search')){
            $volume=ProductVolumeType::orWhere('title', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $volume=ProductVolumeType::paginate(Session::get('limitPagination'));
        }

        return view('admin::product.volumeType',['data'=>$volume]);
    }


    public function store(Request $request)
    {
        try {
            $this->validate($request,['title'=>'required|min:2']);
            $volume=new ProductVolumeType();
            $volume->title=$request->input('title');
            $volume->save();
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


    public function show(ProductVolumeType $productCategory)
    {
        //
    }


    public function edit(ProductVolumeType $id)
    {
        $volume=ProductVolumeType::paginate(Session::get('limitPagination'));
        return view('admin::product.volumeType',['data'=>$volume,'volume'=>$id]);
    }


    public function update(Request $request, ProductVolumeType $id)
    {
        try {
            $volume=ProductVolumeType::find($id)->first();
            $volume->title=$request->input(['title']);
            $volume->save();
            $request->session()->flash('success', Constants::TEXT_FOR_UPDATE_DATA);
            return redirect()->route('create_product_volume_type');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }


    public function destroy(ProductVolumeType $id)
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
            return redirect()->route('create_product_volume_type')->with('success', $message);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }
}
