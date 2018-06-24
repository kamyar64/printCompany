<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index()
    {
        return view('welcome');
    }
}
