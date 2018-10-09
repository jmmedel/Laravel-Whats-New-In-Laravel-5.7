<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Review;

/*
    |--------------------------------------------------------------------------
    | category Controller
    |--------------------------------------------------------------------------  
*/

class categorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //To Get All Fresh Category OUT SIDE IN HOME VIEW
        $freshcategores = Category::orderBy('created_at','order')->paginate(5);
        //To Get All Category OUT SIDE IN HOME VIEW
        $allcategores = Category::where('order', '=', '1')->orderBy('created_at','order')->get();
        //To Get All Fresh Product OUT SIDE IN HOME VIEW
        $Products = product::orderBy('productname','desc')->paginate(12);
        //To Get All Review Product OUT SIDE IN HOME VIEW
        $reviews = Review::all();
        return view('category.index',compact('freshcategores','allcategores','Products','reviews'));

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
        //To Get SINGLE Category OUT SIDE IN SHOW VIEW REMEMBER IT GET WITH SLUG SO THIS BEST FOR SEO 
        $category = Category::where('slug', '=', $slug)->firstOrFail();
        //To Get Products WITH SINGLE Category OUT SIDE IN SHOW VIEW
        $Products = Product::where('category_id','=', $category->id)->paginate(1);
        //To Get  Review Products WITH SINGLE Category OUT SIDE IN SHOW VIEW
        $reviews = Review::all();
        return view('category.show',compact('category','Products','reviews'));
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
