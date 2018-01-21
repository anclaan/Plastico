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
    {!! Html::style('css/myStyles.css') !!}
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
        {{Form::open(['route'=>'products.create', 'method'=>'GET', 'role'=>'form']) }}
        <div id = "responsive-modal" class = "modal" tabindex="-1" data-backdrop="static">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <h4>Dodaj nowy produkt</h4>
              </div>
              <div class="modal-body">
              <div class="form-group">
                      {{ Form::label('nazwa', 'Nazwa produktu') }}
                      {{ Form::text('nazwa', old('nazwa'), ['class'=>'form-control']) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('typy', 'Typ produktu') }}
                    {!! Form::select('typy', $typy, null,['class' => 'form-control'] ) !!}
                  </div>
                  <div class="form-group">
                      {{ Form::label('opis', 'Opis produktu') }}
                      {{ Form::textarea('opis', old('opis'), ['class'=>'form-control']) }}
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

        {!!Form::open(['route'=>['products.update',1], 'method'=>'PUT', 'id'=>'updatemodal'])!!}
        <div id = "myModal" class = "modal fade" tabindex="-1" data-backdrop="static">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <h4>Edycja produktu</h4>
              </div>
              <div class="modal-body">
              <div class="form-group">
                      {{ Form::label('_nazwa', 'Nazwa produktu') }}
                      {{ Form::text('_nazwa', old('_nazwa'), ['class'=>'form-control']) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('_typy', 'Typ produktu') }}
                    {!! Form::select('_typy', $typy, null,['class' => 'form-control'] ) !!}
                  </div>
                  <div class="form-group">
                      {{ Form::label('_opis', 'Opis produktu') }}
                      {{ Form::textarea('_opis', old('_opis'), ['class'=>'form-control']) }}
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
        {{ Form::close() }}



		  				<div class="panel-heading">
							<div class="panel-title" style="text-align: center;"><h1>Produkty</h1></div>

							<div class="panel-options">
							</div>
						</div>
		  				<div class="panel-body">
		  					<table class="table" id="tabelaAdmin">
				              <thead>
				                <tr>
                          <th>Id</th>
				                  <th>Nazwa</th>
                          <th>Typ produktu</th>
				                  <th>Opis</th>
				                  <th>Zarządzaj</th>
				                </tr>
				              </thead>

				              <tbody>
                      @foreach ($produkty as $produkt)
				                <tr>
                          <td>{{$produkt->id}}</td>
				                  <td>{{$produkt->nazwa}}</td>
                          <td>{{$produkt->typ['nazwa']}}</td>
                          <td>{{$produkt->opis}}</td>
				                  <td style="width:10%;">
                            <a id ="edit-modal" class="button"
                                  data-id="{{$produkt->id}}"
                                  data-nazwa="{{$produkt->nazwa}}"
                                  data-typ="{{$produkt->typ['nazwa']}}"
                                  data-opis="{{$produkt->opis}}"
                                  d
                                  <span class="btn btn-info"> Edytuj</span>
                              </a>
                              <a href={{ action('ProductsController@destroy', $produkt->id)}}>
                                 <span class="label label-danger">Usuń</span</a>
                          </td>
				                </tr>
                      @endforeach
				              </tbody>
				            </table>
                    <a id="dodajProdukt" role="button" type="button" class="btn btn-success"style="float: right;">Dodaj nowy produkt</a>

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
        $('#dodajProdukt').on('click',function(){
          $('#responsive-modal').modal('show')
        });
        $('.button').on('click', function ()
      {
            var url = '/products';
            var id =$(this).data('id');

            $('#myModal').modal('show');
            $.ajax({
            type: 'GET',
            url: '/products/'+id+'/edit',
            success: function(result)
            {
              console.log(result.produkt.id);
              console.log(result.produkt.productType_id);
              $('#myModal #_imie').val(result.produkt.imie);
              $('#updatemodal').attr("action", '/products/'+result.id);
              $('#_nazwa').val(result.produkt.nazwa);
              $('#_typy').val(result.produkt.productType_id);

              $('#_opis').val(result.produkt.opis);

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
  </body>
</html>
