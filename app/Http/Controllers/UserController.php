<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($user = User::where([['email','=',$request->email],['password','=', $request->password]])->exists()) {
            // $credentials = $request->only();
            if (Auth::attempt(['email'=>$request->email,'password' => $request->password])) {
                if (session()->get('way-to-order')) {
                    return "go to checkout";
                }
                else{
                    return "success";
                }
            }
            else{
                return "kellafote";
            }
        }
        else{
            return "kellafote2";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (User::where([['email','=',$request->email],['password','=', $request->password]])->exists()) {
            return "error";
        }
        else {
            User::create(['email'=>$request->email,'password'=>$request->password]);
            return "success";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('user');
        return redirect('/');
    }
}
