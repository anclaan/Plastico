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
        <div class="content-box-large">
		  	<div class="row">
          {{Form::open(['route'=>'products.create', 'method'=>'GET', 'role'=>'form']) }}
          <div id = "content" class="col-md-5"onloadedmetadata="">
                <div class="modal-header">
                    <h4>Dodaj nowy produkt</h4>
                </div>
                <div id="form-body" style="background color: white;">
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
          {{ Form::close() }}









		  </div>
    </div>
    </div>





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    {!! Html::script('https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js') !!}
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>


  </body>
</html>
