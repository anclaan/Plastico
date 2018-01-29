@extends('admin.main')

@section('title', '| Zamówienia')

@section('content')

    		  				<div class="panel-heading">
    							<div class="panel-title" style="text-align: center;"><h1>Zamówienia</h1></div>

    							<div class="panel-options">
    							</div>
    						</div>
    		  				<div class="panel-body">
    		  					<table class="table table-striped" id="tabelaZamowien">
				              <thead>
				                <tr>
                          <th>Id</th>
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
                          <td>{{$zamowienie->id}}</td>
				                  <td>{{$zamowienie->nazwa}}</td>
				                  <td>{{$zamowienie->kosztCalkowity}}</td>
				                  <td>{{$zamowienie->terminRealizacji}}</td>
                          <td>{{$zamowienie->customer_id}}</td>
                          <td>
                            <a href={{ action('OrdersController@detailsOfOrder', $zamowienie->id) }}>
                                 <span class="btn btn-danger">Szczegóły</span</a>
                            <a href={{ action('OrdersController@destroy', $zamowienie->id) }}>
                                 <span class="btn btn-danger">Usuń</span</a>
                          </td>
				                </tr>
                      @endforeach
				              </tbody>
				            </table>
                      <a href={{ action('OrdersController@showCreateForm')}} role="button" type="button" class="btn btn-success"style="float: right;">Stwórz nowe zamówienie</a>
		  				</div>
		  			</div>




@endsection

@section('js')
  {!! Html::script('js/admin/orders.js') !!}
@endsection
