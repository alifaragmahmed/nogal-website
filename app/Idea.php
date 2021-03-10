<?php

namespace App;

use App\helper\ViewBuilder;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $table = "ideas";

    protected $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'photo'
    ];
    
    protected $appends = [ 'url' ];


    public function getUrlAttribute() { 
        return url('/images/idea') . "/" . $this->photo;
    }
    

    /**
     * build view object this will make view html
     * 
     * @return ViewBuilder
     */
    public function getViewBuilder() {
        $builder = new ViewBuilder($this, "rtl");
 
        $builder->setAddRoute(url('/dashboard/idea/store'))
                ->setEditRoute(url('/dashboard/idea/update') . "/" . $this->id) 
                ->setCol(["name" => "id", "label" => __('id'), "editable" => false ]) 
                ->setCol(["name" => "title_en", "label" => __('title_en'), "col" => 'col-lg-12 col-md-12 col-sm-12']) 
                ->setCol(["name" => "title_ar", "label" => __('title_ar'), "required" => false, "col" => 'col-lg-12 col-md-12 col-sm-12'])  
                ->setCol(["name" => "description_en", "label" => __('description_en'), "type" => "textarea", "required" => false, "col" => 'col-lg-12 col-md-12 col-sm-12'])  
                ->setCol(["name" => "description_ar", "label" => __('description_ar'), "type" => "textarea", "required" => false, "col" => 'col-lg-12 col-md-12 col-sm-12'])  
                
                ->setCol(["name" => "photo", "label" => __('photo'), "type" => "image", "col" => 'col-lg-12 col-md-12 col-sm-12', "required" => false])  
                ->setUrl(url('/images/idea'))
                ->build();
        
        return $builder;
    }
}
