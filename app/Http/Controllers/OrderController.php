<?php

namespace App\Http\Controllers;

use App\order;
use App\item;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('usertype:1');
    }

    public function index() {
        $orders=order::where('customer_id',auth()->id())->get();
        $orders= $orders->reverse();
        return view('orders.list',compact('orders'));
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
        $order=new order();
        $order->customer_id= auth()->user()->id;
        $order->created_at= \Carbon\Carbon::now();
        $order->updated_at=\Carbon\Carbon::now();

        if($order->save()){
            $items=item::whereIn('id',request('items'))->get()->toArray();
            $amounts=array_values(array_filter(request('amount')));
            $i=0;
            //dd($amounts);
            foreach ( $items as $item  ){
                $order->items()->attach($item['id'],['amount'=> $amounts[$i]]);
                $i++;
            }
            return redirect('/order');
        }
        else
            return back()->withErrors('message','error while saving an order');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }
}
