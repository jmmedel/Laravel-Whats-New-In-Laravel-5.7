<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Comment;

class Post extends Model
{
   public $fillable = ['title','body'];


    // THIS function category TO MAKE RELATHION WITH Post
     public function category()
    {
        return $this->belongsTo('App\Category');
    }
    // THIS function comments TO MAKE RELATHION WITH Post
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
