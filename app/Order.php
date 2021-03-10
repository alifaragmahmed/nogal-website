<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = "orders";
    protected $fillable = [
        'user_id', 
        'first_name', 
        'last_name',
        'zipcode', 
        'city', 
        'email', 
        'phone',
        'total', 
        'discount', 
        'additional',
        'visa', 
        'paid', 
        'address',
        'total',
        'status'
    ];

    public function user() {
        return $this->belongsTo("App\User");
    }

    public function details() {
        return $this->hasMany("App\OrderDetail");
    }
    
    public function getDiscountValue() {
        return $this->getTotal() * $this->discount;
    }
    
    public function getTotal() {
        $total = 0;
        
        foreach($this->details()->get() as $item) {
            $total += $item->getTotal();
        }
        
        return $total;
    }
    
    public function getAdditionalValue() {
        return $this->getTotal() * $this->additional;
    }
    
    public function getShipingTotal() {
        $shippingTotal = 0;
        foreach($this->details()->get() as $item) {
            $shippingTotal += $item->shipping_price;
        }
        
        return $shippingTotal;
    }
}
