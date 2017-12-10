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
        <div class="content-box-large">
		  	<div class="row">

          {{Form::open(['route'=>'orders.create', 'method'=>'GET', 'role'=>'form']) }}
          <div id = "content" class="col-md-5" onloadedmetadata="">
                <div class="modal-header">
                    <h4>Tworzenie nowego zamówienia</h4>
                </div>
                <div id="form-body" style="background color: white;">
                <div class="form-group">
                        {{ Form::label('nazwa', 'Nazwa zamówienia') }}
                        {{ Form::text('nazwa', old('nazwa'), ['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                      {{-- {{ Form::label('klient', 'Klient') }}
                      {!! Form::select('klient', $klienci, null,['class' => 'form-control'] ) !!} --}}
                      {{ Form::label('klient', 'Klient') }}
                      <select class="form-control" name="klient">
                        @foreach($klienci as $klient)
                          <option value="{{$klient->id}}">{{$klient->imie}} {{$klient->nazwisko}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        {{ Form::label('terminRealizacji', 'Termin realizacji') }}
                        {{ Form::text('terminRealizacji', old('terminRealizacji'), ['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('dataRealizacji', 'Data realizacji') }}
                        {{ Form::text('dataRealizacji', old('dataRealizacji'), ['class'=>'form-control']) }}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn default" data-dismiss="modal">Anuluj</button>
                    {!! Form::submit('Dalej',['class' => 'btn btn-success']) !!}
                </div>
              </div>
          </div>
          {{ Form::close() }}
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
      
      })
    </script>

  </body>
</html>
