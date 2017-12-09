<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    {!! Html::style('vendor/bootstrap/dist/css/bootstrap.css') !!}
    <!-- styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    @include('partials._adminNav')

        <div class="page-content">
        	<div class="row">
    		  @include('partials._adminSidebar')

		  <div class="col-md-10">

		  	<div class="row">

          {{Form::open(['route'=>'customers.store', 'method'=>'post', 'role'=>'form']) }}
                  <div id = "responsive-modal" class = "modal" tabindex="-1" data-backdrop="static">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h4>Dodaj nową sprawę</h4>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                {{ Form::label('imie', 'Imię') }}
                                {{ Form::text('imie', old('imie'), ['class'=>'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('nazwisko', 'Nazwisko') }}
                                {{ Form::text('nazwisko', old('nazwisko'), ['class'=>'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('telefon', 'Nr Telefonu') }}
                                {{ Form::text('telefon', old('telefon'), ['class'=>'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('email', 'E-mail') }}
                                {{ Form::text('email', old('email'), ['class'=>'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('nip', 'NIP') }}
                                {{ Form::text('nip', old('nip'), ['class'=>'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('adres', 'Adres') }}
                                {{ Form::text('adres', old('adres'), ['class'=>'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('kod', 'Kod Pocztowy') }}
                                {{ Form::text('kod', old('kod'), ['class'=>'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('poczta', 'Poczta') }}
                                {{ Form::text('poczta', old('poczta'), ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn default" data-dismiss="modal">Anuluj</button>
                            {!! Form::submit('Dodaj',['class' => 'btn btn-success']) !!}
                        </div>
                      </div>
                    </div>
                  </div>
                  {{ Form::close() }}

                  {!!Form::open(['route'=>['customers.update',1], 'method'=>'PUT', 'id'=>'updatemodal'])!!}
                  <div id = "modal-event" class = "modal" tabindex="-1" data-backdrop="static">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h4>Edytuj sprawę</h4>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                {{ Form::label('_imie', 'Imię') }}
                                {{ Form::text('_imie', old('_imie'), ['class'=>'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('_nazwisko', 'Nazwisko') }}
                                {{ Form::text('_nazwisko', old('_nazwisko'), ['class'=>'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('_telefon', 'Nr Telefonu') }}
                                {{ Form::text('_telefon', old('_telefon'), ['class'=>'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('_email', 'E-mail') }}
                                {{ Form::text('_email', old('_email'), ['class'=>'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('_nip', 'NIP') }}
                                {{ Form::text('_nip', old('_nip'), ['class'=>'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('_adres', 'Adres') }}
                                {{ Form::text('_adres', old('_adres'), ['class'=>'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('_kod', 'Kod Pocztowy') }}
                                {{ Form::text('_kod', old('_kod'), ['class'=>'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('_poczta', 'Poczta') }}
                                {{ Form::text('_poczta', old('_poczta'), ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <a id="delete" data-href="{{ url('events') }}" data-id="" class="btn btn-danger">Usuń</a>
                            <button type="button" class="btn btn default" data-dismiss="modal">Anuluj</button>
                            {!! Form::submit('Aktualizuj',['class' => 'btn btn-success']) !!}
                        </div>
                      </div>
                    </div>
                  </div>
                  {{ Form::close() }}

  				<div class="col-md-6">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Klienci</div>

							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<table class="table">
				              <thead>
				                <tr>
                          <th>Id</th>
				                  <th>Imie</th>
				                  <th>Naziwsko</th>
				                  <th>Telefon</th>
                          <th>Email</th>
                          <th>Adres</th>
                          <th>Kod Pocztowy</th>
                          <th>Poczta</th>
                          <th>Zarządzaj</th>
				                </tr>
				              </thead>

				              <tbody>
                      @foreach ($klienci as $klient)
				                <tr>
                          <td>{{$klient->id}}</td>
				                  <td>{{$klient->imie}}</td>
				                  <td>{{$klient->nazwisko}}</td>
                          <td>{{$klient->telefon}}</td>
                          <td>{{$klient->email}}</td>
                          <td>{{$klient->adres}}</td>
                          <td>{{$klient->kod}}</td>
                          <td>{{$klient->poczta}}</td>
                          <td>
                            <a href={{ action('CustomersController@update', $klient->id) }}>
                                  <span class="label label-success">Edytuj</span</a>
                            <a href={{ action('CustomersController@destroy', $klient->id) }}>
                                 <span class="label label-danger">Usuń</span</a>
                          </td>
				                </tr>
                      @endforeach
				              </tbody>
				            </table>
                      <a role="button" id="dodajKlienta" type="button" class="btn btn-success"style="float: right;">Dodaj nowego klienta</a>
		  				</div>
		  			</div>
  				</div>
  			</div>








		  </div>
    </div>
		</div>
    </div>




    {!! Html::script('https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js') !!}
    {!! Html::script('vendor/jquery/dist/jquery.min.js') !!}
    {!! Html::script('vendor/bootstrap/dist/js/bootstrap.js') !!}
    {{-- {!! Html::script('js/bootstrap.min.js') !!} --}}
    {!! Html::script('vendor/moment/min/moment.min.js') !!}
    {!! Html::script('vendor/bootstrap/js/collapse.js') !!}
    {!! Html::script('vendor/bootstrap/js/transition.js') !!}
    {!! Html::script('vendor/fullcalendar/fullcalendar.min.js') !!}
    {!! Html::script('vendor/fullcalendar/locale/pl.js') !!}
    {!! Html::script('vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') !!}
    {!! Html::script('vendor/bootstrap-timepicker/js/bootstrap-timepicker.js') !!}

    <script>
      $(document).ready(function()
      {

        $('#dodajKlienta').on('click',function(){
          $('#responsive-modal').modal('show')
        });

        eventClick: function (customer, jsEvent, view)
        {
          var date_start = $.fullCalendar.moment(event.start).format('YYYY-MM-DD');
          var time_start = $.fullCalendar.moment(event.start).format('HH:mm:ss');
          var date_end = $.fullCalendar.moment(event.end).format('YYYY-MM-DD HH:mm:ss');
          $('#modal-event #delete').attr('data-id', event.id);
          $('#updatemodal').attr("action", '/events/'+event.id);
          $('#modal-event #_title').val(event.title);
          $('#modal-event #_date_start').val(date_start);
          $('#modal-event #_time_start').val(time_start);
          $('#modal-event #_date_end').val(date_end);
          $('#modal-event #_typ').val(event.typ);
          $('#modal-event #_opis').val(event.opis);
          $('#modal-event').modal('show');


        }
      })
    </script>
  </body>
</html>
