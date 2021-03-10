<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Order;
use App\OrderDetail;


class OrderController extends Controller
{

    public function save(Request $request) {

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['total'] = Cart::getTotal();
        $order = Order::create($data);

        foreach(Cart::all() as $key => $amount) {
            $product = Product::find($key);
            OrderDetail::create([
                "product_id" => $key,
                "order_id" => $order->id,
                "amount" => $amount,
                "price" => $product->price_ar,
                "total" => $product->price_ar * $amount,
                "shipping_price" => 0,
            ]);
        }
        
        // emty cart
        Cart::destroy();
        
        return redirect("pay?order_id=" . $order->id);
    }
}
