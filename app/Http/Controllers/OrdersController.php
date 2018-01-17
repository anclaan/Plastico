<?php

namespace App\Http\Controllers;

use App\Order;
use App\Customer;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('auth:admin');
    }
    public function index()
    {
      $zamowienia = Order::all();
      $produkty = Product::all();
      return view('admin.orders.index')->with('zamowienia', $zamowienia);
    }
    public function showCreateForm()
    {

        $klienci = Customer::all();
        $typy = ProductType::pluck('nazwa','id');

        return view('admin/orders/create')->with(array('klienci' => $klienci,'typy' => $typy));
    }

    public function getProducts($id)
    {
      $products = DB::table("products")->where("productType_id",$id)->pluck("name","id");

        return json_encode($products);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $order = new Order();
      $order -> nazwa = $request -> nazwa;
      $order -> terminRealizacji = $request -> terminRealizacji;
      $order -> dataRealizacji = $request -> dataRealizacji;
      $order -> customer_id = $request -> klient;


      $order -> save();
      $produkty = Product::all();
      return view('admin/orders/addProducts')->with('produkty', $produkty);
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
    public function addProducts(Request $request)
    {
        return redirect('admin/orders/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $order = Order::find($id);

      if($order == null)
        return false;

        $order-> delete();
        return redirect('/admin/orders/index');;
    }
}
