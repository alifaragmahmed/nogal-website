<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 
use App\helper\Message;
use App\helper\Helper;
use App\Blog; 
use DB;
use DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.blog.index");
    }

    /**
     * return json data
     */
    public function getData() {
        return DataTables::eloquent(Blog::query())
                        ->addColumn('action', function(Blog $blog) {
                            return view("dashboard.blog.action", compact("blog"));
                        })->editColumn('photo', function(Blog $blog) {
                            return "<img src='" . $blog->url . "' height='30px' />";
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
            $blog = Blog::create($request->all());
            
            // upload blog photo
            Helper::uploadImg($request->file("photo"), "/blog", function($filename) use ($blog){
                $blog->update([
                    "photo" => $filename
                ]);
            });
            
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
    public function edit(Blog $blog)
    { 
        return $blog->getViewBuilder()->loadEditView();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    { 
        try {
            $blog->update($request->all());
            
            // upload blog photo
            Helper::uploadImg($request->file("photo"), "/blog", function($filename) use ($blog){
                $blog->update([
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
    public function destroy(Blog $blog)
    { 
        try { 
            unlink(public_path() . "/images/blog/" . $blog->photo);
        } catch (Exception $ex) {
            //return Message::error(Message::$ERROR);
        }
            $blog->delete();
            return Message::success(Message::$DONE);
    }
}
