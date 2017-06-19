<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

  public function getIndex(){
      return view('pages.index');
  }

  public function getOferta(){
    return view('pages.oferta');
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
}
