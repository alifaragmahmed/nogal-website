<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 
use App\helper\Message;
use App\helper\Helper;
use App\ProductColor; 
use DB;
use DataTables;
use App\Subscription;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.productcolor.index");
    }

    /**
     * return json data
     */
    public function getData() {
        return DataTables::eloquent(ProductColor::query())
                        ->addColumn('action', function(ProductColor $productcolor) {
                            return view("dashboard.productcolor.action", compact("productcolor"));
                        })->editColumn('color_photo', function(ProductColor $productcolor) {
                            return "<img src='" . $productcolor->url . "' height='30px' onclick='viewImage(this)' />";
                        }) ->editColumn('product_id', function(ProductColor $productcolor) {
                            return  optional($productcolor->product)->name;
                        })
                        ->rawColumns(['action', 'color_photo'])
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
            $productcolor = ProductColor::create($request->all());
            
            // upload productcolor color
            Helper::uploadImg($request->file("color_photo"), "/colors", function($filename) use ($productcolor){
                $productcolor->update([
                    "color_photo" => $filename
                ]);
            });
            
            Subscription::subscribe([$productcolor->product_id]);
            return Message::success(Message::$DONE);
        } catch (Exception $ex) {
            return Message::error(Message::$ERROR);
        }
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
    public function edit(ProductColor $productcolor)
    { 
        return $productcolor->getViewBuilder()->loadEditView();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductColor $productcolor)
    { 
        try {
            $productcolor->update($request->all());
            
            // upload productcolor color
            Helper::uploadImg($request->file("color_photo"), "/colors", function($filename) use ($productcolor){
                $productcolor->update([
                    "color_photo" => $filename
                ]);
            });
            
            Subscription::subscribe([$productcolor->product_id]);
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
    public function destroy(ProductColor $productcolor)
    { 
        try { 
            $productcolor->delete();
            return Message::success(Message::$DONE);
        } catch (\Exception $ex) {
            return Message::error(Message::$ERROR);
        }
    }
}
