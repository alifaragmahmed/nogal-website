<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\helper\ViewBuilder;

class ProductColor extends Model
{
    protected $table = "product_colors";

    protected $fillable = [
        'product_id',	'color_photo'	 
    ];

    protected $appends = [
    	'url'
    ];

    public function getUrlAttribute() {
    	return url('/images/colors/') . '/' . $this->color_photo;
    }

    public function product() {
        return $this->belongsTo("App\Product");
    }
    
    

    /**
     * build view object this will make view html
     * 
     * @return ViewBuilder
     */
    public function getViewBuilder() {
        $builder = new ViewBuilder($this, "rtl");
 
        $data = [];
        foreach(Product::get() as $item) 
            $data[] = [$item->id, $item->name];
            
        $builder->setAddRoute(url('/dashboard/productcolor/store'))
                ->setEditRoute(url('/dashboard/productcolor/update') . "/" . $this->id) 
                ->setCol(["name" => "id", "label" => __('id'), "editable" => false ]) 
                ->setCol(["name" => "product_id", "label" => __('product'), "type" => "select", "data" => $data, "col" => 'col-lg-12 col-md-12 col-sm-12']) 
                 
                ->setCol(["name" => "color_photo", "label" => __('photo'), "type" => "image", "col" => 'col-lg-12 col-md-12 col-sm-12', "required" => false])  
                ->setUrl(url('/images/colors'))
                ->build();
        
        return $builder;
    }
}
