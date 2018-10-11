<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Post;


class Category extends Model
{
    protected $fillable = [
        'parent_id', 'order', 'name', 'slug', 'ModelNumber','Color','category_id','Wattage','image','slug'
    ];
   
    // THIS function Product TO MAKE RELATHION WITH CATEGORY
     public function Product()
    {
        return $this->hasMany('App\Product');
    }
    // THIS function NEWS TO MAKE RELATHION WITH CATEGORY
    public function news()
    {
        return $this->hasMany('App\Post');
    }




}
