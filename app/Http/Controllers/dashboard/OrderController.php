<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\helper\Message;
use App\helper\Helper;
use App\Order;
use App\Role; 
use App\Option; 
use DB;
use DataTables;

class OrderController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.order.index");
    }

    /**
     * return json data
     */
    public function getData() {
        $query = Order::query();
        
        if (request()->status) {
            $query->where('status', request()->status);
        }
        
        return DataTables::eloquent($query)
                        ->addColumn('action', function(Order $order) {
                            return view("dashboard.order.action", compact("order"));
                        }) 
                        ->addColumn('user', function(Order $order) {
                            return optional($order->user)->name;
                        })  
                        ->rawColumns(['action'])
                        ->toJson();
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {   
        return view("dashboard.order.show", compact("order"));
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request, Order $order)
    { 
        try {
            $order->update($request->all());
            
            return Message::success(Message::$EDIT);
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
    public function update(Request $request, Order $order)
    { 
        try {
            $order->update($request->all());
            
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
    public function destroy(Order $order)
    { 
        try {  
            $order->details()->delete();
            $order->delete();
            return Message::success(Message::$DONE);
        } catch (\Exception $ex) {
            return Message::error(Message::$ERROR);
        }
    }
}
