<?php
Route::group(['prefix' => 'admin','middleware' => ['web']],function () {

    Route::get('add/{a}/{b}',['middleware' => 'isAdmin', 'uses' => 'PrintCompany\AdminBundle\Controller\AdminBundleController@add'] );
    Route::get('subtract/{a}/{b}', 'PrintCompany\AdminBundle\Controller\AdminBundleController@subtract');
});
