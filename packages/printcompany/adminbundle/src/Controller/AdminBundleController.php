<?php

namespace PrintCompany\AdminBundle\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminBundleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['isAdmin']);

    }

    //
    public function add($a, $b){
        echo $a + $b;
    }

    public function subtract($a, $b){
        echo $a - $b;
    }
}
