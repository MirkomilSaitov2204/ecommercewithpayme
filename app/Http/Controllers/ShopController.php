<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->category){
            $products = Product::with('categories')->whereHas('categories',function($query){
                $query->where('slug', request()->category);


            })->get();

            $categories = Category::all();
            $categoryName = $categories->where('slug', request()->category)->first()->name;


        }else{
            $categories = Category::all();
            $products = Product::inRandomOrder()->take(9)->get();
            $categoryName = "Featured";
        }

        if(request()->sort == 'low_high'){
                $products = $products->sortBy('price');
        }elseif(request()->sort == 'high_low'){
            $products = $products->sortByDesc('price');
        }

        return view('shop')->with('products', $products)->with('categories', $categories)->with('categoryName', $categoryName);
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
    public function show($slug)
    {
        $product = Product::where('slug',$slug)->first();

        $mightLike = Product::where('slug','!=',$slug)->inRandomOrder()->take(4)->get();

        return view('product')->with('product',$product)->with('mightLike',$mightLike);
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
