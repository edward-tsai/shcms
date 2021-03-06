<?php

namespace App\Http\Controllers;

use App\Item;
use App\ShopCart;
use Illuminate\Http\Request;

use App\Http\Requests;

class ShopCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        foreach (ShopCart::all() as $item){
//            dump($item -> goods -> showUrl());
//        }
        return view('shop_cart/list', [
            'models' => ShopCart::whereUserId(\Auth::user()->id) -> orderBy('id', 'desc') -> get(),
        ]);
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
        $data = $request -> all();

        $data['user_id'] = \Auth::user() -> id;
        ShopCart::create($data);

        return \Redirect::back()->with('success', "'加入购物车成功'");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ShopCart::find($id) -> delete();
        return \Redirect::back()->with('success', "'删除成功'");
    }
}
