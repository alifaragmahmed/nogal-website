<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\helper\Message;
use App\helper\Helper;
use App\Slide;
use App\Role; 
use DB;
use DataTables;


class SlideController extends Controller
{ 
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.slide.index");
    }

    /**
     * return json data
     */
    public function getData() {
        return DataTables::eloquent(Slide::query())
                        ->editColumn('action', function(Slide $slide) {
                            return view("dashboard.slide.action", compact("slide"));
                        }) 
                        ->editColumn('active', function(Slide $slide) {
                            $label = $slide->active == 1? 'success' : 'danger';
                            $text = $slide->active == 1? __('on') : __('off');
                            
                            return "<span class='label label-$label' >$text</span>";
                        }) 
                        ->editColumn('photo', function(Slide $slide) {  
                            return "<img onclick='viewImage(this)' src='". $slide->url . "' height='30px' class='w3-round' >";
                        }) 
                        ->rawColumns(['action', 'active', 'photo'])
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
            $slide = Slide::create($request->all()); 
            
            // upload slide photo
            Helper::uploadImg($request->file("photo"), "/slide", function($filename) use ($slide){
                $slide->update([
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
    public function edit(Slide $slide)
    { 
        return view("dashboard.slide.edit", compact("slide"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    { 
        try { 
            $slide->update($request->all());
              
            // upload category photo
            Helper::uploadImg($request->file("photo"), "/slide", function($filename) use ($slide){
                $slide->update([
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
    public function destroy(Slide $slide)
    { 
        try { 
            $slide->delete();
            return Message::success(Message::$DONE);
        } catch (\Exception $ex) {
            return Message::error(Message::$ERROR);
        }
    }
}
