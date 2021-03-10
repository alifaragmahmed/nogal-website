<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 
use App\helper\Message;
use App\helper\Helper;
use App\Idea; 
use DB;
use DataTables;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.idea.index");
    }

    /**
     * return json data
     */
    public function getData() {
        return DataTables::eloquent(Idea::query())
                        ->addColumn('action', function(Idea $idea) {
                            return view("dashboard.idea.action", compact("idea"));
                        })->editColumn('photo', function(Idea $idea) {
                            return "<img src='" . $idea->url . "' height='30px' />";
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
            $idea = Idea::create($request->all());
            
            // upload idea photo
            Helper::uploadImg($request->file("photo"), "/idea", function($filename) use ($idea){
                $idea->update([
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
    public function edit(Idea $idea)
    { 
        return $idea->getViewBuilder()->loadEditView();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Idea $idea)
    { 
        try {
            $idea->update($request->all());
            
            // upload idea photo
            Helper::uploadImg($request->file("photo"), "/idea", function($filename) use ($idea){
                $idea->update([
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
    public function destroy(Idea $idea)
    { 
        try { 
            unlink(public_path() . "/images/idea/" . $idea->photo);
        } catch (\Exception $ex) {
            //return Message::error(Message::$ERROR);
        }
            $idea->delete();
            return Message::success(Message::$DONE);
    }
}
