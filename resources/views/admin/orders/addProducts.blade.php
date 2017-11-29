<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    {!! Html::style('vendor/bootstrap/dist/css/bootstrap.css') !!}
     {!! Html::style('vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') !!}
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
                        {{Form::open(['route'=>'orders.create', 'method'=>'post', 'role'=>'form']) }}
                        <div id = "responsive-modal" class = "modal" tabindex="-1" data-backdrop="static">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                  <h4>Dodawanie produktu do zamówienia</h4>
                              </div>
                              <div class="modal-body">
                                <div class="form-group">
                                  {{ Form::label('produkt', 'Wybierz produkt') }}
                                  <select class="form-control" name="produkt">
                                    @foreach($produkty as $produkt)
                                      <option value="{{$produkt->id}}">{{$produkt->nazwa}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                  <div class="form-group">
                                      {{ Form::label('cena', 'Cena produktu') }}
                                      {{ Form::text('cena', old('cena'), ['class'=>'form-control'])}}
                                  </div>
                                  <div class="form-group">
                                      {{ Form::label('opis', 'Opis') }}
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
                				<div class="col-md-10">
                					<div class="content-box-large">
              		  				<div class="panel-heading">
              							<div class="panel-title" style="text-align: center;"><h1>Zamówienia</h1></div>

              							<div class="panel-options">
              							</div>
              						</div>
              		  				<div class="panel-body">
              		  					<table class="table table-striped">
          				              <thead>
          				                <tr>
                                    <th>Lp</th>
          				                  <th>Nazwa produktu</th>
          				                  <th>Cena produku</th>
          				                  <th>Opis</th>
                                    <th>Zarządzaj</th>
          				                </tr>
          				              </thead>

          				              <tbody>
                                {{-- @foreach ($zamowienia as $zamowienie)
          				                <tr>
                                    <td></td>
          				                  <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                      <a href={{ action('OrdersController@destroy', $zamowienie->id) }}>
                                           <span class="label label-danger">Usuń</span</a>
                                       <a href={{ action('OrdersController@update', $zamowienie->id) }}>
                                            <span class="label label-success">Edytuj</span</a>
                                    </td>
          				                </tr>
                                @endforeach --}}
          				              </tbody>
          				            </table>
                                <a role="button" id="dodajProdukt" type="button" class="btn btn-success"style="float: right;">Dodaj nowy produkt</a>
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
        $('#terminRealizacji').datetimepicker({
            format: 'YYYY-MM-DD',

                });
        $('#dataRealizacji').datetimepicker({
            format: 'YYYY-MM-DD',

                });
        $('#dodajProdukt').on('click',function(){
          $('#responsive-modal').modal('show')
        });
      })
    </script>

  </body>
</html>
