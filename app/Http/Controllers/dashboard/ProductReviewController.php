<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\helper\Message;
use App\helper\Helper;
use App\Product;
use App\UserReview;
use App\Role; 
use DB;
use DataTables;

class ProductReviewController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.productreview.index");
    }

    /**
     * return json data
     */
    public function getData() {
        return DataTables::eloquent(Product::query())
                        ->addColumn('action', function(Product $productreview) { 
                            return view("dashboard.productreview.action", compact("productreview"));
                        }) 
                        ->addColumn('views', function(Product $product) {
                            return $product->getviews() . " <i class='fa fa-eye w3-text-green' ></i>";
                        }) 
                        ->addColumn('rates', function(Product $product) {
                            return UserReview::where("product_id", $product->id)->count() . " <i class='fa fa-star w3-text-orange' ></i>";
                        }) 
                        ->addColumn('comments', function(Product $product) {
                            return UserReview::where("comment", "!=", null)->where("product_id", $product->id)->count() . " <i class='fa fa-comment w3-text-teal' ></i>";
                        }) 
                        ->addColumn('rate', function(Product $product) {
                            $html = "";
                            for($i = 1; $i <= 5; $i ++) {
                                if ($i <= $product->getRate())
                                    $html .= "<i class='fa fa-star w3-text-orange' ></i>";
                                else
                                    $html .= "<i class='fa fa-star w3-text-gray' ></i>";
                            }
                            return $html;
                        }) 
                        ->rawColumns(['action', 'rates', 'comments', 'rate', 'views'])
                        ->toJson();
    } 
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    { 
        return view("dashboard.productreview.show", compact("product"));
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserReview $productreview)
    { 
        try { 
            $productreview->delete();
            
            return Helper::responseJson(1, Message::$DONE); 
        } catch (\Exception $ex) {
            return Helper::responseJson(0, Message::$ERROR);
        }
    }
}
