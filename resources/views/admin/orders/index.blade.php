<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
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
    		  				<div class="panel-heading">
    							<div class="panel-title" style="text-align: center;"><h1>Zamówienia</h1></div>

    							<div class="panel-options">
    							</div>
    						</div>
    		  				<div class="panel-body">
    		  					<table class="table table-striped">
				              <thead>
				                <tr>
                          <th>Id</th>
				                  <th>Nazwa</th>
				                  <th>Koszt Całkowity</th>
				                  <th>Termin Realizacji</th>
                          <th>Data Realizacji</th>
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
                          <td>{{$zamowienie->dataRealizacji}}</td>
                          <td>{{$zamowienie->customer_id}}</td>
                          <td>
                            <a href={{ action('OrdersController@update', $zamowienie->id) }}>
                                  <span class="btn btn-info">Edytuj</span</a>
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

    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/tables.js') }}"></script>
  </body>
</html>
@include('partials._AdminFooter')
