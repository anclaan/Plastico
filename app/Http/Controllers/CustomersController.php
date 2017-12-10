<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Customer;
use App\Order;
use Illuminate\Http\Request;
use Session;
use Redirect;
class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klienci = Customer::all();

        return view('admin.customers.index')->with('klienci',$klienci);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create(Request $request)
     {

     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $customer = new Customer();
      $customer -> imie = $request -> imie;
      $customer -> nazwisko = $request -> nazwisko;
      $customer -> telefon = $request -> telefon;
      $customer -> email = $request -> email;
      $customer -> nip = $request -> nip;
      $customer -> adres = $request -> adres;
      $customer -> kod = $request -> kod;
      $customer -> poczta = $request -> poczta;


      $customer -> save();
      return redirect('/admin/customers/index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }


      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $customer = Customer::find($id);

      $customer -> imie = $request -> _imie;
      $customer -> nazwisko = $request -> _nazwisko;
      $customer -> telefon = $request -> _telefon;
      $customer -> email = $request -> _email;
      $customer -> nip = $request -> _nip;
      $customer -> adres = $request -> _adres;
      $customer -> kod = $request -> _kod;
      $customer -> poczta = $request -> _poczta;


      $customer -> save();
      Session::flash('message', 'Sprawa została zaktualizowana');
      return Redirect::to('/admin/customers/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $customer = Customer::find($id);


      $order = DB::table('customers')->get();
      if($order = null){
        $customer-> delete();
        return redirect('/admin/customers/index');
      }else{
        $error = 'Nie można usunąć klienta, ponieważ przypisane jest do niego zamówienie';
        return redirect('admin/customers/index')->with('error',$error);
        //   $event-> delete();
          // return view('admin.customers.index')->with(
          //   'message' => 'Nie można usunąć'
          // ]);
      }

    }
}
