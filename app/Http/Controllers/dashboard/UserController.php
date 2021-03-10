<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\helper\Helper;
use App\helper\Message;
use App\Role; 
use DB;
use DataTables;

class UserController extends Controller {

    /**
     * Display a listing of the resource. 
     */
    public function index() { 
        return view("dashboard.user.index");
    }

    /**
     * return json data
     */
    public function getData() {
        return DataTables::eloquent(User::query())
                        ->addColumn('action', function(User $user) {
                            return view("dashboard.user.action", compact("user"));
                        }) 
                        ->editColumn('active', function(User $user) {
                            $label = $user->active == '1'? 'success' : 'danger';
                            $text = $user->active == '1'? __('on') :  __('off');
                            
                            return "<span class='label label-$label' >$text</span>";
                        }) 
                        ->editColumn('role', function(User $user) {
                            $label = $user->role == 'ADMIN'? 'warning' : 'info';
                            $text = $user->role == 'ADMIN'? __('admin') : __('visitor');
                            
                            return "<span class='label label-$label' >$text</span>";
                        }) 
                        ->editColumn('photo', function(User $user) {  
                            return "<img onclick='viewImage(this)' src='" . $user->url . "' height='30px' class='w3-round' >";
                        }) 
                        ->rawColumns(['action', 'active', 'photo', 'role'])
                        ->toJson();
    } 
    
    /**
     * return view of edit modal
     * 
     * @param User $user
     * @return type
     */
    public function edit(User $user) { 
        return $user->getViewBuilder()->loadEditView();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {
            if (User::where("email", $request->email)->count() > 0)
                return Message::error(Message::$EMAIL_ERROR);
            
            $user = User::create($request->all());
            
            // upload category photo
            Helper::uploadImg($request->file("photo"), "/users", function($filename) use ($user){
                $user->update([
                    "photo" => $filename
                ]);
            });
            
            return Message::success(Message::$DONE);
        } catch (\Exception $ex) {
            return Message::error(Message::$ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user) {
        try {  
            if (User::where("email", $request->email)->count() > 0 && $user->email != $request->email)
                return Message::error(Message::$EMAIL_ERROR); 
            
            $user->update($request->all());
            
            if ($user->password != $request->password)
                $user->password = bcrypt($request->password);
            
            // upload category photo
            Helper::uploadImg($request->file("photo"), "/users", function($filename) use ($user){
                $user->update([
                    "photo" => $filename
                ]);
            });
            
            $user->update();
            
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
    public function destroy(User $user) { 
        try { 
            $user->delete(); 
            return Message::success(Message::$REMOVE);
        } catch (\Exception $exc) {
            return Message::error(Message::$ERROR);
        }
    }

}
