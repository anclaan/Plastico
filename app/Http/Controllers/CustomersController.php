<?php

namespace App\Http\Controllers;


use App\Customer;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;
class CustomersController extends Controller
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
        $klienci = Customer::where('czyAktywny','=',1)->get();

        return view('admin.customers.index')->with('klienci',$klienci);
    }

    public function archive()
    {

      $klienci = Customer::where('czyAktywny','=',0)->get();

      return view('admin.customers.archive')->with('klienci',$klienci);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create(Request $request)
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
       $customer -> czyAktywny = 1;


       $customer -> save();
       return redirect('/admin/customers/index');

     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $customer = Customer::find($id);

        return Response()->json($customer);
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
    public function archiveClient($id)
    {
      $customer = Customer::find($id);
      // dd($customer);

      $order = DB::table('orders')->where('customer_id',$id)->get();

      $customer -> czyAktywny = 0;
      $customer -> save();

      return redirect('/admin/customers/index');
      // if($order == null){
      //
      //
      // }else{
      //
      //   $error = 'Nie można usunąć klienta, ponieważ przypisane jest do niego zamówienie';
      //   return redirect('admin/calendar')->with(array('error'=>$error,'order'=>$order));
        //   $event-> delete();
          // return view('admin.customers.index')->with(
          //   'message' => 'Nie można usunąć'
          // ]);


    }
}
