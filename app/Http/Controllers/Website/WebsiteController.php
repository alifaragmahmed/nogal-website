<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Cart;
use Session;
use DB; 
use App\Subscription;

class WebsiteController extends Controller
{
    
    public function checkout1() {
        return view("website.checkout");
    }
    
    public function checkout2() {
        // check if the visitor login
        if (!Auth::user()){
            
        
        Session::flash('error', 'You Must login first  :)');
     
        return redirect('register');
    
        }
        else
        {
            return view("website.checkout2");
        }
       
    }
    
    public function checkout3(Request $request) {
        // check if the visitor login
        if (!Auth::user())
            return redirect('register');
        
        $orderId = $request->order_id? $request->order_id : session("order_id");
         
        
        $order = Order::find($orderId);
        if (!$order)
            return redirect("shop");
        return view("website.checkout3", compact("order"));
    }
    
    public function checkout4(Request $request) {
        // check if the visitor login
        if (!Auth::user())
            return redirect('register'); 
            
        $orderId = $request->order_id? $request->order_id : session("order_id");
        
        $order = Order::find($orderId);
        if (!$order)
            return redirect("shop");
        
        return view("website.checkout4", compact("order"));
    }
    
    public function subscribe(Request $request) {
        
        $validator = validator()->make($request->all(), [  
            'email' => 'required|unique:subscriptions', 
        ], [ 
            "email.required" => __('email is required'), 
            'email.unique' => __('email already exist :)'),
        ]);

        if ($validator->fails()) {
            return [
                "status" => 0,
                "message" => $validator->errors()->first()
            ];  
        }
        
        Subscription::create([
            "email" => $request->email
        ]);
        
        return [
            "status" => 1,
            "message" => __("subscription done, all offers will be sent to you")
        ];  
    }
    
    
}
