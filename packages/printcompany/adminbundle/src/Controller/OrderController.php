<?php

namespace PrintCompany\AdminBundle\Controller;

use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use App\News;
use App\NewsGroup;
use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if($request->input('search')){
            $all_orders=Orders::UnreadOrders()->orWhere('order_number', 'like', '%' . $request->input('search') . '%')->orderBy('created_at','DESC')->paginate(Session::get('limitPagination'));
        }else{
            $all_orders=Orders::UnreadOrders()->orderBy('created_at','DESC')->paginate(Session::get('limitPagination'));
        }
        return view('admin::orders.shows',["all_orders"=>$all_orders]);
    }

    public function showDetail(Request $request,Orders $id)
    {
        $order=Orders::find($id)->first();
        $order->isRead=1;
        $order->save();
        return view('admin::orders.showDetail',["data"=>$order]);
    }
}
