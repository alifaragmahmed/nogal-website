<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 
use App\helper\Message;
use App\helper\Helper;
use App\Product; 
use App\Category; 
use DB;
use DataTables;
use App\Subscription;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.category.index");
    }

    /**
     * return json data
     */
    public function getData() {
        return DataTables::eloquent(Category::query())
                        ->addColumn('action', function(Category $category) {
                            return view("dashboard.category.action", compact("category"));
                        })->editColumn('photo', function(Category $category) {
                            return "<img src='" . $category->url . "' height='30px' />";
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
            $category = Category::create($request->all());
            
            // upload category photo
            Helper::uploadImg($request->file("photo"), "/category", function($filename) use ($category){
                $category->update([
                    "photo" => $filename
                ]);
            });
            
            $products = $category->products()->orderByRaw('RAND()')->take(10)->get();
            Subscription::subscribe2($products);
            return Message::success(Message::$DONE);
        } catch (\Exception $ex) {
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
    public function edit(Category $category)
    { 
        return $category->getViewBuilder()->loadEditView();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    { 
        try {
            $category->update($request->all());
            
            // upload category photo
            Helper::uploadImg($request->file("photo"), "/category", function($filename) use ($category){
                $category->update([
                    "photo" => $filename
                ]);
            });
            
            $products = $category->products()->orderByRaw('RAND()')->take(10)->get();
            Subscription::subscribe2($products);
            return Message::success(Message::$EDIT);
        } catch (\Exception $ex) {
            return Message::error($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    { 
        try { 
            $category->delete();
            return Message::success(Message::$DONE);
        } catch (\Exception $ex) {
            return Message::error(Message::$ERROR);
        }
    }
}
