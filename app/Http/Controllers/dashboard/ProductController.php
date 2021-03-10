<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\imports\ProductImporter;

use App\helper\Message;
use App\helper\Helper;
use App\Product;
use App\OrderDetail;
use App\Role;
use DataTables;
use Excel;
use App\Subscription;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.product.index");
    }

    /**
     * return json data
     */
    public function getData() {
        $query = Product::query();
        
        if (request()->category_id) {
            $query->where('category_id', request()->category_id);
        }
        
        return DataTables::eloquent($query)
                        ->addColumn('action', function(Product $product) {
                            return view("dashboard.product.action", compact("product"));
                        }) 
                        ->editColumn('category_id', function(Product $product) {
                            return optional($product->category)->name;
                        })  
                        ->editColumn('is_pay', function(Product $product) {
                            $label = $product->is_pay == 1? 'primary' : 'default';
                            $text = $product->is_pay == 1? __('on') : __('off');
                            
                            return "<span class='label label-$label' >$text</span>";
                        }) 
                        ->editColumn('active', function(Product $product) {
                            $label = $product->active == 1? 'success' : 'danger';
                            $text = $product->active == 1? __('on') : __('off');
                            
                            return "<span class='label label-$label' >$text</span>";
                        })  
                        ->rawColumns(['action', 'is_pay', 'active'])
                        ->toJson();
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
        
         
        try {
            $product = Product::create($request->all());  
            
            Subscription::subscribe([$product->id]);
            return Message::success(Message::$DONE);
        } catch (Exception $ex) {
            
            return Message::error(Message::$ERROR);
        }
        
      
    }
    
    /**
     * import products from excel file
     * 
     * @param Request $request
     * @return type
     */
    public function import(Request $request) {
        Excel::import(new ProductImporter, $request->file('products'));
        
        return Message::success(Message::$DONE);
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
    public function edit(Product $product)
    { 
//        dump($product);
//        return;
        return view("dashboard.product.edit", compact("product"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    { 
        try {   
            $product->update($request->all()); 
            
            Subscription::subscribe([$product->id]);
            return Message::success(Message::$EDIT);
        } catch (\Exception $ex) {
            return Message::error(Message::$ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    { 
        try { 
            $product->delete();
            return Message::success(Message::$DONE);
        } catch (\Exception $ex) {
            return Message::error(Message::$ERROR);
        }
    }
}
