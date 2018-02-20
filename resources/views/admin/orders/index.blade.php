@extends('admin.main')

@section('title', '| Zamówienia')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<a href={{ action('OrdersController@showCreateForm')}} role="button" type="button" class="btn btn-success" style="float: right; margin-top: 20px; margin-right: 15px;">Stwórz nowe zamówienie</a>
<div style="border-bottom-style: solid;">
	<h1>Zamówienia</h1>
</div>
		<div class="panel-body">
			<h3>Wyświetl zamówienia o statusie:</h3>
			{{ Form::select('status', ['Wszystkie','Przyjęte do realizacji', 'Wysłane do producenta', 'Gotowe do montażu', 'Oczekujące na zapłatę', 'Zakończone', 'Anulowane']) }}

		</br>
		</br>

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

						@if($zamowienie->status_id == 4)
							<td style="color:red;">
								{{$zamowienie->status['nazwa']}}
							</td>
						@else
							<td>
								{{$zamowienie->status['nazwa']}}
							</td>
						@endif

            <td style="width:185px;">
              <a href={{ action('OrdersController@detailsOfOrder', $zamowienie->id) }}>
                   <span class="btn btn-info">Zarządzaj</span</a>
              <a href={{ action('OrdersController@archiveOrder', $zamowienie->id) }}>
                   <span class="btn btn-warning">Archiwizuj</span</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      </div>




@endsection

@section('js')
  {!! Html::script('js/admin/orders.js') !!}

	<script>
		$(document).ready(function()
		{
			currentStatus = localStorage.getItem('status');
			$('select[name="status"]').val(currentStatus);
				$.ajaxSetup({
					 headers:
					 { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
			 });

				$('select[name="status"]').on('change', function(){
				var status = $(this).val();
				localStorage.setItem('status',status);
				if(status) {
					console.log(status);
						$.ajax({
								success:function() {

									window.location.href = "/admin/orders/showOrdersWithSpecificStatus/"+ status;

								},


						});
				}


			});


		})
	</script>
@endsection
