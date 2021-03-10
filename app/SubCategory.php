<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\helper\ViewBuilder;
use \Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use SoftDeletes;

    protected $table = "sub_categories";
    
    protected $fillable = [
        'name_en', 'name_ar', 'photo', 'category_id'
    ];

    protected $appends = [ 'url', 'name' ];


    public function getUrlAttribute() { 
        return url('/images/subcategory') . "/" . $this->photo;
    }

    public function getNameAttribute() { 
        return (Lang::getLang() == 'Ar')? $this->name_ar : $this->name_en;
    }
    
    public function category() {
        return $this->belongsTo("App\Category");
    }

    /**
     * build view object this will make view html
     * 
     * @return ViewBuilder
     */
    public function getViewBuilder() {
        $builder = new ViewBuilder($this, "rtl");

        $data = [];
        foreach (Category::get() as $item) {
            $data[] = [$item->id, Lang::getLang() == 'AR'? $item->name_ar : $item->name_en];
        }

        $builder->setAddRoute(url('/dashboard/subcategory/store'))
                ->setEditRoute(url('/dashboard/subcategory/update') . "/" . $this->id)
                ->setCol(["name" => "id", "label" => __('id'), "editable" => false])
                ->setCol(["name" => "name_en", "label" => __('name_en'), "col" => 'col-lg-12 col-md-12 col-sm-12'])
                ->setCol(["name" => "name_ar", "label" => __('name_ar'), "required" => false, "col" => 'col-lg-12 col-md-12 col-sm-12'])
                ->setCol(["name" => "category_id", "label" => __('category'), "required" => false, "col" => 'col-lg-12 col-md-12 col-sm-12', 'type' => 'select', 'data' => $data])
                ->setCol(["name" => "photo", "label" => __('photo'), "type" => "image", "col" => 'col-lg-12 col-md-12 col-sm-12', "required" => false])
                ->setUrl(url('/images/subcategory'))
                ->build();

        return $builder;
    }
}
