<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'post_id', 'Comment_content'
    ];

    protected $with = ['user'];
    /**
     * Get the Post that owns the Comment.
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
     // THIS function user TO MAKE RELATHION WITH Comment
    public function user()
    {
        return $this->belongsTo('App\User');
    } 
}
