<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Klient;

class KlientsController extends Controller
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
  public function index()
  {
      $klienci = Klient::all();
      return view('admin.klienci')->with('klienci', $klienci);
  }
  public function destroy($id)
  {
    $user = Klient::find($id);

    if($user == null)
      return false;

      $user-> delete();
      return true;

      // if($event == null)
      //   return Response()->json([
      //     'message' => 'Błąd'
      //   ]);
      //   $event-> delete();
      //   return Response()->json([
      //     'message' => 'Sprawa została usunięta'
      //   ]);

  }

}
