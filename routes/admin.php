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


//********************************************
// dashboard routes
//********************************************
// check if user login
Route::group(["middleware" => "admin"], function() {

    Route::get("dashboard/", "dashboard\DashboardController@index");
    Route::get("dashboard/main", "dashboard\DashboardController@main");

    // category routes
    Route::get("dashboard/category", "dashboard\CategoryController@index");
    Route::post("dashboard/category/store", "dashboard\CategoryController@store");
    Route::get("dashboard/category/data", "dashboard\CategoryController@getData");
    Route::get("dashboard/category/edit/{category}", "dashboard\CategoryController@edit");
    Route::get("dashboard/category/remove/{category}", "dashboard\CategoryController@destroy");
    Route::post("dashboard/category/update/{category}", "dashboard\CategoryController@update");
 
    // idea routes
    Route::get("dashboard/idea", "dashboard\IdeaController@index");
    Route::post("dashboard/idea/store", "dashboard\IdeaController@store");
    Route::get("dashboard/idea/data", "dashboard\IdeaController@getData");
    Route::get("dashboard/idea/edit/{idea}", "dashboard\IdeaController@edit");
    Route::get("dashboard/idea/remove/{idea}", "dashboard\IdeaController@destroy");
    Route::post("dashboard/idea/update/{idea}", "dashboard\IdeaController@update");
    
    // blog routes
    Route::get("dashboard/blog", "dashboard\BlogController@index");
    Route::post("dashboard/blog/store", "dashboard\BlogController@store");
    Route::get("dashboard/blog/data", "dashboard\BlogController@getData");
    Route::get("dashboard/blog/edit/{blog}", "dashboard\BlogController@edit");
    Route::get("dashboard/blog/remove/{blog}", "dashboard\BlogController@destroy");
    Route::post("dashboard/blog/update/{blog}", "dashboard\BlogController@update");
    
    // blog routes
    Route::get("dashboard/chatbot", "dashboard\ChatbotController@index");
    Route::post("dashboard/chatbot/store", "dashboard\ChatbotController@store");
    Route::get("dashboard/chatbot/data", "dashboard\ChatbotController@getData");
    Route::get("dashboard/chatbot/edit/{chatbot}", "dashboard\ChatbotController@edit");
    Route::get("dashboard/chatbot/remove/{chatbot}", "dashboard\ChatbotController@destroy");
    Route::post("dashboard/chatbot/update/{chatbot}", "dashboard\ChatbotController@update");
    
    // instagram routes
    Route::get("dashboard/instagram", "dashboard\InstagramController@index");
    Route::post("dashboard/instagram/store", "dashboard\InstagramController@store");
    Route::get("dashboard/instagram/data", "dashboard\InstagramController@getData");
    Route::get("dashboard/instagram/edit/{instagram}", "dashboard\InstagramController@edit");
    Route::get("dashboard/instagram/remove/{instagram}", "dashboard\InstagramController@destroy");
    Route::post("dashboard/instagram/update/{instagram}", "dashboard\InstagramController@update");
    
    // sub category routes
    Route::get("dashboard/subcategory", "dashboard\SubCategoryController@index");
    Route::post("dashboard/subcategory/store", "dashboard\SubCategoryController@store");
    Route::get("dashboard/subcategory/data", "dashboard\SubCategoryController@getData");
    Route::get("dashboard/subcategory/edit/{subcategory}", "dashboard\SubCategoryController@edit");
    Route::get("dashboard/subcategory/remove/{subcategory}", "dashboard\SubCategoryController@destroy");
    Route::post("dashboard/subcategory/update/{subcategory}", "dashboard\SubCategoryController@update");

    // product routes
    Route::get("dashboard/product", "dashboard\ProductController@index");
    Route::post("dashboard/product/store", "dashboard\ProductController@store");
    Route::post("dashboard/product/import", "dashboard\ProductController@import");
    Route::get("dashboard/product/data", "dashboard\ProductController@getData");
    Route::get("dashboard/product/edit/{product}", "dashboard\ProductController@edit");
    Route::get("dashboard/product/remove/{product}", "dashboard\ProductController@destroy");
    Route::post("dashboard/product/update/{product}", "dashboard\ProductController@update");

    // product photo routes
    Route::get("dashboard/productphoto", "dashboard\ProductPhotoController@index");
    Route::post("dashboard/productphoto/store", "dashboard\ProductPhotoController@store");
    Route::get("dashboard/productphoto/data", "dashboard\ProductPhotoController@getData");
    Route::get("dashboard/productphoto/edit/{productphoto}", "dashboard\ProductPhotoController@edit");
    Route::get("dashboard/productphoto/remove/{productphoto}", "dashboard\ProductPhotoController@destroy");
    Route::post("dashboard/productphoto/update/{productphoto}", "dashboard\ProductPhotoController@update");
    
    // product color routes
    Route::get("dashboard/productcolor", "dashboard\ProductColorController@index");
    Route::post("dashboard/productcolor/store", "dashboard\ProductColorController@store");
    Route::get("dashboard/productcolor/data", "dashboard\ProductColorController@getData");
    Route::get("dashboard/productcolor/edit/{productcolor}", "dashboard\ProductColorController@edit");
    Route::get("dashboard/productcolor/remove/{productcolor}", "dashboard\ProductColorController@destroy");
    Route::post("dashboard/productcolor/update/{productcolor}", "dashboard\ProductColorController@update");
    
    // slide routes
    Route::get("dashboard/slide", "dashboard\SlideController@index");
    Route::post("dashboard/slide/store", "dashboard\SlideController@store");
    Route::get("dashboard/slide/data", "dashboard\SlideController@getData");
    Route::get("dashboard/slide/edit/{slide}", "dashboard\SlideController@edit");
    Route::get("dashboard/slide/remove/{slide}", "dashboard\SlideController@destroy");
    Route::post("dashboard/slide/update/{slide}", "dashboard\SlideController@update");
 
    // order routes
    Route::get("dashboard/order", "dashboard\OrderController@index");
    Route::get("dashboard/order/data", "dashboard\OrderController@getData");
    Route::post("dashboard/order/change-status/{order}", "dashboard\OrderController@changeStatus");
    Route::get("dashboard/order/confirm/{order}", "dashboard\OrderController@confirm"); 
    Route::get("dashboard/order/show/{order}", "dashboard\OrderController@show");
 
    // user routes
    Route::get("dashboard/user", "dashboard\UserController@index");
    Route::post("dashboard/user/store", "dashboard\UserController@store");
    Route::get("dashboard/user/data", "dashboard\UserController@getData");
    Route::get("dashboard/user/edit/{user}", "dashboard\UserController@edit");
    Route::get("dashboard/user/remove/{user}", "dashboard\UserController@destroy");
    Route::post("dashboard/user/update/{user}", "dashboard\UserController@update");
 
    // option routes
    Route::get("dashboard/option/", "dashboard\SettingController@index");
    Route::get("dashboard/option/update", "dashboard\SettingController@update");
    Route::post("dashboard/option/update", "dashboard\SettingController@update");
    Route::post("dashboard/translation/update", "dashboard\SettingController@updateTranslation");
    
    // helper route
    Route::get("dashboard/print/{page}", "dashboard\HelperController@print");
});

// login route
Route::get("dashboard/login/", "dashboard\LoginController@index");
Route::post("dashboard/sign", "dashboard\LoginController@login");
Route::get("dashboard/logout", "dashboard\LoginController@logout");
 

Route::get("test", function(){ 
    return Lang::getLang();
    //$user = App\User::find(1);
    //$user->update(['password' => bcrypt("123456789")]);//Auth::user();
});

// show order