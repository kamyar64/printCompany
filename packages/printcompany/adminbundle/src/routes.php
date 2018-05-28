<?php
Route::group(['prefix' => 'admin','middleware' => ['web']],function () {
    $route='PrintCompany\AdminBundle\Controller';

    Route::get('/',$route.'\AdminBundleController@index')->name('admin');
    Route::get('/pagination',$route.'\AdminBundleController@pagination')->name('pagination');
    //For Priority
    Route::get('/priority/create',$route.'\PriorityController@create')->name('create_priority');
    Route::post('/priority/create',$route.'\PriorityController@store')->name('save_priority');
    Route::get('/priority/{id}/edit',$route.'\PriorityController@edit')->name('edit_priority');
    Route::patch('/priority/{id}',$route.'\PriorityController@update')->name('update_priority');
    Route::delete('/priority/{id}/delete',$route.'\PriorityController@destroy')->name('delete_priority');
    //For News Group
    Route::get('/news-group/create',$route.'\NewsGroupController@create')->name('create_news_group');
    Route::post('/news-group/create',$route.'\NewsGroupController@store')->name('save_news_group');
    Route::get('/news-group/{id}/edit',$route.'\NewsGroupController@edit')->name('edit_news_group');
    Route::patch('/news-group/{id}',$route.'\NewsGroupController@update')->name('update_news_group');
    Route::delete('/news-group/{id}/delete',$route.'\NewsGroupController@destroy')->name('delete_news_group');
    //For Department
    Route::get('/department/create',$route.'\DepartmentController@create')->name('create_department');
    Route::post('/department/create',$route.'\DepartmentController@store')->name('save_department');
    Route::get('/department/{id}/edit',$route.'\DepartmentController@edit')->name('edit_department');
    Route::patch('/department/{id}',$route.'\DepartmentController@update')->name('update_department');
    Route::delete('/department/{id}/delete',$route.'\DepartmentController@destroy')->name('delete_department');
    //For News
    Route::get('/news/create',$route.'\NewsController@create')->name('create_news');
    Route::post('/news/create',$route.'\NewsController@store')->name('save_news');
});
