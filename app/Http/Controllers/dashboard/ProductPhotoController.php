<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 
use App\helper\Message;
use App\helper\Helper;
use App\ProductPhoto; 
use DB;
use DataTables;
use App\Subscription;

class ProductPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.productphoto.index");
    }

    /**
     * return json data
     */
    public function getData() {
        $query = ProductPhoto::query();
        
        if (request()->product_id > 0) {
            $query->where('product_id', request()->product_id);
        } 
        
        return DataTables::eloquent($query)
                        ->addColumn('action', function(ProductPhoto $productphoto) {
                            return view("dashboard.productphoto.action", compact("productphoto"));
                        })->editColumn('photo', function(ProductPhoto $productphoto) {
                            return "<img src='" . $productphoto->url . "' height='30px' onclick='viewImage(this)' />";
                        }) ->editColumn('product_id', function(ProductPhoto $productphoto) {
                            return  optional($productphoto->product)->name;
                        })
                        ->rawColumns(['action', 'photo'])
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
            $productphoto = ProductPhoto::create($request->all());
            
            // upload productphoto photo
            Helper::uploadImg($request->file("photo"), "/products", function($filename) use ($productphoto){
                $productphoto->update([
                    "photo" => $filename
                ]);
            });
            
            Subscription::subscribe([$productphoto->product_id]);
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
    public function edit(ProductPhoto $productphoto)
    { 
        return $productphoto->getViewBuilder()->loadEditView();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductPhoto $productphoto)
    { 
        try {
            $productphoto->update($request->all());
            
            // upload productphoto photo
            Helper::uploadImg($request->file("photo"), "/products", function($filename) use ($productphoto){
                $productphoto->update([
                    "photo" => $filename
                ]);
            });
            
            Subscription::subscribe([$productphoto->product_id]);
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
    public function destroy(ProductPhoto $productphoto)
    { 
        try { 
            $productphoto->delete();
            return Message::success(Message::$DONE);
        } catch (\Exception $ex) {
            return Message::error(Message::$ERROR);
        }
    }
}
