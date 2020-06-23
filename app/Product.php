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
    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory','subcategory_id','id');
    }
}
