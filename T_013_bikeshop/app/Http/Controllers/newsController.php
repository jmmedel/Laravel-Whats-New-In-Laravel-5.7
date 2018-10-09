<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\User;
use App\Http\Requests;
use App\Post;

class newsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //To Get All Posts OUT SIDE IN NEWS VIEW YOU CAN CHANGE Paginate TO ANY NUMBER
        $posts = Post::orderBy('created_at','DESC')->limit(10)->paginate(4);
        return view('news.index',compact('posts'));
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
        //To Get All Post OUT SIDE IN HOME VIEW IT COME WITH SLUG SO THIS GOOD WITH SEO
        $post = Post::where('slug', '=', $slug)->firstOrFail();
        //To Get All Post Populars OUT SIDE IN HOME VIEW YOU CAN CHANGE OUR Paginate  
        $postspopulars = Post::orderBy('created_at','desc')->paginate(20);
        //To Get All Comments Post  OUT SIDE IN HOME VIEW
        $comments = $post->comments;
        return view('news.show', compact('post','postspopulars','comments'));
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
