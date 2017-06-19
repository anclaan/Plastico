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
        return view('admin.admin');
    }
  
    public function calendar()
    {
        return view('admin.calendar');
    }
    public function editors()
    {
        return view('admin.editors');
    }
    public function forms()
    {
        return view('admin.forms');
    }
    public function stats()
    {
        return view('admin.stats');
    }
    public function tables()
    {
        return view('admin.tables');
    }
}
