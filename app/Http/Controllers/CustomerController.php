<?php

namespace App\Http\Controllers;

use App\customer;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function __construct() {
        $this->middleware('usertype:0');
    }

    public function index() {
        $users=User::has('customer')->get();
        //dd($users);
        return view('customers.list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function block(customer $customer) {
        $customer->block=!$customer->block;
        $customer->update();
        return redirect('/customers');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function deposit(customer $customer) {

        $customer->balance=$customer->balance+(double) request('money');
        $customer->update();
        return redirect('/customers');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer)
    {
        //
    }
}
