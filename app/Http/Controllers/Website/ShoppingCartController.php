<?php

namespace App\Http\Controllers\Website;
use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class ShoppingCartController extends Controller
{
   
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart($id,Request $request)
    {
        $product = Product::find($id);
        
        if ($product->price_ar <= 0) {
            Session::flash('error', __("This product is not for sale online"));
     
            return redirect()->back();
        }
        
        if ($request->status == 'renew') {
            $amount = $request->amount;
            Cart::remove($product->id);
            Cart::add($product->id, $amount);
        } else {
            $amount = $request->amount? $request->amount : 1;
            Cart::add($product->id, $amount);
        }
        Session::flash('success', 'You add Product to Shopping Cart Successfuly  :)');
     
        return redirect()->back();  
    }



    public function removeFromCart($id)
    {
        $product = Product::find($id);
       
        Cart::remove($product->id);
        Session::flash('success', 'You delete Product from Shopping Cart Successfuly  :)');
     
        return redirect()->back();  
    }

  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
