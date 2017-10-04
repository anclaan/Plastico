<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
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
      $users = User::all();
      return view('admin.tables')->with('users', $users);
  }
  public function destroy($id)
  {
    $user = User::find($id);

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
