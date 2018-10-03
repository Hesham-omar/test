<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SessionsController extends Controller {

    public function __construct(){
        $this->middleware('guest',[ 'only' => ['login','loginView'] ] );
        $this->middleware('usertype:1',[ 'only' => 'current' ] );
        $this->middleware('auth',[ 'only' => 'logout' ] );
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

    public function current(){
        $user=auth()->user();
        return view('sessions.test',compact('user'));
    }
}
