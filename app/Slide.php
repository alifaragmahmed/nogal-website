<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\helper\ViewBuilder;

class Slide extends Model
{

    protected $table = "slides";
    protected $fillable = [
        'title_en', 'title_ar', 'description_en', 'description_ar', 'photo', 'active'
    ];
    
    protected $appends = [
        'url'
    ];
    
    public function getUrlAttribute() {
        return url('/images/slide') . '/' . $this->photo;
    }
    
    
    /**
     * build view object this will make view html
     * 
     * @return ViewBuilder
     */
    public function getViewBuilder() {
        $builder = new ViewBuilder($this, "rtl");
 
        $builder->setAddRoute(url('/dashboard/slide/store'))
                ->setEditRoute(url('/dashboard/slide/update') . "/" . $this->id) 
                ->setCol(["name" => "id", "label" => __('id'), "editable" => false ]) 
                ->setCol(["name" => "title_en", "label" => __('title_en'), "col" => 'col-lg-6 col-md-6 col-sm-6']) 
                ->setCol(["name" => "title_ar", "label" => __('title_ar'), "required" => false, "col" => 'col-lg-6 col-md-6 col-sm-6']) 
                ->setCol(["name" => "description_en", "type" => "textarea", "label" => __('description_en'), "required" => false, "col" => 'col-lg-12 col-md-12 col-sm-12'])
                ->setCol(["name" => "description_ar", "type" => "textarea", "label" => __('description_ar'), "required" => false, "col" => 'col-lg-12 col-md-12 col-sm-12']) 
                ->setCol(["name" => "photo", "label" => __('photo'), "type" => "image", "col" => 'col-lg-6 col-md-6 col-sm-6', "required" => false]) 
                ->setCol(["name" => "active", "label" => __('active'), "type" => "checkbox", "col" => 'col-lg-6 col-md-6 col-sm-6'])  
                ->setUrl(url('/images/slide'))
                ->build();
        
        return $builder;
    }
}
