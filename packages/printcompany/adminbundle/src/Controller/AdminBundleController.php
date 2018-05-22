<?php

namespace PrintCompany\AdminBundle\Controller;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminBundleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['isAdmin']);

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
