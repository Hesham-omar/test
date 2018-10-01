<?php

namespace App\Http\Controllers;

use App\customer;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class RegisterationController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }

    public function register(){
        return view('registeration.create');
    }

    public function store(Request $request){
        $item = new User(1);
        $item->name=$request['name'];
        $item->email=$request['email'];
        $item->password=$request['password'];
        $item->phone=$request['phone'];
        if($item->save()){
            $item1=new customer();
            $item1->user_id=$item->id;
            $item1->balance=$request['balance'];
            if(isset($request['block']))
                $item1->block=$request['block'];
            $item1->save();
            Auth::login($item1->user);
        }
        return redirect()->home();
    }
}
