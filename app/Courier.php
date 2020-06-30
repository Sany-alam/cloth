<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    protected $fillable = [
        'name','email','phone',
    ];

    public function orders()
    {
        return $this->hasMany('App\Order', 'courier_id', 'id');
    }
}
