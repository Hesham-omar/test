<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SessionsController extends Controller
{

    public function __construct(){
        $this->middleware('guest',[ 'except' => 'logout' ] );

    }

    public function loginView(){
        return view('sessions.create');
    }

    public function  login(){

        if(!auth()->attempt(request(['email','password'])))
            return back()->withErrors(['message'=>'pleas check your password or username']);

        return redirect()->home();
    }

    public function logout(){
        auth()->logout();
        return redirect()->home();
    }
}
