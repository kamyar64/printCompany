<?php
Route::prefix('admin')->group(function () {
    Route::get('add/{a}/{b}', 'PrintCompany\AdminBundle\AdminBundleController@add');
    Route::get('subtract/{a}/{b}', 'PrintCompany\AdminBundle\AdminBundleController@subtract');
});
