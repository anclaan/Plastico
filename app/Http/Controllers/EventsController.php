<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Klient;
use Session;
use Redirect;
class EventsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // $data = Event::get(['id','title','start','end','typ']);
           $data = Event::all();

      //  $zmienna =
      //$data['klienci']=$klienci;
    //   $result = User
    // ::join('contacts', 'users.id', '=', 'contacts.user_id')
    // ->join('orders', 'users.id', '=', 'orders.user_id')
    // ->select('users.id', 'contacts.phone', 'orders.price')
    // ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
    // ->get();

    // $data = Klient
    // ::join('events', 'klients.id', '=', 'events.klient_id')
    // ->select('*')
    // ->getQuery()
    // ->get();


      return Response()->json($data);
      //return Response()->json(['data'=>$data,'klienci'=>$klienci]);

      // return Response()->json(array('data'=>$data));
      // return view('admin.calendar');
    }
    // public function klienci()
    // {
    //     $klienci = Klient::all();
    //
    //     return view ('admin.calendar')->with($klienci);
    //
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klienci = Klient::all();

        return Response()->json($klienci);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event -> title = $request -> title;
        $event -> start = $request -> date_start . ' ' . $request -> time_start;
        $event -> end = $request -> date_end;
        $event -> typ = $request -> typ;
        $event -> save();

        return redirect('/admin/calendar');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $event = Event::find($id);
      $event -> title = $request -> _title;
      $event -> start = $request -> _date_start . ' ' . $request -> _time_start;
      $event -> end = $request -> _date_end;
      $event -> typ = $request -> _typ;
        $event->save();
        Session::flash('message', 'Sprawa została zaktualizowana');
        return Redirect::to('/admin/calendar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $event = Event::find($id);

      if($event == null)
        return false;

        $event-> delete();
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
