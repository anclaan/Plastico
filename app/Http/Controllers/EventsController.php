<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
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
        $data = Event::get(['id','title','start','end','typ']);

        return Response()->json($data);
      //  return view('admin.calendar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $event->fill($request->all());
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
        return Response()->json([
          'message' => 'Błąd'
        ]);
        $event-> delete();
        return Response()->json([
          'message' => 'Sprawa została usunięta'
        ]);

    }
}
