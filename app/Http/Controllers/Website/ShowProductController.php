<?php

namespace App\Http\Controllers\Website;
use App\Category;
use App\Product;
use App\ProductPhoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, Request $request)
    {
        $product =Product::find($id); 

        if (!$product)
            return redirect('/');
            
        $category =  optional($product)->category_id;
        $products = Product::where('category_id','=', $category)
        ->take(3)
        ->get();
        
        if ($product)  
            $product->addView(request()->ip());
       /* 
      $products = Product::join('order_details', 'products.id', '=', 'order_details.product_id')
      ->select('*', 'products.id as id')
      ->take(3)
      ->get();
      */
       

        return view('website.productshow',compact('product','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
