<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id','courier_id','order_code','address','note','product','total','payment_methode','payment_confirmation',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function courier()
    {
        return $this->belongsTo('App\Courier', 'courier_id', 'id');
    }
}
