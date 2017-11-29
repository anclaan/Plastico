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
  				<div class="col-md-10">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title" style="text-align: center;"><h1>Produkty</h1></div>

							<div class="panel-options">
							</div>
						</div>
		  				<div class="panel-body">
		  					<table class="table table-striped">
				              <thead class="thead-dark">
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
				                  <td>
                              <a href={{ action('ProductsController@update', $produkt->id)}}>
                                <span class="label label-success">Edytuj</span</a>
                              <a href={{ action('ProductsController@destroy', $produkt->id)}}>
                                 <span class="label label-danger">Usuń</span</a>
                          </td>
				                </tr>
                      @endforeach
				              </tbody>
				            </table>
                    <a href={{ action('ProductsController@showCreateForm')}} role="button" type="button" class="btn btn-success"style="float: right;">Dodaj nowy produkt</a>

		  				</div>
		  			</div>
  				</div>
  			</div>








		  </div>
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

    <script src="{{ asset('js/dataTables.bootstrap.js') }}"></script>

    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/tables.js') }}"></script>
  </body>
</html>
