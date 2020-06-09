<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','category_id','size','price','weight','fabric','stock','description','brand','color'
    ];
    public function images()
    {
        return $this->hasMany('App\Image','product_id','id');
    }
    public function category()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }
}
