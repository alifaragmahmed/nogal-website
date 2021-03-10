<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductView extends Model
{
    protected $table = "product_views";

    protected $fillable = [
        'product_id',	'ip'	 
    ]; 

    public function product() {
    	return $this->belongsTo("App\Product");
    }
}
