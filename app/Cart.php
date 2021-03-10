<?php

namespace App;
 

class Cart  
{
    
    /**
     * add product to cart
     * 
     * @param type $product
     * @param type $amount
     */
    public static function add($product, $amount=1) {
        $products = session("products")? session("products") : [];
        
        if (isset($products[$product])) {
            if ($amount > 1)
                $products[$product] = $amount;
            else
                $products[$product] += $amount;
        } else
            $products[$product] = $amount;
        session(["products" => $products]);
    }
    
    /**
     * get all product from shopping cart
     * 
     * @return Array
     */
    public static function all() {  
        return session("products")? session("products") : [];
    }
    
    /**
     * get count product from shopping cart
     * 
     * @return Array
     */
    public static function count() {  
        return session("products")? count(session("products")) : 0;
    }
    
    /**
     * get total price of shopping cart
     * 
     * @return type
     */
    public static function getTotal() {
        $products = self::all();
        $total = 0;
        
        foreach ($products as $key => $value) {
            if (Product::find($key)) 
                $total += Product::find($key)->price_ar * $value;
        }
        
        return $total;
    }
    
    /**
     * remove product from cart
     * 
     * @param type $product
     */
    public static function remove($product) {
        $products = session("products")? session("products") : [];
        unset($products[$product]);
        session(["products" => $products]);
    }
    
    /**
     * remove all product from cart
     * 
     */
    public static function destroy() {
        session(["products" => null]);
    }
    
    
}
