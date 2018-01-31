<?php

namespace App\Http\Controllers;

use Session;
use App\Order;
use App\Customer;
use App\Product;
use App\ProductType;
use App\OrderProducts;
use App\ParamValues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //    $this->middleware('auth:admin');
    // }

    public function index()
    {
      $zamowienia = Order::all();

      $klienci = Customer::all();


      return view('admin.orders.index')->with(array('klienci' => $klienci,'zamowienia' => $zamowienia));
    }
    public function showCreateForm()
    {

        $klienci = Customer::all();
        $typy = ProductType::pluck('nazwa','id');

        // $collection->toArray();
        // dd($collection);
        $produkty=Session::get('cart');
        $collection=collect($produkty);
        return view('admin/orders/create')->with(array('klienci' => $klienci,'typy' => $typy,'collection'=> $collection));
    }


    public function getProducts($id)
    {

      // $products = Products::table("products")->where("productType_id",$id)->pluck("name","id");
        $products = Product::where("productType_id",$id)->pluck("nazwa","id");

        return json_encode($products);
    }

    public function detailsOfOrder($id)
    {
        $order = Order::find($id);
        // $orderProducts = DB::table('orderproducts')->where('order_id', $id)->get();
        $orderProducts = OrderProducts::where('order_id','=',$id)->get();
        // $ops = DB::table('orderproducts')->where('order_id', $id)->get();



        $klienci = Customer::all();
        $typy = ProductType::pluck('nazwa','id');


        return view('admin.orders.details')->with(array('klienci' => $klienci,'typy' => $typy,'order' => $order, 'orderProducts' => $orderProducts));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $klienci = Customer::all();
      $typy = ProductType::pluck('nazwa','id');

      if($request->typy == 1){

        $typ = ProductType::where("id", $request->typy)->select("nazwa")->get();
        $produkt = Product::where("id", $request->produkty)->select("nazwa")->get();
          $item = [
              'typ' => $typ,
              'produkt' =>$produkt,
              'typy' => $request->typy,
              'produkty' => $request->produkty,
              'wysokoscOkna' => $request->wysokoscOkna,
              'szerokoscOkna' => $request->szerokoscOkna,
              'szerokoscProfilu' => $request->szerokoscProfilu,
              'kolorOkna' => $request->kolorOkna,
              'kolorCieplejRamki' => $request->kolorCieplejRamki,
              'klamki' => $request->klamki,
              'cena' => $request->cena,
              'opis' => $request->opis

              ];

              Session::push('cart', $item);
      }
      if($request->typy == 2){

        $typ = ProductType::where("id", $request->typy)->select("nazwa")->get();
        $produkt = Product::where("id", $request->produkty)->select("nazwa")->get();
          $item = [
              'typ' => $typ,
              'produkt' =>$produkt,
              'typy' => $request->typy,
              'produkty' => $request->produkty,
              'wysokoscDrzwi' => $request->wysokoscDrzwi,
              'szerokoscDrzwi' => $request->szerokoscDrzwi,
              'oscieznica' => $request->oscieznica,
              'wizjer' => $request->wizjer,
              'klamki' => $request->klamki,
              'cena' => $request->cena,
              'opis' => $request->opis
            ];
            Session::push('cart', $item);
      }
      if($request->typy == 3){

        $typ = ProductType::where("id", $request->typy)->select("nazwa")->get();
        $produkt = Product::where("id", $request->produkty)->select("nazwa")->get();
          $item = [
              'typ' => $typ,
              'produkt' =>$produkt,
              'typy' => $request->typy,
              'produkty' => $request->produkty,
              'wysokoscDrzwi' => $request->wysokoscDrzwi,
              'szerokoscDrzwi' => $request->szerokoscDrzwi,
              'oscieznica' => $request->oscieznica,
              'klamki' => $request->klamki,
              'cena' => $request->cena,
              'opis' => $request->opis
            ];
        Session::push('cart', $item);
      }
      if($request->typy == 4){

        $typ = ProductType::where("id", $request->typy)->select("nazwa")->get();
        $produkt = Product::where("id", $request->produkty)->select("nazwa")->get();

          $item = [
              'typ' => $typ,
              'produkt' =>$produkt,
              'typy' => $request->typy,
              'produkty' => $request->produkty,
              'wysokoscBramy' => $request->wysokoscBramy,
              'szerokoscBramy' => $request->szerokoscBramy,
              'kolor' => $request->kolor,
              'typBramy' => $request->typBramy,
              'cena' => $request->cena,
              'opis' => $request->opis
            ];
        Session::push('cart', $item);

      }
      if($request->typy == 5){

        $typ = ProductType::where("id", $request->typy)->select("nazwa")->get();
        $produkt = Product::where("id", $request->produkty)->select("nazwa")->get();
          $item = [
              'typ' => $typ,
              'produkt' =>$produkt,
              'typy' => $request->typy,
              'produkty' => $request->produkty,
              'dlugoscParapetu' => $request->dlugoscParapetu,
              'szerokoscParapetu' => $request->szerokoscParapetu,
              'tworzywo' => $request->tworzywo,
              'zakonczenie' => $request->zakonczenie,
              'cena' => $request->cena,
              'opis' => $request->opis
            ];
        Session::push('cart', $item);
      }
      if($request->typy == 6){

        $typ = ProductType::where("id", $request->typy)->select("nazwa")->get();
        $produkt = Product::where("id", $request->produkty)->select("nazwa")->get();
          $item = [
              'typ' => $typ,
              'produkt' =>$produkt,
              'typy' => $request->typy,
              'produkty' => $request->produkty,
              'dlugoscParapetu' => $request->dlugoscParapetu,
              'szerokoscParapetu' => $request->szerokoscParapetu,
              'tworzywo' => $request->tworzywo,
              'zakonczenie' => $request->zakonczenie,
              'cena' => $request->cena,
              'opis' => $request->opis
            ];
        Session::push('cart', $item);
      }
      if($request->typy == 7){

        $typ = ProductType::where("id", $request->typy)->select("nazwa")->get();
        $produkt = Product::where("id", $request->produkty)->select("nazwa")->get();
          $item = [
              'typ' => $typ,
              'produkt' =>$produkt,
              'typy' => $request->typy,
              'produkty' => $request->produkty,
              'dlugoscRolety' => $request->dlugoscRolety,
              'szerokoscRolety' => $request->szerokoscRolety,
              'typRolety' => $request->typRolety,
              'tworzywo' => $request->tworzywo,
              'kolorRolety' => $request->kolorRolety,
              'cena' => $request->cena,
              'opis' => $request->opis
            ];
        Session::push('cart', $item);
      }
      if($request->typy == 8){

        $typ = ProductType::where("id", $request->typy)->select("nazwa")->get();
        $produkt = Product::where("id", $request->produkty)->select("nazwa")->get();
          $item = [
              'typ' => $typ,
              'produkt' =>$produkt,
              'typy' => $request->typy,
              'produkty' => $request->produkty,
              'dlugoscRolety' => $request->dlugoscRolety,
              'szerokoscRolety' => $request->szerokoscRolety,
              'typRolety' => $request->typRolety,
              'kolorMaterialu' => $request->kolorMaterialu,
              'cena' => $request->cena,
              'opis' => $request->opis
            ];
        Session::push('cart', $item);
      }
      if($request->typy == 9){

        $typ = ProductType::where("id", $request->typy)->select("nazwa")->get();
        $produkt = Product::where("id", $request->produkty)->select("nazwa")->get();
          $item = [
              'typ' => $typ,
              'produkt' =>$produkt,
              'typy' => $request->typy,
              'produkty' => $request->produkty,
              'wysokoscMoskitiery' => $request->wysokoscMoskitiery,
              'szerokoscMoskitiery' => $request->szerokoscMoskitiery,
              'kolor' => $request->kolor,
              'klipsy' => $request->klipsy,
              'cena' => $request->cena,
              'opis' => $request->opis
            ];
        Session::push('cart', $item);
      }

      $staraCena = Session::get('cena');
      $cenaProduktu = $request->cena;
      $nowaCena = $staraCena + $cenaProduktu;
      Session::put('cena', $nowaCena);
      $cena = Session::get('cena');




      Session::flash('message', 'Produkt został dodany do zamówienia!');

      $klienci = Customer::all();
      $typy = ProductType::pluck('nazwa','id');

      $produkty=Session::get('cart');
      $collection=collect($produkty);
      $koszt=0;
      foreach ($collection as $key => $value){
        $cena = floatval($value['cena']);
        $koszt = $koszt+$cena;
      }
      // return redirect()->action('OrdersController@showCreateForm');
      return view('admin/orders/create')->with(array('koszt' => $koszt, 'klienci' => $klienci, 'typy' => $typy, 'collection' => $collection));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $produkty=Session::get('cart');
      $collection=collect($produkty);
      $koszt=0;
      foreach ($collection as $key => $value){
        $cena = floatval($value['cena']);
        $koszt = $koszt+$cena;
      }
      //dodawanie nowego zamowienia
      $order = new Order();
      $order -> nazwa = $request -> nazwa;
      $order -> terminRealizacji = $request -> terminRealizacji;
      $order -> customer_id = $request -> klient;
      $order -> kosztCalkowity = $koszt;

      $session = Session::all();
      $order -> save();
      $produkty = Product::all();

      //fetchowanie kolekcji produktow
      $produkty=Session::get('cart');
      $collection=collect($produkty);

      //petla przechodząca po kolekcji (po produktach zamówienia)
      foreach ($collection as $key => $value) {
        $cena = floatval($value['cena']);
        $idOrder = $order->id;
        $idProdukt = intval($value['produkty']);
        $opis = $value['opis'];

        //dodawanie nowej pozycji w orderProducts
        $orderProduct = new OrderProducts();
        $orderProduct -> cenaProduktu = $cena;
        $orderProduct -> order_id = $idOrder;
        $orderProduct -> product_id = $idProdukt;
        $orderProduct -> opis = $opis;
        $orderProduct -> save();


        //dodawanie wartosci do paramValues w zalezności od wybranego typu produktu
        if($value['typy'] == 1){

          $wysokoscOkna = $value['wysokoscOkna'];
          $szerokoscOkna = $value['szerokoscOkna'];
          $szerokoscProfilu = $value['szerokoscProfilu'];
          $kolorOkna = $value['kolorOkna'];
          $kolorCieplejRamki = $value['kolorCieplejRamki'];
          $klamki = $value['klamki'];
          $idOrderProduct = $orderProduct->id;
          $idParameter = intval($value['produkty']);


          $paramValue1 = new ParamValues();
          $paramValue1 -> value = $wysokoscOkna;
          $paramValue1 -> orderProduct_id = $idOrderProduct;
          $paramValue1 -> producttypeparam_id = 1;

          $paramValue2 = new ParamValues();
          $paramValue2 -> value = $szerokoscOkna;
          $paramValue2 -> orderProduct_id = $idOrderProduct;
          $paramValue2 -> producttypeparam_id = 2;

          $paramValue3 = new ParamValues();
          $paramValue3 -> value = $szerokoscProfilu;
          $paramValue3 -> orderProduct_id = $idOrderProduct;
          $paramValue3 -> producttypeparam_id = 3;

          $paramValue4 = new ParamValues();
          $paramValue4 -> value = $kolorOkna;
          $paramValue4 -> orderProduct_id = $idOrderProduct;
          $paramValue4 -> producttypeparam_id = 4;

          $paramValue5 = new ParamValues();
          $paramValue5 -> value = $kolorCieplejRamki;
          $paramValue5 -> orderProduct_id = $idOrderProduct;
          $paramValue5 -> producttypeparam_id = 5;

          $paramValue6 = new ParamValues();
          $paramValue6 -> value = $klamki;
          $paramValue6 -> orderProduct_id = $idOrderProduct;
          $paramValue6 -> producttypeparam_id = 6;


          $paramValue1->save();
          $paramValue2->save();
          $paramValue3->save();
          $paramValue4->save();
          $paramValue5->save();
          $paramValue6->save();


          }
        if($value['typy'] == 2){

          $wysokoscDrzwi = $value['wysokoscDrzwi'];
          $szerokoscDrzwi = $value['szerokoscDrzwi'];
          $oscieznica = $value['oscieznica'];
          $wizjer = $value['wizjer'];
          $klamki = $value['klamki'];
          $idOrderProduct = $orderProduct->id;
          $idParameter = intval($value['produkty']);


          $paramValue1 = new ParamValues();
          $paramValue1 -> value = $wysokoscDrzwi;
          $paramValue1 -> orderProduct_id = $idOrderProduct;
          $paramValue1 -> producttypeparam_id = 7;

          $paramValue2 = new ParamValues();
          $paramValue2 -> value = $szerokoscDrzwi;
          $paramValue2 -> orderProduct_id = $idOrderProduct;
          $paramValue2 -> producttypeparam_id = 8;

          $paramValue3 = new ParamValues();
          $paramValue3 -> value = $oscieznica;
          $paramValue3 -> orderProduct_id = $idOrderProduct;
          $paramValue3 -> producttypeparam_id = 9;

          $paramValue4 = new ParamValues();
          $paramValue4 -> value = $wizjer;
          $paramValue4 -> orderProduct_id = $idOrderProduct;
          $paramValue4 -> producttypeparam_id = 10;

          $paramValue5 = new ParamValues();
          $paramValue5 -> value = $klamki;
          $paramValue5 -> orderProduct_id = $idOrderProduct;
          $paramValue5 -> producttypeparam_id = 11;





          $paramValue1->save();
          $paramValue2->save();
          $paramValue3->save();
          $paramValue4->save();
          $paramValue5->save();

        }
        if($value['typy'] == 3){

          $wysokoscDrzwi = $value['wysokoscDrzwi'];
          $szerokoscDrzwi = $value['szerokoscDrzwi'];
          $oscieznica = $value['oscieznica'];
          $klamki = $value['klamki'];
          $idOrderProduct = $orderProduct->id;
          $idParameter = intval($value['produkty']);


          $paramValue1 = new ParamValues();
          $paramValue1 -> value = $wysokoscDrzwi;
          $paramValue1 -> orderProduct_id = $idOrderProduct;
          $paramValue1 -> producttypeparam_id = 12;

          $paramValue2 = new ParamValues();
          $paramValue2 -> value = $szerokoscDrzwi;
          $paramValue2 -> orderProduct_id = $idOrderProduct;
          $paramValue2 -> producttypeparam_id = 13;

          $paramValue3 = new ParamValues();
          $paramValue3 -> value = $oscieznica;
          $paramValue3 -> orderProduct_id = $idOrderProduct;
          $paramValue3 -> producttypeparam_id = 14;

          $paramValue4 = new ParamValues();
          $paramValue4 -> value = $klamki;
          $paramValue4 -> orderProduct_id = $idOrderProduct;
          $paramValue4 -> producttypeparam_id = 15;



          $paramValue1->save();
          $paramValue2->save();
          $paramValue3->save();
          $paramValue4->save();

        }
        if($value['typy'] == 4){

          $wysokoscBramy = $value['wysokoscBramy'];
          $szerokoscBramy = $value['szerokoscBramy'];
          $kolor = $value['kolor'];
          $typBramy = $value['typBramy'];
          $idOrderProduct = $orderProduct->id;
          $idParameter = intval($value['produkty']);


          $paramValue1 = new ParamValues();
          $paramValue1 -> value = $wysokoscBramy;
          $paramValue1 -> orderProduct_id = $idOrderProduct;
          $paramValue1 -> producttypeparam_id = 16;

          $paramValue2 = new ParamValues();
          $paramValue2 -> value = $szerokoscBramy;
          $paramValue2 -> orderProduct_id = $idOrderProduct;
          $paramValue2 -> producttypeparam_id = 17;

          $paramValue3 = new ParamValues();
          $paramValue3 -> value = $kolor;
          $paramValue3 -> orderProduct_id = $idOrderProduct;
          $paramValue3 -> producttypeparam_id = 18;

          $paramValue4 = new ParamValues();
          $paramValue4 -> value = $typBramy;
          $paramValue4 -> orderProduct_id = $idOrderProduct;
          $paramValue4 -> producttypeparam_id = 19;


          $paramValue1->save();
          $paramValue2->save();
          $paramValue3->save();
          $paramValue4->save();

        }
        if($value['typy'] == 5){

          $dlugoscParapetu = $value['dlugoscParapetu'];
          $szerokoscParapetu = $value['szerokoscParapetu'];
          $tworzywo = $value['tworzywo'];
          $zakonczenie = $value['zakonczenie'];
          $idOrderProduct = $orderProduct->id;
          $idParameter = intval($value['produkty']);


          $paramValue1 = new ParamValues();
          $paramValue1 -> value = $dlugoscParapetu;
          $paramValue1 -> orderProduct_id = $idOrderProduct;
          $paramValue1 -> producttypeparam_id = 20;

          $paramValue2 = new ParamValues();
          $paramValue2 -> value = $szerokoscParapetu;
          $paramValue2 -> orderProduct_id = $idOrderProduct;
          $paramValue2 -> producttypeparam_id = 21;

          $paramValue3 = new ParamValues();
          $paramValue3 -> value = $tworzywo;
          $paramValue3 -> orderProduct_id = $idOrderProduct;
          $paramValue3 -> producttypeparam_id = 22;

          $paramValue4 = new ParamValues();
          $paramValue4 -> value = $zakonczenie;
          $paramValue4 -> orderProduct_id = $idOrderProduct;
          $paramValue4 -> producttypeparam_id = 23;


          $paramValue1->save();
          $paramValue2->save();
          $paramValue3->save();
          $paramValue4->save();

        }
        if($value['typy'] == 6){


          $dlugoscParapetu = $value['dlugoscParapetu'];
          $szerokoscParapetu = $value['szerokoscParapetu'];
          $tworzywo = $value['tworzywo'];
          $zakonczenie = $value['zakonczenie'];
          $idOrderProduct = $orderProduct->id;
          $idParameter = intval($value['produkty']);


          $paramValue1 = new ParamValues();
          $paramValue1 -> value = $dlugoscParapetu;
          $paramValue1 -> orderProduct_id = $idOrderProduct;
          $paramValue1 -> producttypeparam_id = 24;

          $paramValue2 = new ParamValues();
          $paramValue2 -> value = $szerokoscParapetu;
          $paramValue2 -> orderProduct_id = $idOrderProduct;
          $paramValue2 -> producttypeparam_id = 25;

          $paramValue3 = new ParamValues();
          $paramValue3 -> value = $tworzywo;
          $paramValue3 -> orderProduct_id = $idOrderProduct;
          $paramValue3 -> producttypeparam_id = 26;

          $paramValue4 = new ParamValues();
          $paramValue4 -> value = $zakonczenie;
          $paramValue4 -> orderProduct_id = $idOrderProduct;
          $paramValue4 -> producttypeparam_id = 27;

          $paramValue1->save();
          $paramValue2->save();
          $paramValue3->save();
          $paramValue4->save();

        }
        if($value['typy'] == 7){

          $dlugoscRolety = $value['dlugoscRolety'];
          $szerokoscRolety = $value['szerokoscRolety'];
          $typRolety = $value['typRolety'];
          $tworzywo = $value['tworzywo'];
          $kolorRolety = $value['kolorRolety'];
          $idOrderProduct = $orderProduct->id;
          $idParameter = intval($value['produkty']);


          $paramValue1 = new ParamValues();
          $paramValue1 -> value = $dlugoscRolety;
          $paramValue1 -> orderProduct_id = $idOrderProduct;
          $paramValue1 -> producttypeparam_id = 28;

          $paramValue2 = new ParamValues();
          $paramValue2 -> value = $szerokoscRolety;
          $paramValue2 -> orderProduct_id = $idOrderProduct;
          $paramValue2 -> producttypeparam_id = 29;

          $paramValue3 = new ParamValues();
          $paramValue3 -> value = $typRolety;
          $paramValue3 -> orderProduct_id = $idOrderProduct;
          $paramValue3 -> producttypeparam_id = 30;

          $paramValue4 = new ParamValues();
          $paramValue4 -> value = $tworzywo;
          $paramValue4 -> orderProduct_id = $idOrderProduct;
          $paramValue4 -> producttypeparam_id = 31;

          $paramValue5 = new ParamValues();
          $paramValue5 -> value = $kolorRolety;
          $paramValue5 -> orderProduct_id = $idOrderProduct;
          $paramValue5 -> producttypeparam_id = 32;

          $paramValue1->save();
          $paramValue2->save();
          $paramValue3->save();
          $paramValue4->save();
          $paramValue5->save();

        }
        if($value['typy'] == 8){


          $dlugoscRolety = $value['dlugoscRolety'];
          $szerokoscRolety = $value['szerokoscRolety'];
          $typRolety = $value['typRolety'];
          $kolorMaterialu = $value['kolorMaterialu'];
          $idOrderProduct = $orderProduct->id;
          $idParameter = intval($value['produkty']);


          $paramValue1 = new ParamValues();
          $paramValue1 -> value = $dlugoscRolety;
          $paramValue1 -> orderProduct_id = $idOrderProduct;
          $paramValue1 -> producttypeparam_id = 33;

          $paramValue2 = new ParamValues();
          $paramValue2 -> value = $szerokoscRolety;
          $paramValue2 -> orderProduct_id = $idOrderProduct;
          $paramValue2 -> producttypeparam_id = 34;

          $paramValue3 = new ParamValues();
          $paramValue3 -> value = $typRolety;
          $paramValue3 -> orderProduct_id = $idOrderProduct;
          $paramValue3 -> producttypeparam_id = 35;

          $paramValue4 = new ParamValues();
          $paramValue4 -> value = $kolorMaterialu;
          $paramValue4 -> orderProduct_id = $idOrderProduct;
          $paramValue4 -> producttypeparam_id = 36;


          $paramValue1->save();
          $paramValue2->save();
          $paramValue3->save();
          $paramValue4->save();

        }
        if($value['typy'] == 9){

          $wysokoscMoskitiery = $value['wysokoscMoskitiery'];
          $szerokoscMoskitiery = $value['szerokoscMoskitiery'];
          $kolor = $value['kolor'];
          $klipsy = $value['klipsy'];
          $idOrderProduct = $orderProduct->id;
          $idParameter = intval($value['produkty']);


          $paramValue1 = new ParamValues();
          $paramValue1 -> value = $wysokoscMoskitiery;
          $paramValue1 -> orderProduct_id = $idOrderProduct;
          $paramValue1 -> producttypeparam_id = 37;

          $paramValue2 = new ParamValues();
          $paramValue2 -> value = $szerokoscMoskitiery;
          $paramValue2 -> orderProduct_id = $idOrderProduct;
          $paramValue2 -> producttypeparam_id = 38;

          $paramValue3 = new ParamValues();
          $paramValue3 -> value = $kolor;
          $paramValue3 -> orderProduct_id = $idOrderProduct;
          $paramValue3 -> producttypeparam_id = 39;

          $paramValue4 = new ParamValues();
          $paramValue4 -> value = $klipsy;
          $paramValue4 -> orderProduct_id = $idOrderProduct;
          $paramValue4 -> producttypeparam_id = 40;

          $paramValue1->save();
          $paramValue2->save();
          $paramValue3->save();
          $paramValue4->save();

        }
      }



      $this->clearListOfOrderProducts();

      return redirect()->action('OrdersController@index');
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

    public  function deleteProductFromListOfOrderProducts($index)
    {

      $cart = Session::get('cart');
      unset($cart[$index]);
      Session::put('cart', $cart);

      $produkty=Session::get('cart');
      $collection=collect($produkty);

      $klienci = Customer::all();
      $typy = ProductType::pluck('nazwa','id');
      $produkty=Session::get('cart');
      $collection=collect($produkty);

      return view('admin/orders/create')->with(array('klienci' => $klienci,'typy' => $typy,'collection'=> $collection));

    }
    public  function clearListOfOrderProducts()
    {
        Session::forget('cart');
        $zamowienia = Order::all();

        //dodac Lp. jako index usuwanego produktu
        return view('admin.orders.index')->with('zamowienia', $zamowienia);
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

        $order -> delete();
        return redirect('/admin/orders/index');;
    }
}
