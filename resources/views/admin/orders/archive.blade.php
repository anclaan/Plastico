@extends('admin.main')

@section('title', '| Zamówienia')

@section('content')
<div style="border-bottom-style: solid;">
	<h1>Archwium zamówień</h1>
</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered" id="tabelaZamowien" style="font-size: 15px;">
        <thead>
          <tr>
            <th>Nazwa</th>
            <th>Koszt Całkowity</th>
            <th>Termin Realizacji</th>
            <th>Klient</th>
						<th>Status zamówienia</th>
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
						<td>{{$zamowienie->status['nazwa']}}</td>
            <td style="width:90px;">
              <a href={{ action('OrdersController@detailsOfOrder', $zamowienie->id) }}>
                   <span class="btn btn-info">Szczegóły</span</a>
          </tr>
        @endforeach
        </tbody>
      </table>

      </div>
</div>




@endsection

@section('js')
  {!! Html::script('js/admin/orders.js') !!}
@endsection
