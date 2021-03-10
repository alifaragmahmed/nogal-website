<?php

namespace App\Http\Controllers\Website;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $query = Product::query()->where("active", 1);

        if ($request->category_id)
        {
            $query->where("category_id", $request->category_id);
        }
           

         if ($request->from && $request->to )
         {
            $query->whereBetween('price_ar', [$request->from, $request->to]);
            $query->where("category_id", $request->category_id);
         } 

         if ($request->search) {
            $search = $request->search;
            $query
            ->where('name_ar', 'like', "%".$search."%")
            ->orWhere('name_en', 'like', "%".$search."%")
            ->orWhere('description_ar', 'like', "%".$search."%") 
            ->orWhere('description_en', 'like', "%".$search."%")
            ->orWhere('material', 'like', "%".$search."%");
         }
          


        /*$products = Product::where(function ($q) use ($request) {
           
            if ($request->has('category_id') && !empty($request->category_id)) {
                $q->where('category_id',$request->category_id);
            }
        })->latest()
        ->paginate(6);*/

        $products = $query->latest()->orderBy('price_ar')->get();

        $categories = Category::orderBy('created_at', 'asc')->get();
      
       
        return view('website.shop',compact('products','categories'));
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
