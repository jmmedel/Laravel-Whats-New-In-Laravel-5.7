<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;
use App\Product;
use App\Review;


class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //To Get All Fresh Category OUT SIDE IN HOME VIEW YOU CAN CHANGE Paginate TO ANY NUMBER 
    	$freshcategores = Category::orderBy('created_at','order')->paginate(5);
        //To Get All Category OUT SIDE IN HOME VIEW
        $allcategores = Category::where('order', '=', '1')->orderBy('created_at','order')->get();
        //To Get All NEWS OUT SIDE IN HOME VIEW YOU CAN CHANGE Paginate TO ANY NUMBER
        $news = Post::orderBy('created_at','desc')->paginate(3);
        //To Get All Products OUT SIDE IN HOME VIEW YOU CAN CHANGE Paginate TO ANY NUMBER
        $Products = product::orderBy('productname','desc')->paginate(12);
        //To Get Review Products OUT SIDE IN HOME VIEW 
        $reviews = Review::all();
        return view('home',compact('freshcategores','allcategores','news','Products','reviews'));
    }


}
