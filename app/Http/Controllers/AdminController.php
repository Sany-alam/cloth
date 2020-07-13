<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $orders = Order::all();
        return view('admin.home',['users'=>$users,'orders'=>$orders]);
    }
}
