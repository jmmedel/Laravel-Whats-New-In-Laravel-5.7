<?php

namespace App;
use App\User;
use App\Product;
 use App\Wishlist;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    
    protected $fillable = [
        'product_id','user_id'
    ];

    protected $with = ['user'];
    
    /**
     * Get the Product that owns the Review.
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    // THIS function UserS TO MAKE RELATHION WITH Wishlist
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    
}


