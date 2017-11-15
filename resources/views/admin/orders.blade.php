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
				                  <th>Adres</th>
                          <th>Telefon</th>
                          <th>Email</th>
                          <th>Zarządzaj</th>
				                </tr>
				              </thead>

				              <tbody>
                      @foreach ($klienci as $klient)
				                <tr>
                          <td>{{$klient->id}}</td>
				                  <td>{{$klient->imie}}</td>
				                  <td>{{$klient->nazwisko}}</td>
				                  <td>{{$klient->adres}}</td>
                          <td>{{$klient->telefon}}</td>
                          <td>{{$klient->email}}</td>
                          <td>
                            <a href={{ action('UsersController@destroy', $klient->id) }}>
                                 <span class="label label-danger">Usuń</span</a>
                             <a href={{ action('UsersController@update', $klient->id) }}>
                                  <span class="label label-success">Edytuj</span</a>
                          </td>
				                </tr>
                      @endforeach
				              </tbody>
				            </table>
		  				</div>
		  			</div>
  				</div>
  			</div>








		  </div>
    </div>
		</div>
    </div>



      <link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('js/dataTables.bootstrap.js') }}"></script>

    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/tables.js') }}"></script>
  </body>
</html>