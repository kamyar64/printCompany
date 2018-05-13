<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
});
Route::get('/login','UserController@create')->name('login');
Route::post('/login','UserController@storeLogin');
Route::get('/logout','UserController@destroy')->name('logout');
Route::get('/register','UserController@registerForm')->name('register');
Route::post('/register','UserController@store');



Route::prefix('admin')->group(function () {

    Route::get('add/{a}/{b}', '\PrintCompany\AdminBundle\Controller\AdminBundleController@add');
    Route::get('subtract/{a}/{b}', '\PrintCompany\AdminBundle\Controller\AdminBundleController@subtract');
});


