@extends('admin.main')

@section('title', '| Zamówienia')

@section('content')

	<h2>Zamówienia</h2>
		<div class="panel-body">
			<table class="table table-striped table-bordered" id="tabelaZamowien" style="font-size: 15px;">
        <thead>
          <tr>
            <th>Nazwa</th>
            <th>Koszt Całkowity</th>
            <th>Termin Realizacji</th>
            <th>Klient</th>
            <th>Zarządzaj</th>
          </tr>
        </thead>

        <tbody>

        @foreach ($zamowienia as $zamowienie)
          <tr>
            <td>{{$zamowienie->nazwa}}</td>
            <td>{{$zamowienie->kosztCalkowity}}</td>
            <td>{{$zamowienie->terminRealizacji}}</td>
            <td>{{$zamowienie->klient['imie']}} {{$zamowienie->klient['nazwisko']}}</td>
            <td style="width:185px;">
              <a href={{ action('OrdersController@detailsOfOrder', $zamowienie->id) }}>
                   <span class="btn btn-info">Szczegóły</span</a>
              <a href={{ action('OrdersController@destroy', $zamowienie->id) }}>
                   <span class="btn btn-warning">Archiwizuj</span</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
        <a href={{ action('OrdersController@showCreateForm')}} role="button" type="button" class="btn btn-success"style="float: left;">Stwórz nowe zamówienie</a>
      </div>
</div>




@endsection

@section('js')
  {!! Html::script('js/admin/orders.js') !!}
@endsection
