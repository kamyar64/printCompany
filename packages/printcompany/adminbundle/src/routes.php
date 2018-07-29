<?php
Route::group(['prefix' => 'admin','middleware' => ['web','auth']],function () {
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
    Route::get('/news',$route.'\NewsController@index')->name('show_news');
    Route::get('/news/{news}/edit',$route.'\NewsController@edit')->name('edit_news');
    Route::patch('/news/{news}',$route.'\NewsController@update')->name('update_news');
    //For Category
    Route::get('product/category/create',$route.'\ProductCategoryController@create')->name('create_category');
    Route::post('product/category/create',$route.'\ProductCategoryController@store')->name('save_category');
    Route::get('product/category/{id}/edit',$route.'\ProductCategoryController@edit')->name('edit_category');
    Route::patch('product/category/{id}',$route.'\ProductCategoryController@update')->name('update_category');
    Route::delete('product/category/{id}/delete',$route.'\ProductCategoryController@destroy')->name('delete_category');
    //For Product Status
    Route::get('/product/status/create',$route.'\ProductStatusController@create')->name('create_product_status');
    Route::post('/product/status/create',$route.'\ProductStatusController@store')->name('save_product_status');
    Route::get('/product/status/{id}/edit',$route.'\ProductStatusController@edit')->name('edit_product_status');
    Route::patch('/product/status/{id}',$route.'\ProductStatusController@update')->name('update_product_status');
    Route::delete('/product/status/{id}/delete',$route.'\ProductStatusController@destroy')->name('delete_product_status');
    //For Product Author
    Route::get('/product/author/create',$route.'\ProductAuthorController@create')->name('create_product_author');
    Route::post('/product/author/create',$route.'\ProductAuthorController@store')->name('save_product_author');
    Route::get('/product/author/{id}/edit',$route.'\ProductAuthorController@edit')->name('edit_product_author');
    Route::patch('/product/author/{id}',$route.'\ProductAuthorController@update')->name('update_product_author');
    Route::delete('/product/author/{id}/delete',$route.'\ProductAuthorController@destroy')->name('delete_product_author');
    //For Product Translator
    Route::get('/product/translator/create',$route.'\ProductTranslatorController@create')->name('create_product_translator');
    Route::post('/product/translator/create',$route.'\ProductTranslatorController@store')->name('save_product_translator');
    Route::get('/product/translator/{id}/edit',$route.'\ProductTranslatorController@edit')->name('edit_product_translator');
    Route::patch('/product/translator/{id}',$route.'\ProductTranslatorController@update')->name('update_product_translator');
    Route::delete('/product/translator/{id}/delete',$route.'\ProductTranslatorController@destroy')->name('delete_product_translator');
    //For Product Sizes
    Route::get('/product/sizes/create',$route.'\ProductSizeController@create')->name('create_product_size');
    Route::post('/product/sizes/create',$route.'\ProductSizeController@store')->name('save_product_size');
    Route::get('/product/sizes/{id}/edit',$route.'\ProductSizeController@edit')->name('edit_product_size');
    Route::patch('/product/sizes/{id}',$route.'\ProductSizeController@update')->name('update_product_size');
    Route::delete('/product/sizes/{id}/delete',$route.'\ProductSizeController@destroy')->name('delete_product_size');
    //For Product Volume Type
    Route::get('/product/volume/create',$route.'\ProductVolumeTypeController@create')->name('create_product_volume_type');
    Route::post('/product/volume/create',$route.'\ProductVolumeTypeController@store')->name('save_product_volume_type');
    Route::get('/product/volume/{id}/edit',$route.'\ProductVolumeTypeController@edit')->name('edit_product_volume_type');
    Route::patch('/product/volume/{id}',$route.'\ProductVolumeTypeController@update')->name('update_product_volume_type');
    Route::delete('/product/volume/{id}/delete',$route.'\ProductVolumeTypeController@destroy')->name('delete_product_volume_type');
    //For Product Publisher
    Route::get('/product/publisher/create',$route.'\ProductPublisherController@create')->name('create_product_publisher');
    Route::post('/product/publisher/create',$route.'\ProductPublisherController@store')->name('save_product_publisher');
    Route::get('/product/publisher/{id}/edit',$route.'\ProductPublisherController@edit')->name('edit_product_publisher');
    Route::patch('/product/publisher/{id}',$route.'\ProductPublisherController@update')->name('update_product_publisher');
    Route::delete('/product/publisher/{id}/delete',$route.'\ProductPublisherController@destroy')->name('delete_product_publisher');
    //For Product Language
    Route::get('/product/language/create',$route.'\ProductLanguageController@create')->name('create_product_language');
    Route::post('/product/language/create',$route.'\ProductLanguageController@store')->name('save_product_language');
    Route::get('/product/language/{id}/edit',$route.'\ProductLanguageController@edit')->name('edit_product_language');
    Route::patch('/product/language/{id}',$route.'\ProductLanguageController@update')->name('update_product_language');
    Route::delete('/product/language/{id}/delete',$route.'\ProductLanguageController@destroy')->name('delete_product_language');
    //For Product Measure
    Route::get('/product/measure/create',$route.'\ProductMeasurementUnitController@create')->name('create_product_measure');
    Route::post('/product/measure/create',$route.'\ProductMeasurementUnitController@store')->name('save_product_measure');
    Route::get('/product/measure/{id}/edit',$route.'\ProductMeasurementUnitController@edit')->name('edit_product_measure');
    Route::patch('/product/measure/{id}',$route.'\ProductMeasurementUnitController@update')->name('update_product_measure');
    Route::delete('/product/measure/{id}/delete',$route.'\ProductMeasurementUnitController@destroy')->name('delete_product_measure');
    //For Product weight
    Route::get('/product/weight/create',$route.'\ProductWeightUnitController@create')->name('create_product_weight');
    Route::post('/product/weight/create',$route.'\ProductWeightUnitController@store')->name('save_product_weight');
    Route::get('/product/weight/{id}/edit',$route.'\ProductWeightUnitController@edit')->name('edit_product_weight');
    Route::patch('/product/weight/{id}',$route.'\ProductWeightUnitController@update')->name('update_product_weight');
    Route::delete('/product/weight/{id}/delete',$route.'\ProductWeightUnitController@destroy')->name('delete_product_weight');
    //For Product Cost Unit
    Route::get('/product/cost-unit/create',$route.'\ProductCostUnitController@create')->name('create_product_costUnit');
    Route::post('/product/cost-unit/create',$route.'\ProductCostUnitController@store')->name('save_product_costUnit');
    Route::get('/product/cost-unit/{id}/edit',$route.'\ProductCostUnitController@edit')->name('edit_product_costUnit');
    Route::patch('/product/cost-unit/{id}',$route.'\ProductCostUnitController@update')->name('update_product_costUnit');
    Route::delete('/product/cost-unit/{id}/delete',$route.'\ProductCostUnitController@destroy')->name('delete_product_costUnit');
    //For Product
    Route::get('/product/create',$route.'\ProductController@create')->name('create_product');
    Route::post('/product/create',$route.'\ProductController@store')->name('save_product');
    Route::get('/product/{id}/edit',$route.'\ProductController@edit')->name('edit_product');
    Route::patch('/product/{id}',$route.'\ProductController@update')->name('update_product');
    Route::get('/product',$route.'\ProductController@index')->name('show_product');
    Route::delete('/product/{id}/delete',$route.'\ProductController@destroy')->name('delete_product');
    //For ContactUs Address
    Route::get('/contact-us/address/create',$route.'\ContactUsAddressController@create')->name('create_contact_us_address');
    Route::post('/contact-us/address/create',$route.'\ContactUsAddressController@store')->name('save_contact_us_address');
    Route::get('/contact-us/address/{id}/edit',$route.'\ContactUsAddressController@edit')->name('edit_contact_us_address');
    Route::patch('/contact-us/address/{id}',$route.'\ContactUsAddressController@update')->name('update_contact_us_address');
    Route::delete('/contact-us/address/{id}/delete',$route.'\ContactUsAddressController@destroy')->name('delete_contact_us_address');
    //For ContactUs Tell And Email
    Route::get('/contact-us/tell-email/create',$route.'\ContactUsTellAndEmailController@create')->name('create_contact_us_tell_email');
    Route::post('/contact-us/tell-email/create',$route.'\ContactUsTellAndEmailController@store')->name('save_contact_us_tell_email');
    Route::get('/contact-us/tell-email/{id}/edit',$route.'\ContactUsTellAndEmailController@edit')->name('edit_contact_us_tell_email');
    Route::patch('/contact-us/tell-email/{id}',$route.'\ContactUsTellAndEmailController@update')->name('update_contact_us_tell_email');
    Route::delete('/contact-us/tell-email/{id}/delete',$route.'\ContactUsTellAndEmailController@destroy')->name('delete_contact_us_tell_email');
    //For ContactUs Tell And Email
    Route::get('/contact-us/create',$route.'\ContactUsController@create')->name('create_contact_us');
    Route::post('/contact-us/create',$route.'\ContactUsController@store')->name('save_contact_us');
    Route::get('/contact-us/{id}/edit',$route.'\ContactUsController@edit')->name('edit_contact_us');
    Route::patch('/contact-us/{id}',$route.'\ContactUsController@update')->name('update_contact_us');

    //for social Network
    Route::get('/social-networks/create',$route.'\ContactUsController@createSocialNetwork')->name('create_social_network');
    Route::post('/social-networks/create',$route.'\ContactUsController@storeSocialNetwork')->name('save_social_network');
    Route::get('/social-networks/{id}/edit',$route.'\ContactUsController@editSocialNetwork')->name('edit_social_network');
    Route::patch('/social-networks/{id}',$route.'\ContactUsController@updateSocialNetwork')->name('update_social_network');
    Route::delete('/social-networks/{id}/delete',$route.'\ContactUsController@destroySocialNetwork')->name('delete_social_network');

    //For Menu
    Route::get('/menu/create',$route.'\MenuController@create')->name('create_menu');
    Route::post('/menu/create',$route.'\MenuController@store')->name('save_menu');
    Route::get('/menu/{id}/edit',$route.'\MenuController@edit')->name('edit_menu');
    Route::patch('/menu/{id}',$route.'\MenuController@update')->name('update_menu');
    Route::delete('/menu/{id}/delete',$route.'\MenuController@destroy')->name('delete_menu');


    Route::get('/our-customer/create',$route.'\OurCustomerController@create')->name('create_customer');
    Route::post('/our-customer/create',$route.'\OurCustomerController@store')->name('save_customer');
    Route::get('/our-customer/{id}/edit',$route.'\OurCustomerController@edit')->name('edit_customer');
    Route::patch('/our-customer/{id}',$route.'\OurCustomerController@update')->name('update_customer');
    Route::delete('/our-customer/{id}/delete',$route.'\OurCustomerController@destroy')->name('delete_customer');
    //FOR MENU TEXT
    Route::get('/menu-text/create/{id?}',$route.'\MenuTextController@create')->name('create_menu_text');
    Route::post('/menu-text/create',$route.'\MenuTextController@store')->name('save_menu_text');
    Route::get('/menu-text/{id}/edit',$route.'\MenuTextController@edit')->name('edit_menu_text');
    Route::patch('/menu-text/{id}',$route.'\MenuTextController@update')->name('update_menu_text');
    Route::get('/menu-text',$route.'\MenuTextController@index')->name('show_menu_text');


});
