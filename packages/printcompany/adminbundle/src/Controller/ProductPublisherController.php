<?php

namespace PrintCompany\AdminBundle\Controller;

use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use App\Priority;
use App\ProductAuthor;
use App\ProductCategory;
use App\ProductPublisher;
use App\ProductStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductPublisherController extends Controller
{
    public function index()
    {
        //
    }


    public function create(Request $request)
    {
        if($request->input('search')){
            $publisher=ProductPublisher::orWhere('title', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $publisher=ProductPublisher::paginate(Session::get('limitPagination'));
        }

        return view('admin::product.publisher',['data'=>$publisher]);
    }


    public function store(Request $request)
    {
        try {
            $this->validate($request,['title'=>'required|min:2','address'=>'required|min:2','phone1'=>'required|min:2']);
            $author=new ProductPublisher();
            $author->title=$request->input('title');
            $author->address=$request->input('address');
            $author->phone1=$request->input('phone1');
            $author->phone2=$request->input('phone2');
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


    public function show(ProductPublisher $productCategory)
    {
        //
    }


    public function edit(ProductPublisher $id)
    {
        $publisher=ProductPublisher::paginate(Session::get('limitPagination'));
        return view('admin::product.publisher',['data'=>$publisher,'publisher'=>$id]);
    }


    public function update(Request $request, ProductPublisher $id)
    {
        try {
            $this->validate($request,['title'=>'required|min:2','address'=>'required|min:2','phone1'=>'required|min:2']);
            $author=ProductPublisher::find($id)->first();
            $author->title=$request->input('title');
            $author->address=$request->input('address');
            $author->phone1=$request->input('phone1');
            $author->phone2=$request->input('phone2');
            $author->save();
            $request->session()->flash('success', Constants::TEXT_FOR_UPDATE_DATA);
            return redirect()->route('create_product_publisher');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR.$ex->getMessage());
        }
    }


    public function destroy(ProductPublisher $id)
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
            return redirect()->route('create_product_publisher')->with('success', $message);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }
}
