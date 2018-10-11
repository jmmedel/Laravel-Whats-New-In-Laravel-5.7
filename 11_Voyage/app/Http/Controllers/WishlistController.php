<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WishlistRequest;


class WishlistController extends Controller
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
       // TO POST Wishlist Product YOU LOVE IN YOUR Wishlist PAGE
        $product = Product::findOrFail($request->product_id);
        Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id
        ]);
        return redirect()->route('products.show', $product->slug);
    }
    
    // function Wishlist Product PAGE
    public function wishlist()
    {
        // TO GET AUTH USER
        $user = Auth::user();
        // TO GET USER Wishlists ALL
        $user->Wishlists;
        // TO GET USER Wishlists SINGLE
        $Wishlists = $user->Wishlists;
        return view('products.wishlist',compact('user','Wishlists'));
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
        // TO GET Wishlist SINGLE
        $review = Wishlist::findOrFail($id);
        // TO GET Wishlist SINGLE AND delete IT
        $review->delete();
        // TO RETURN BACK BAGE
        return back();
    }
}
