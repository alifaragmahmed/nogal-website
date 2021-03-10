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
 


Route::get('/', "Website\HomeController@index")->name('website.home');
Route::get('/home', "Website\HomeController@index")->name('website.home');

Route::get('/shop', "Website\ShopController@index")->name('website.shop');


Route::get('/chat', "dashboard\ChatbotController@getChatView")->name('website.chatbotIndex');
Route::get('/chatbot/questions', "dashboard\ChatbotController@getQuestions")->name('website.chatbot');

Route::get('/show/product/{id}', "Website\ShowProductController@index")->name('show.product');

Route::get('/register', "Website\RegisterController@index")->name('register');

Route::get('/confirm/{code}', function ($code) {
    $user = App\User::where("confirm_code", $code)->first();
    
    if ($user) {
        $user->update([
            "active" => 1
        ]);
        Auth::login($user);
        return view('website.confirm', compact("user"));
    }
    
    return redirect("/home");
});

Route::post("website/login", "Website\RegisterController@login")->name('website.login');
Route::post("website/register", "Website\RegisterController@register")->name('website.register');
Route::get("website/logout", "Website\RegisterController@logout")->name('website.logout');
 
Route::get('add-to-cart/{id}', 'Website\ShoppingCartController@addToCart')->name('add.cart.product');
Route::get('remove-from-cart/{id}', 'Website\ShoppingCartController@removeFromCart')->name('remove.from.cart');
Route::get('/about', function () {
  return view('website.aboutus');
   
 })->name('website.about');
 Route::get('/contact', function () {
  return view('website.contact');
   
 })->name('website.contact');


// checkout routes
Route::get('/checkout', "Website\WebsiteController@checkout1")->name('website.checkout1');
Route::get('/checkout2', "Website\WebsiteController@checkout2");
Route::get('/checkout3', "Website\WebsiteController@checkout3");
Route::get('/checkout4', "Website\WebsiteController@checkout4");


Route::post('/subscribe', "Website\WebsiteController@subscribe");

// perform payment
Route::get('/pay', "Website\PaymentController@pay");

Route::post('/order/save', "Website\OrderController@save");
 
Route::get('/privacy-policy', function () {
    return view("website.privacy");
});

Route::get('/terms-and-conditions', function () {
    return view("website.terms");
});
Route::get('/offer', function () {
    $products = App\Product::where('category_id', 4)->latest()->take(4)->get();
    $subscribe = App\Subscription::find(2);
    
    return view('dashboard.offer', compact("products", "subscribe"));
});




Route::get("locale/{lang}", function($lang){
  session(["locale" => $lang]);
  return back();
})->name('locale');
   