<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\helper\ViewBuilder;
use App\helper\Helper;

class Subscription extends Model
{
    protected $table = "subscriptions";

    protected $fillable = [
        'email'
    ];
    
 
    public static function subscribe($ids) {
        $products = Product::whereIn('id', $ids)->get(); 
        foreach(Subscription::all() as $subscribe) {
            $html = view('dashboard.offer', compact("products", "subscribe"));
            Helper::sendMail($subscribe->email, __('new_offer_from_nogal'), $html);
        }
    }
    
 
    public static function subscribe2($products) {  
        foreach(Subscription::all() as $subscribe) {
            $html = view('dashboard.offer', compact("products", "subscribe"));
            Helper::sendMail($subscribe->email, __('new_offer_from_nogal'), $html);
        }
    }
}
