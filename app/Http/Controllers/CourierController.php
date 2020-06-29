<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function queue()
    {
        return view('admin.courier.queue');
    }
}
