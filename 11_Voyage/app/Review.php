<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;


class Review extends Model
{
     protected $fillable = [
        'product_id','user_id','Reviews_content','Reviews_one','Reviews_two','Reviews_three','Reviews_four','Reviews_five'
    ];
    protected $with = ['user'];
    /**
     * Get the Product that owns the Review.
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    // THIS function User TO MAKE RELATHION WITH Product
    public function user()
    {
        return $this->belongsTo('App\User');
    } 
}
