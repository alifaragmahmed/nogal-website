<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\helper\ViewBuilder;

class Instagram extends Model
{
    protected $table = "instagrams";

    protected $fillable = [
        'link', 
        'photo'
    ];
    
    protected $appends = [ 'url' ];


    public function getUrlAttribute() { 
        return url('/images/instagram') . "/" . $this->photo;
    }
    

    /**
     * build view object this will make view html
     * 
     * @return ViewBuilder
     */
    public function getViewBuilder() {
        $builder = new ViewBuilder($this, "rtl");
 
        $builder->setAddRoute(url('/dashboard/instagram/store'))
                ->setEditRoute(url('/dashboard/instagram/update') . "/" . $this->id) 
                ->setCol(["name" => "id", "label" => __('id'), "editable" => false ]) 
                ->setCol(["name" => "link", "label" => __('link'), "col" => 'col-lg-12 col-md-12 col-sm-12'])  
                
                ->setCol(["name" => "photo", "label" => __('photo'), "type" => "image", "col" => 'col-lg-12 col-md-12 col-sm-12', "required" => false])  
                ->setUrl(url('/images/instagram'))
                ->build();
        
        return $builder;
    }
}
