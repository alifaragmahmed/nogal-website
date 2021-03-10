<?php

namespace App\Http\Controllers\Website;
use App\Slide;
use App\Category;
use App\Product;

use App\Blog;
use App\Idea;
use App\OrderDetail;
use App\Instagram;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!session("locale")) {
            session(["locale" => "En"]);
            return redirect("/home");
        }
        $slides = Slide::where('active', 1)->get();
        $categories = Category::orderBy('name_en', 'desc')->get();
      //  $products = Product::get();

    
      $ids = OrderDetail::select('product_id')->distinct('product_id')->pluck('product_id')->toArray();
      $products = Product::whereIn('id', $ids)
      ->take(6)
      ->get();
      
        $blogs = Blog::take(6)->get();
        $ideas = Idea::take(6)->get();
        $instagrams = Instagram::get();
      
      
       
     
      

     
        return view('website.home', compact('slides','categories','products','blogs','ideas','instagrams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
