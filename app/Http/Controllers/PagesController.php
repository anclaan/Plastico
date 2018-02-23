<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;
use App\Mail\sendMail;


class PagesController extends Controller {

  public function getIndex(){
      return view('pages.index');
  }

  public function getOferta(){
    return view('pages.oferta');
  }
  public function oknaVeka(){
    return view('pages.okna.veka');
  }
  public function oknaSalamander(){
    return view('pages.okna.salamander');
  }
  public function oknaAluplast(){
    return view('pages.okna.aluplast');
  }
  public function drzwiZewnetrzne(){
    return view('pages.drzwi.zewnetrzne');
  }
  public function drzwiWewnetrzne(){
    return view('pages.drzwi.wewnetrzne');
  }
  public function bramy(){
    return view('pages.bramy');
  }
  public function paraperty(){
    return view('pages.parapety');
  }
  public function rolety(){
    return view('pages.rolety');
  }
  public function moskitiery(){
    return view('pages.moskitiery');
  }

  public function getGaleria(){
    return view('pages.galeria');
  }

  public function getONas(){
      $first = 'Bartek';
      $last = 'Luczak';

      $fullname= $first . " " . $last;
      $email = 'anclaan@gmial.com';
      $data=[];
      $data['email'] = $email;
      $data['fullname'] = $fullname;
      return view('pages.oNas')->withData($data);
  }

  public function getKontakt(){
    return view('pages.kontakt');
  }

  public function sendMail(Request $request)
  {

    Mail::send(new sendMail());
    // $nada
    // $temat = $request->temat;
    // $wiadomosc = $request->wiadomosc;

    $this -> validate ($request, [
      'email' => 'required|email',
      'temat' => 'min:3',
      'wiadomosc' => 'min:10'
    ]);
    //
    // $data = array(
    //   'email' => $nadawca,
    //   'temat' => $temat,
    //   'wiadomosc' => $wiadomosc
    // );
    //
    // Mail::send(['text'=>'email'], $data, function($message) use ($data){
    //   $message -> from($data['email']);
    //   $message -> to('plastico.blaszki@gmail.com');
    //   $message -> subject($data['temat']);
    //
    // });
  }
}
