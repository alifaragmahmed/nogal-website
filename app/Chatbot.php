<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\helper\ViewBuilder;

class Chatbot extends Model
{
    protected $table = "chatbot";

    protected $fillable = [
        'question',
        'answer'
    ];
     
    
    public static function getRandGreets() {
        $greets = [
            'fine 😎 ', 'good 😮️ ', 'nice 🥰 ', 'excellent 🤩 ', 'fantastic 😉 ', 'great 🤩 '
        ];
        
        $index = rand(0, count($greets) - 1);
        
        return $greets[$index];
    }
 
    

    /**
     * build view object this will make view html
     * 
     * @return ViewBuilder
     */
    public function getViewBuilder() {
        $builder = new ViewBuilder($this, "rtl");
 
        $builder->setAddRoute(url('/dashboard/chatbot/store'))
                ->setEditRoute(url('/dashboard/chatbot/update') . "/" . $this->id) 
                ->setCol(["name" => "id", "label" => __('id'), "editable" => false ])  
                ->setCol(["name" => "question", "label" => __('question'), "type" => "textarea", "required" => false, "col" => 'col-lg-12 col-md-12 col-sm-12']) 
                ->setCol(["name" => "answer", "label" => __('answer'), "type" => "textarea", "required" => false, "col" => 'col-lg-12 col-md-12 col-sm-12', 'class' => 'editor'])   
                ->setUrl(url('/images/chatbot'))
                ->build();
        
        return $builder;
    }
}
