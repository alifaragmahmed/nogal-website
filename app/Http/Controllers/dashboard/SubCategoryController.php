<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\helper\Message;
use App\SubCategory;
use App\Role; 
use DB;
use DataTables;
use Lang;
use App\helper\Helper;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.subcategory.index");
    }

    /**
     * return json data
     */
    public function getData() {
        return DataTables::eloquent(SubCategory::query())
                        ->addColumn('action', function(SubCategory $subcategory) {
                            return view("dashboard.subcategory.action", compact("subcategory"));
                        })
                        ->editColumn('category_id', function(SubCategory $subcategory) {
                            return  optional($subcategory->category)->name;
                        })->editColumn('photo', function(SubCategory $subcategory) {
                            return "<img src='" . $subcategory->url . "' height='30px' />";
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
            $subCategory = SubCategory::create($request->all());
            
            // upload category photo
            Helper::uploadImg($request->file("photo"), "/subcategory", function($filename) use ($subCategory){
                $subCategory->update([
                    "photo" => $filename
                ]);
            });
            
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
    public function edit(SubCategory $subcategory)
    { 
        return $subcategory->getViewBuilder()->loadEditView();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subcategory)
    { 
        try {
            $subcategory->update($request->all());
            
            // upload category photo
            Helper::uploadImg($request->file("photo"), "/subcategory", function($filename) use ($subcategory){
                $subcategory->update([
                    "photo" => $filename
                ]);
            });
            
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
    public function destroy(SubCategory $subcategory)
    { 
        try { 
            $subcategory->delete();
            return Message::success(Message::$DONE);
        } catch (\Exception $ex) {
            return Message::error(Message::$ERROR);
        }
    }
}
