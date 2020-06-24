<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','domain_id','slug'
    ];

    public function domain()
    {
        return $this->belongsTo('App\Domain', 'domain_id', 'id');
    }

    public function subcategories()
    {
        return $this->hasMany('App\Subcategory', 'category_id', 'id');
    }
}
