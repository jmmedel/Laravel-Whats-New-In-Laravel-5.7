<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Review;


class Productscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //To Get Product OUT SIDE IN SHOW VIEW WITH SLUG GOOD WITH SEO
        $product = Product::where('slug', '=', $slug)->firstOrFail();
        //To Get Images Product OUT SIDE IN SHOW VIEW 
        $images = json_decode($product->image);
        //To Get Reviews Product OUT SIDE IN SHOW VIEW
        $reviews = $product->reviews;
        //To Get  Product Populars OUT SIDE IN SHOW VIEW CHANGE PAGINATE TO ANY NUMBER 
        $productpopulars = Product::orderBy('created_at','desc')->paginate(20);
        return view('products.show',compact('product','reviews','productpopulars'));
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
