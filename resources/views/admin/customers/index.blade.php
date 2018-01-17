<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">
     {!! Html::style('vendor/bootstrap/dist/css/bootstrap.css') !!}
     {!! Html::style('css/myStyles.css') !!}
     {!! Html::style('css/styles.css') !!}


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


		  <div class="col-md-10">

		  	<div class="row">
          <div class="content-box-large">
          {{Form::open(['route'=>'customers.create', 'method'=>'GET', 'role'=>'form']) }}
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
                  <div id = "myModal" class = "modal fade" tabindex="-1" data-backdrop="static">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h4>Edytuj sprawę</h4>
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
                            <button type="button" class="btn btn default" data-dismiss="modal">Anuluj</button>
                            {!! Form::submit('Aktualizuj',['class' => 'btn btn-info']) !!}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                  {{ Form::close() }}



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
				                  <th>Nazwisko</th>
				                  <th>Telefon</th>
                          <th>Email</th>
                          <th>NIP</th>
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
                          <td>{{$klient->nip}}</td>
                          <td>{{$klient->adres}}</td>
                          <td>{{$klient->kod}}</td>
                          <td>{{$klient->poczta}}</td>

                            {{-- <a class="edycja" role="button" type="button" id={{$klient->id}}>
                                  <span class="label label-success">Edytuj</span></a> --}}
                            {{-- <a role="button" type="button" id={{$klient->id}} class="btn btn-success"></a> --}}
                            {{-- <input id={{$klient->id}} type="button" value="edytuj" class="edycja"/> --}}
                            {{-- <button class="btn btn-success btn-edit" data-id="{{$klient->id}}">Edytuj</button> --}}
                            <td><a id ="edit-modal" class="button"
                                  data-id="{{$klient->id}}"
                                  data-imie="{{$klient->imie}}"
                                  data-nazwisko="{{$klient->nazwisko}}"
                                  data-telefon="{{$klient->telefon}}"
                                  data-email="{{$klient->email}}"
                                  data-nip="{{$klient->nip}}"
                                  data-adres="{{$klient->adres}}"
                                  data-kod="{{$klient->kod}}"
                                  data-poczta="{{$klient->poczta}}">
                    							<span class="btn btn-info"> Edytuj</span>
                    						</a>
                            <a id="usun" href={{ action('CustomersController@destroy', $klient->id) }}>
                                 <span class="btn btn-danger">Usuń</span></a>
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
</body>
</html>
@include('partials._AdminFooter')

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

      // $(document).on('click', '#edit-modal', function(){
      //
      //   $('#myModal').modal('show');
      //
      //   $('#myModal #_imie').val($(this).data('imie'));
      //   $('#updatemodal').attr("action", '/customers/'+$(this).data('id'));
      //   $('#_nazwisko').val($(this).data('nazwisko'));
      //   $('#_telefon').val($(this).data('telefon'));
      //   $('#_email').val($(this).data('email'));
      //   $('#_nip').val($(this).data('nip'));
      //   $('#_adres').val($(this).data('adres'));
      //   $('#_kod').val($(this).data('kod'));
      //   $('#_poczta').val($(this).data('poczta'));
      //   $('#_id').val($(this).data('id'));
      // })


//       $('#usun').on('click', function() {
//         // if(result)
//         //   alert(result.error);
//         console.log(result.order);
//         //  });
// })



        $('#dodajKlienta').on('click',function(){
          $('#responsive-modal').modal('show')
        });
        // $('.btn-edit').on('click', function(){
        //
        // });
        // $('tbody').delegate('.btn-edit','click', function(){
        //   var value = $(this).data('id');
        //   var url = '{URL::to('getUpdate')}}';
        //   $.ajax({
        //     type : 'get',
        //     url : url,
        //     data : {'id':value},
        //     success:function(data){
        //       console.log(data);
        //     }
        //   })
        // })

        // eventClick: function (customer, jsEvent, view)
        // {
        //   var date_start = $.fullCalendar.moment(event.start).format('YYYY-MM-DD');
        //   var time_start = $.fullCalendar.moment(event.start).format('HH:mm:ss');
        //   var date_end = $.fullCalendar.moment(event.end).format('YYYY-MM-DD HH:mm:ss');
        //   $('#modal-event #delete').attr('data-id', event.id);
        //   $('#updatemodal').attr("action", '/events/'+event.id);
        //   $('#modal-event #_title').val(event.title);
        //   $('#modal-event #_date_start').val(date_start);
        //   $('#modal-event #_time_start').val(time_start);
        //   $('#modal-event #_date_end').val(date_end);
        //   $('#modal-event #_typ').val(event.typ);
        //   $('#modal-event #_opis').val(event.opis);
        //   $('#modal-event').modal('show');
        //
        //
        // }
        $('.button').on('click', function ()
      {
            var url = '/customers';
            var id =$(this).data('id');

            $('#myModal').modal('show');
            $.ajax({
            type: 'GET',
            url: '/customers/'+id+'/edit',
            success: function(result)
            {
              console.log(result.id);

              $('#myModal #_imie').val(result.imie);
              $('#updatemodal').attr("action", '/customers/'+result.id);
              $('#_nazwisko').val(result.nazwisko);
              $('#_telefon').val(result.telefon);
              $('#_email').val(result.email);
              $('#_nip').val(result.nip);
              $('#_adres').val(result.adres);
              $('#_kod').val(result.kod);
              $('#_poczta').val(result.poczta);

            },
            error: function(result)
            {
              $('#modal-event').modal('hide');
              alert(result.message);

            },
            complete: function () {
                  //  window.location.reload();
                }



          })

      })




      })
    </script>
