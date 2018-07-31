<?php

namespace PrintCompany\AdminBundle\Controller;

use App\ContactUsMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class AdminBundleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['isAdmin']);

        $messageCount=DB::table('contact_us_messages')->where('isRead',false)->where('isDelete',false)->get();
        View::share(['messageCount'=>count($messageCount)]);

    }


    public function index(){
       return view('admin::home');
    }

    public function pagination(Request $request)
    {
        Session::put('limitPagination',$request->get('pq'));
        return redirect()->back();
    }
}
