<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\helper\ViewBuilder;

class Blog extends Model
{
    protected $table = "blogs";

    protected $fillable = [
        'description_en',
        'description_en',
        'link',
        'photo'
    ];
    
    protected $appends = [ 'url' ];


    public function getUrlAttribute() { 
        return url('/images/blog') . "/" . $this->photo;
    }
    

    /**
     * build view object this will make view html
     * 
     * @return ViewBuilder
     */
    public function getViewBuilder() {
        $builder = new ViewBuilder($this, "rtl");
 
        $builder->setAddRoute(url('/dashboard/blog/store'))
                ->setEditRoute(url('/dashboard/blog/update') . "/" . $this->id) 
                ->setCol(["name" => "id", "label" => __('id'), "editable" => false ])  
                ->setCol(["name" => "description_en", "label" => __('description_en'), "type" => "textarea", "required" => false, "col" => 'col-lg-12 col-md-12 col-sm-12']) 
                ->setCol(["name" => "description_en", "label" => __('description_en'), "type" => "textarea", "required" => false, "col" => 'col-lg-12 col-md-12 col-sm-12'])  
                ->setCol(["name" => "link", "label" => __('link'), "type" => "url", "required" => false, "col" => 'col-lg-12 col-md-12 col-sm-12'])  
                
                ->setCol(["name" => "photo", "label" => __('photo'), "type" => "image", "col" => 'col-lg-12 col-md-12 col-sm-12', "required" => false])  
                ->setUrl(url('/images/blog'))
                ->build();
        
        return $builder;
    }
}
