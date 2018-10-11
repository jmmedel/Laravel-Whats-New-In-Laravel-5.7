<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\Category;
use App\Http\Requests;
use App\Product;
use Session, DB;

class searchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {                      
           // Gets the query string from our form submission 
           $search = \Request::get('search');
           // Searches for posts titles //
           $posts = Post::where('title', 'LIKE', '%' . $search . '%')->paginate(5);
           // Searches for Product titles //
           $Products = Product::where('productname', 'LIKE', '%' . $search . '%')->paginate(5);
           return view('search', compact('posts','Products','search'));
    }

    
}
