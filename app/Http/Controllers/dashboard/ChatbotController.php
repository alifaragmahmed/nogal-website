<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 
use App\helper\Message;
use App\helper\Helper;
use App\Chatbot; 
use App\Category; 
use App\Product; 
use DB;
use DataTables;
use Illuminate\Http\JsonResponse;

class ChatbotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.chatbot.index");
    }

    public function getChatView() {

        return view("website.layouts.chat");
    }

    /**
     * return json data
     */
    public function getData() {
        return DataTables::eloquent(Chatbot::query())
                        ->addColumn('action', function(Chatbot $chatbot) {
                            return view("dashboard.chatbot.action", compact("chatbot"));
                        }) 
                        ->rawColumns(['action'])
                        ->toJson();
    } 
     
    public function getQuestions()
    {
        $questions =  Chatbot::all()->toArray();
        
        foreach(Category::all() as $item) {
            $question = new Chatbot; 
            $images = $item->getGallery();
             
            
            $question->question =  
            strtolower($item->name_en) . " " . 
            strtolower($item->name_en) . "s " . 
            $item->name_ar;
            $question->answer = Chatbot::getRandGreets() . 
            " !! you can see all " . 
            $item->name_en . "'s products  <br>".$images." <br><a href='".url('shop')."?category_id=".$item->id."' target='_blank'   >here</a> ";
        
            $questions[] = $question;
        }

        foreach (Product::all() as $item) {
            $question = new Chatbot; 
            $images = '';
            if ($item->photos()->first()) {
                $images = '
                    <img  src="' . $item->photos()->first()->url . '" style="width: 90%" >
                ';
            }
            $question->question =  
            strtolower(str_replace('"', '', $item->description_en)) . " " . 
            str_replace('"', '', $item->description_ar) . " " . 
            strtolower($item->name_en) . " \n " . 
            str_replace('', '', $item->name_ar) . " \n " . 
            str_replace('"', '', $item->keywords) . " " . 
            str_replace('"', '', $item->frame_material) . " " . 
            str_replace('"', '', $item->brand) . " " . 
            str_replace('"', '', $item->material);
            $question->answer = 
            " i think your ask about this product " . 
            $item->name_en . "  <br>".$images." <br>".$item->description_en."<br><a href='".url('show/product')."/".$item->id."' target='_blank'   >here</a> ";
        
            $questions[] = $question;
        }
        
        return $questions;
    
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
            $chatbot = Chatbot::create($request->all());
             
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
    public function edit(Chatbot $chatbot)
    { 
        return $chatbot->getViewBuilder()->loadEditView();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chatbot $chatbot)
    { 
        try {
            $chatbot->update($request->all());
             
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
    public function destroy(Chatbot $chatbot)
    {  
            $chatbot->delete();
            return Message::success(Message::$DONE);
    }
}
