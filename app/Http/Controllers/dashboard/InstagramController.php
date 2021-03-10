<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 
use App\helper\Message;
use App\helper\Helper;
use App\Instagram; 
use DB;
use DataTables;

class InstagramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.instagram.index");
    }

    /**
     * return json data
     */
    public function getData() {
        return DataTables::eloquent(Instagram::query())
                        ->addColumn('action', function(Instagram $instagram) {
                            return view("dashboard.instagram.action", compact("instagram"));
                        })->editColumn('photo', function(Instagram $instagram) {
                            return "<img src='" . $instagram->url . "' height='30px' />";
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
            $instagram = Instagram::create($request->all());
            
            // upload instagram photo
            Helper::uploadImg($request->file("photo"), "/instagram", function($filename) use ($instagram){
                $instagram->update([
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
    public function edit(Instagram $instagram)
    { 
        return $instagram->getViewBuilder()->loadEditView();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instagram $instagram)
    { 
        try {
            $instagram->update($request->all());
            
            // upload instagram photo
            Helper::uploadImg($request->file("photo"), "/instagram", function($filename) use ($instagram){
                $instagram->update([
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
    public function destroy(Instagram $instagram)
    { 
        try {
            unlink(public_path() . "/images/instagram/" . $instagram->photo); 
        } catch (\Exception $ex) {
            //return Message::error(Message::$ERROR);
        }
            $instagram->delete();
            return Message::success(Message::$DONE);
    }
}
