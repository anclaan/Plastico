<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use Session;
use Redirect;

class ProductsController extends Controller
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
      $produkty = Product::where('czyAktywny','=',1)->get();
      $typy = ProductType::pluck('nazwa','id');

      return view('admin.products.index')->with(array('produkty'=>$produkty,'typy'=>$typy));
    }

    public function archive()
    {

      $produkty = Product::where('czyAktywny','=',0)->get();
      $typy = ProductType::pluck('nazwa','id');

      return view('admin.products.archive')->with(array('produkty'=>$produkty,'typy'=>$typy));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $product = new Product();
      $product -> nazwa = $request -> nazwa;
      $product -> opis = $request -> opis;
      $product -> productType_id = $request -> typy;
      $product -> czyAktywny = 1;


      $product -> save();
      //pernamentnie
      // Session::put('success', 'Produkt został dodany');
      Session::flash('success', 'Produkt został dodany');
      return redirect('admin/products/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $product = Product::find($id);
          $typy = ProductType::all();
          return Response()->json(array('produkt'=>$product,'typy'=>$typy));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $product = Product::find($id);

      $product -> nazwa = $request -> _nazwa;
      $product -> productType_id = $request -> _typy;
      $product -> opis = $request -> _opis;



      $product -> save();
      Session::flash('message', 'Sprawa została zaktualizowana');
      return Redirect::to('/admin/products/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function archiveProduct($id)
    {
      $product = Product::find($id);

      if($product == null)
        return false;

        $product -> czyAktywny = 0;
        $product -> save();

        return redirect('/admin/products/index');
    }

}
