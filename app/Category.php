<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;


use App\helper\ViewBuilder;

use DB;

class Category extends Model
{
    use SoftDeletes;
    
    protected $table = "categories";

    protected $fillable = [
        'name_en',
        'name_ar',	
        'photo'
    ];
    
    protected $appends = [ 'url', 'name' ];


    public function getUrlAttribute() { 
        return url('/images/category') . "/" . $this->photo;
    }

    public function getNameAttribute() { 
        return (Lang::getLang() == 'Ar')? $this->name_ar : $this->name_en;
    }


    public function product() {
    	return $this->hasMany("App\Product");
    }

    public function products() {
    	return $this->hasMany("App\Product");
    }
    
    public function subCategories() {
    	return $this->hasMany("App\SubCategory");
    }

    public function getGallery() {
        $html = "<div class='row'  ><div class='column' >";
        $imageCount = 4;
        $counter = 0;
        
        $items = ProductPhoto::join("products", "product_id", "=", "products.id") 
                                ->where("category_id", $this->id)
                                ->select("*", "products.id as id")
                                ->get();
        
        foreach($items as $item) {
            if ($counter < $imageCount) {
                $html .= "
                    <img src='".$item->url."' style='width: 100%;'   >
                ";

                if ($counter  == 1) {
                    $html .= "</div><div class='column' >";
                }
            }
            $counter ++;
        }
        
        $html .= "</div></div>";
        return $html;
    }

    /**
     * build view object this will make view html
     * 
     * @return ViewBuilder
     */
    public function getViewBuilder() {
        $builder = new ViewBuilder($this, "rtl");
 
        $builder->setAddRoute(url('/dashboard/category/store'))
                ->setEditRoute(url('/dashboard/category/update') . "/" . $this->id) 
                ->setCol(["name" => "id", "label" => __('id'), "editable" => false ]) 
                ->setCol(["name" => "name_en", "label" => __('name_en'), "col" => 'col-lg-12 col-md-12 col-sm-12']) 
                ->setCol(["name" => "name_ar", "label" => __('name_ar'), "required" => false, "col" => 'col-lg-12 col-md-12 col-sm-12'])  
                
                ->setCol(["name" => "photo", "label" => __('photo'), "type" => "image", "col" => 'col-lg-12 col-md-12 col-sm-12', "required" => false])  
                ->setUrl(url('/images/category'))
                ->build();
        
        return $builder;
    }
}
