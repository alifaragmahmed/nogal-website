<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use App\Category;
use App\User;
use App\Order;
use DB;

class DashboardController extends Controller
{
    
    /**
     * return index file of dashboard
     * 
     * @return object
     */
    public function index() {
        $this->checkIfLogin();
        
        return view("dashboard.index");
    }

    /**
     * check in cookie if the user login before
     */
    public function checkIfLogin() {
        if (isset($_COOKIE["user"])) {
            session(["user" => $_COOKIE["user"]]);
        }
    }

    
    /**
     * main page in dashboard
     * @return type
     */
    public function main() {
        $products = Product::count();
        $categories = Category::count();
        $users = User::count();
        $orders = Order::count();
        
        $productsViews = DB::select("SELECT DISTINCT product_id as p, (select count(ip) from `product_views` where product_id=p ) as count  FROM `product_views` ");
        $productsAmounts = DB::select("SELECT DISTINCT product_id as p, (select sum(amount) from `order_details` where product_id=p ) as amount FROM `order_details`  ");
         
        return view("dashboard.main", compact("products", "categories", "users", "orders", "productsViews", "productsAmounts"));
    }
}
