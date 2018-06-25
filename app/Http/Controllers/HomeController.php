<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends BaseController
{
    public function index(Request $request)
    {
        if($request->input('search')){
            $product=Product::IsEnable()->orWhere('name', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $product=Product::IsEnable()->paginate(Session::get('limitPagination'));
        }
        return view('welcome',compact('product'));
    }
}
