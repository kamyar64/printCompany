<?php

namespace App\Http\Controllers;

use App\Libraries\Constants;
use App\Product;
use App\ProductCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends BaseController
{
    public function index(Request $request,$slug=null)
    {

        if($slug){
            $slug=ProductCategory::where('slug',$slug)->first();
            $slug=$slug->id;
        }
        if($request->input('search')){
            $product=Product::IsEnable()->Category($slug)->orWhere('title', 'like', '%' . $request->input('search') . '%')->orderBy('created_at','desc')->paginate(Session::get('limitPagination'));
        }else{
            $product=Product::IsEnable()->Category($slug)->orderBy('created_at','desc')->paginate(Session::get('limitPagination'));
        }

        return view('welcome',compact('product'));
    }
    public function product(Request $request,$slug)
    {

        $product=Product::IsEnable()->orderBy('slug',$slug)->first();
        return view('product',compact('product'));
    }
    public function save($slug)
    {
        $product=Product::IsEnable()->where('slug',$slug)->first();
        Cart::add($product->id, $product->title, 1, $product->price, ['price_unit' => $product->CostUnit->title]);
        //dd(Cart::content());
        return  redirect()->back()->with('add_to_cart_with_success', Constants::TEXT_FOR_ADD_TO_CART);
    }

    public function findCartId($id)
    {
        $cart=Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });
        return $cart;
    }
    public function destroy($id)
    {
        try {

            (Cart::remove($id));
            return  redirect()->back()->with('remove_from_cart_with_success', Constants::TEXT_FOR_REMOVE_FROM_CART);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }
}
