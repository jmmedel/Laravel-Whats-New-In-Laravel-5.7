<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewRequest;


class Reviewcontroller extends Controller
{


 
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function __construct() {
        $this->middleware('auth');
    }

   


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
      //To POST  Review Product OUT SIDE IN SHOW VIEW 
       $product = Product::findOrFail($request->product_id);
        Review::create([
            'Reviews_content' => $request->Reviews_content,
            'Reviews_one' => $request->Reviews_one,
            'Reviews_two' => $request->Reviews_two,
            'Reviews_three' => $request->Reviews_three,
            'Reviews_four' => $request->Reviews_four,
            'Reviews_five' => $request->Reviews_five,            
            'user_id' => Auth::id(),
            'product_id' => $product->id
        ]);
        return redirect()->route('products.show', $product->slug);
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
