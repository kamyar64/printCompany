<?php

namespace PrintCompany\AdminBundle;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminBundleController extends Controller
{
    //
    public function add($a, $b){
        echo $a + $b;
    }

    public function subtract($a, $b){
        echo $a - $b;
    }
}
