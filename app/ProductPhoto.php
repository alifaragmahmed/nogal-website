<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\helper\ViewBuilder;

class ProductPhoto extends Model
{
    protected $table = "product_photos";

    protected $fillable = [
        'product_id',	'photo'	 
    ];

    protected $appends = [
    	'url'
    ];

    public function getUrlAttribute() {
    	return url('/images/products/') . '/' . $this->photo;
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
        foreach(Product::orderBy('created_at', 'desc')->get() as $item) 
            $data[] = [$item->id, $item->name];
            
        $builder->setAddRoute(url('/dashboard/productphoto/store'))
                ->setEditRoute(url('/dashboard/productphoto/update') . "/" . $this->id) 
                ->setCol(["name" => "id", "label" => __('id'), "editable" => false ]) 
                ->setCol(["name" => "product_id", "label" => __('product'), "type" => "select", "data" => $data, "col" => 'col-lg-12 col-md-12 col-sm-12', 'class' => 'select2']) 
                 
                ->setCol(["name" => "photo", "label" => __('photo'), "type" => "image", "col" => 'col-lg-12 col-md-12 col-sm-12', "required" => false])  
                ->setUrl(url('/images/products'))
                ->build();
        
        return $builder;
    }
}
