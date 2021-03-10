<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\helper\ViewBuilder;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    
    protected $table = "products";
    protected $fillable = [
        'name_en', 
        'name_ar', 
        'price_en', 
        'price_ar',
        'price_en_discount', 
        'price_ar_discount',
       
        'description_en', 
        'description_ar', 
        'active', 
        'amount',
        'category_id', 
        'keywords', 
        'is_pay', 
        'shipping_price',
        'price_en_after',
        'price_ar_after',
        'dimension', 
        'material',
        'item',
        'frame_material',
        'seat_depth',
        'brand',
    ]; 
    
    protected $appends = [
        'name'
    ];
    
    public function canSold() {
        return ($this->price_ar > 0);
    }
     
    
    public function getNameAttribute() { 
        return (Lang::getLang() == 'Ar')? $this->name_ar : $this->name_en;
    }
 
    public function category() {
        return $this->belongsTo("App\Category", 'category_id');
    }
    
    public function photos() {
        return $this->hasMany("App\ProductPhoto");
    }
    
    public function colors() {
        return $this->hasMany("App\ProductColor");
    }
    
    
    public function addView($ip) {
        $view = ProductView::where("ip", $ip)->where("product_id", $this->id)->first();
        
        if (!$view) {
            $view = ProductView::create([
                "ip" => $ip,
                "product_id" => $this->id
            ]);
        }
        
        return $view;
    }

    /**
     * build view object this will make view html
     * 
     * @return ViewBuilder
     */
    public function getViewBuilder() {
        $builder = new ViewBuilder($this, "rtl");
        
        $data1 = [];
        $data2 = [];
        
        foreach(Category::get() as $item) {
            $data1[] = [$item->id, Lang::getLang() == 'AR'? $item->name_ar : $item->name_en];
        }
        
        foreach(SubCategory::get() as $item) {
            $data2[] = [$item->id, Lang::getLang() == 'AR'? $item->name_ar : $item->name_en];
        }

        $builder->setAddRoute(url('/dashboard/product/store'))
                ->setEditRoute(url('/dashboard/product/update') . "/" . $this->id)
                ->setCol(["name" => "id", "label" => __("id"), "editable" => false])
                ->setCol(["name" => "name_en", "label" => __('name_en')])
                ->setCol(["name" => "name_ar", "label" => __('name_ar'), "required" => false])    
       
                ->setCol(["name" => "category_id", "type" => "select", "label" => __('category'), "data" => $data1]) 
                //->setCol(["name" => "price_en", "label" => __('price US'), "type" => "number"])
                ->setCol(["name" => "price_ar", "label" => __('price EGP'), "type" => "number"]) 
                
                // ->setCol(["name" => "price_en_discount", "label" => __('price US Discount '), "type" => "number", "required" => false])
                ->setCol(["name" => "price_ar_discount", "label" => __('price EGP Discount'), "type" => "number", "required" => false]) 
              
                ->setCol(["name" => "shipping_price", "label" => __('shipping_price'), "type" => "number"])
                ->setCol(["name" => "amount", "label" => __('amount'), "type" => "number"])
                ->setCol(["name" => "description_en", "type" => "textarea", "label" => __('description_en'), "required" => false])
                ->setCol(["name" => "description_ar", "type" => "textarea", "label" => __('description_ar'), "required" => false])
                ->setCol(["name" => "keywords", "type" => "textarea", "label" => __('keywords'), "required" => false])
                ->setCol(["name" => "dimension", "type" => "textarea", "label" => __('dimension'), "required" => false])
                 
                ->setCol(["name" => "material", "type" => "textarea", "label" => __('material'), "required" => false])
                ->setCol(["name" => "item", "type" => "textarea", "label" => __('item'), "required" => false])
                ->setCol(["name" => "frame_material", "type" => "textarea", "label" => __('frame material'), "required" => false])
                ->setCol(["name" => "seat_depth", "type" => "textarea", "label" => __('seat depth'), "required" => false])
                ->setCol(["name" => "brand", "type" => "textarea", "label" => __('brand'), "required" => false])
                 ->setCol(["name" => "active", "label" => __('active'), "type" => "checkbox", "value" => 1])
                ->setCol(["name" => "is_pay", "label" => __('enable for online orders'), "type" => "checkbox", "value" => 0])
               
                //->setCol(["name" => "photo", "label" => __('photo'), "type" => "image", "required" => false])
                ->setUrl(url('/images/product'))
                ->build();

        return $builder;
    }
}
