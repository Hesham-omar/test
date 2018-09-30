<?php

namespace App\Http\Controllers;

use App\category;
use App\item;
use App\item_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ItemController extends Controller
{

    public function __construct() {
        $this->middleware('usertype:0',['except' => 'index']);
    }

    public function index(category $category=null){
        if(isset($category))
            $items=item::where('category_id',$category->id)->get();
        else
            $items=item::all();

        return view('items.list',compact('items'));
    }

    public function create(){
        $categories=category::all();
        return view('items.create',compact('categories'));
    }

    public function store(Request $request){
        $item = new item;
        $item->name=$request['name'];
        $item->price=$request['price'];
        $item->category_id=$request['category_id'];
        $item->save();
        return redirect()->home();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(item $item)
    {
        $categories=category::all();
        return view('items.edit',compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, item $item)
    {
        $item->name=$request['name'];
        $item->price=$request['price'];
        $item->category_id=$request['category_id'];
        $item->update();
        return redirect()->home();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(item $item)
    {
        $item->delete();
        return redirect()->home();
    }
}
