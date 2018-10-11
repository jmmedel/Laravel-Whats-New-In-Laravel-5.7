<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;
use App\Review;
use App\Wishlist;


class Product extends Model
{
    protected $fillable = [
        'productname', 'productcontent', 'productprice', 'WheelSize', 'ModelNumber','Color','category_id','Wattage','image','slug'
    ];
    // THIS function Category TO MAKE RELATHION WITH Product
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    // THIS function User TO MAKE RELATHION WITH Product
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    // THIS function Review TO MAKE RELATHION WITH Product
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
    // THIS function Wishlist TO MAKE RELATHION WITH Product
    public function Wishlists()
    {
        return $this->hasMany('App\Wishlist');
    } 


}
