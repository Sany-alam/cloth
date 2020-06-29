<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    protected $fillable = [
        'name','email','phone','order_no',
    ];

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }
}
