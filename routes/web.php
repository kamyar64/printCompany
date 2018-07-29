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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/products/{slug?}', 'ProductController@index')->name('products');
Route::get('/product/{slug}', 'ProductController@product')->name('product');
Route::get('/add-to-cart/{slug}', 'ProductController@save')->name('add_to_carts');
Route::get('/delete-from-cart/{id}/delete', 'ProductController@destroy')->name('delete_shopping_cart');
Route::get('/contact-us', 'ContactUsMessageController@contactUs')->name('contact_us');
Route::post('/contact-us', 'ContactUsMessageController@save')->name('send_contact_message');

Route::group(['middleware' => ['web','auth']],function () {
    Route::get('/basket', function () {
        return view('about');
    })->name('basket_address');
});
Route::get('/login','UserController@create')->name('login');
Route::post('/login','UserController@storeLogin');
Route::get('/logout','UserController@destroy')->name('logout');
Route::get('/register','UserController@registerForm')->name('register');
Route::post('/register','UserController@store');






