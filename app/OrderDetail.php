<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{

    protected $table = "order_details";
    protected $fillable = [
        'product_id', 'order_id', 'total', 'price', 'amount', 'shipping_price'
    ];

    public function order() {
        return $this->belongsTo("App\Order");
    }
    
    public function product() {
        return $this->belongsTo("App\Product");
    }
    
    public function getTotal() {
        return ($this->price * $this->amount) + $this->shipping_price;
    }


}
