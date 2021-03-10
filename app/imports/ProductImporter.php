<?php

namespace App\imports; 

use Maatwebsite\Excel\Concerns\ToModel;
use App\Product;
use App\Category;

class ProductImporter  implements ToModel
{
    
    /**
     * @param array $row
     *
     * @return User|null
     */
     
    public function model(array $row)
    {  
        
        if ( is_numeric($row[2]) && 
             is_numeric($row[3]) &&
             is_numeric($row[4]) &&
             is_numeric($row[5]) &&
             is_numeric($row[6]) &&
             in_array($row[6], [1, 0]) &&
             in_array($row[7], [1, 0])   ) {
            
            $category = Category::where('name_en', $row[8])->orWhere('name_ar', $row[8])->first();
            
            if (!$category)
                $category = Category::create([ "name_en" => $row[8], "name_ar" => $row[8]]);
            
            
            return new Product([
               'name_en'            => $row[0],
               'name_ar'            => $row[1],
               'price_en'           => $row[2],
               'price_ar'           => $row[3],
               'shipping_price'     => $row[4], 
               'amount'             => $row[5], 
               'active'             => $row[6], 
               'is_pay'             => $row[7], 
               'category_id'        => $category->id , 
               'descriptio_en'      => $row[9], 
               'descriptio_ar'      => $row[10], 
               'keywords'           => $row[11], 
            ]);
        
             }
        return null;
    }

    
}
