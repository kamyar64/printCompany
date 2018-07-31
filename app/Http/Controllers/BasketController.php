<?php

namespace App\Http\Controllers;

use App\Libraries\Constants;
use App\Orders;
use App\ProductsOrder;
use App\User;
use App\UsersAddresses;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class BasketController extends BaseController
{
    public function showBasket(Request $request)
    {
        if(Cart::count()>0){
            if($request->get('product')){
                foreach($request->get('product') as $item=>$value) {
                    Cart::update($item, $value);
                }
            }

            return view('showBasket');
        }
        else
            abort(404);


    }


    public function showAddresses(Request $request)
    {
        if(Cart::count()>0){
        $Address=UsersAddresses::IsEnable()->where('user_id','=',Auth::id())->orderBy('default','1')->orderBy('created_at','DESC')->get();
        return view('showAddresses',['address'=>$Address]);
        }
        else
            abort(404);
    }
    public function saveAddresses(Request $request)
    {

        try {
            $this->validate($request, [
                'name' => 'required|min:2',
                'family' => 'required|min:2',
                'tell' => 'required',
                'zip_code' => 'required',
                'address' => 'required',
                'mobile' => 'required']);
            $adress = new UsersAddresses();
            $adress->name = $request->input('name');
            $adress->family = $request->input('family');
            $adress->mobile = $request->input('mobile');
            $adress->tell = $request->input('tell');
            $adress->zip_code = $request->input('zip_code');
            $adress->address = $request->input('address');
            $adress->email = $request->input('email');
            $adress->user_id = Auth()->id();
            $adress->save();
            $adress->changeDefaultAddress(Auth()->id(),$adress->id);
            return redirect()->back()->with('success', Constants::TEXT_FOR_CREATE_DATA);
        } catch (\Illuminate\Database\QueryException $ex) {
            $errorCode = $ex->errorInfo[1];
            if ($errorCode == '1062') {
                return redirect()->back()
                    ->with('error', Constants::TEXT_FOR_DUPLICATE_DATA);
            }
            return redirect()->back()
                ->with('error', Constants::TEXT_FOR_ERROR . $ex->getMessage());
        }
    }

    public function saveOrder(Request $request)
    {
        if(Cart::count()>0){
        if (Input::has('addressRadio') && $request->input("addressRadio")){
            $userAddress=UsersAddresses::find($request->input("addressRadio"));
            if($userAddress && $userAddress->user_id==Auth::id()){
                if($userAddress->changeDefaultAddress(Auth::id(),$request->input("addressRadio"))){
                    $order=new Orders();
                    $order->user_id=Auth::id();
                    $order->user_address=$userAddress->id;
                    $order->count_order=Cart::count();
                    $order->order_number=$order->createOrderNumber(7);
                }
                DB::transaction(function() use ($order) {

                    $order->save();
                    foreach(Cart::content() as $row) {
                        $productOrder=new ProductsOrder();
                        $productOrder->product_id=$row->id;
                        $productOrder->qty=$row->qty;
                        $productOrder->price=$row->price;
                        $productOrder->order_id=$order->id;
                        $productOrder->save();
                    }
                    Cart::destroy();
                });
                    $cart_products=ProductsOrder::where('order_id',$order->id)->get();
                   return view('showFactor',['order'=>$order,'products'=>$cart_products]);

            }
            else
                return redirect()->back()->with('error', Constants::TEXT_FOR_ERROR);
        }
        else
            return redirect()->back()->with('error', Constants::ERR_USER_ADDRESS);
         }
       else
            abort(404);
    }
    public function deleteAddresses(UsersAddresses $id)
    {
        try {
            if($id->user_id!=Auth::id()){
                return redirect()->back()->with('error', Constants::TEXT_FOR_ERROR);
            }
            else{
                $id->isDelete=true;
                $id->save();
                return redirect()->back()->with('success', Constants::TEXT_FOR_CREATE_DATA);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $errorCode = $ex->errorInfo[1];
            if ($errorCode == '1062') {
                return redirect()->back()
                    ->with('error', Constants::TEXT_FOR_DUPLICATE_DATA);
            }
            return redirect()->back()
                ->with('error', Constants::TEXT_FOR_ERROR . $ex->getMessage());
        }
    }

}
