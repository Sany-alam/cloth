<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','domain_id',
    ];

    public function domain()
    {
        return $this->belongsTo('App\Domain', 'domain_id', 'id');
    }
}
