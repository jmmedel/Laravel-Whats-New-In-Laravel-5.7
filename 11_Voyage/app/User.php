<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Product;
use App\Review;
use App\Wishlist;
use App\Comment;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    // THIS function Reviews TO MAKE RELATHION WITH USERS
    public function Reviews()
    {
        return $this->hasMany('App\Review');
    }
     // THIS function comments TO MAKE RELATHION WITH USERS
     public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    // THIS function Products TO MAKE RELATHION WITH USERS
    public function Products()
    {
        return $this->hasMany('App\Product');
    }
    // THIS function Wishlists TO MAKE RELATHION WITH USERS
     public function Wishlists()
    {
        return $this->hasMany('App\Wishlist');
    }
    
}
