<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Customer;
use App\EventType;
use App\User;
use Session;
use Redirect;
class EventsController extends Controller
{


    public function index()
    {
      $data = Event::all();
      return Response()->json($data);
    }



    public function store(Request $request)
    {
        $event = new Event();
        $event -> title = $request -> title;
        $event -> customer_id = $request -> wybierzKlienta;
        $event -> start = $request -> date_start . ' ' . $request -> time_start;
        $event -> end = $request -> date_end;
        $event -> eventType_id = $request -> wybierzSprawe;
        $event -> opis = $request -> opis;

        $event -> save();

        return redirect('/admin/calendar');


    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event -> title = $request -> _title;
        $event -> start = $request -> _date_start . ' ' . $request -> _time_start;
        $event -> end = $request -> _date_end;
        $event -> opis = $request -> opis;

        $event->save();
        Session::flash('message', 'Sprawa została zaktualizowana');
        return Redirect::to('/admin/calendar');
    }


    public function destroy($id)
    {
        $event = Event::find($id);

        if($event == null)
          return false;

          $event-> delete();
          return true;


    }

    public function create()
    {
        $klienci = Customer::all();
        $typySpraw = EventType::all();


        return Response()->json(array('klienci'=>$klienci, 'sprawy'=>$typySpraw));



    }
}
