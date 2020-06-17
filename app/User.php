<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'email',
        'password'
    ];

    public function order()
    {
        return $this->hasMany('App\Order', 'user_id', 'id');
    }
}
