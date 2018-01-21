<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.calendar');
    }

    public function calendar()
    {
        return view('admin.calendar');
    }
    public function orders()
    {
        return view('admin.orders.index');
    }
    public function customers()
    {
        return view('admin.customers.index');
    }
    public function products()
    {
        return view('admin.products.index');
    }

}
