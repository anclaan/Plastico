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
				                  <th>Login</th>
				                  <th>Hasło</th>
				                  <th>Email</th>
                          <th>Zarządzaj</th>
				                </tr>
				              </thead>

				              <tbody>
                      @foreach ($users as $user)
				                <tr>
                          <td>{{$user->id}}</td>
				                  <td>{{$user->name}}</td>
				                  <td>{{$user->email}}</td>
				                  <td>{{$user->password}}</td>
                          <td><a href={{ action('UsersController@destroy', $user->id) }}>
                                 <span class="glyphicon glyphicon-edit"></span</a>
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
      {{-- <div class="col-md-10">

        <div class="row">
          <div class="col-md-6">
            <div class="content-box-large">
              <div class="panel-heading">
              <div class="panel-title">Pracownicy</div>

              <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
              </div>
            </div>
              <div class="panel-body">
                <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Imie</th>
                          <th>Nazwisko</th>
                          <th>Nr Telefonu</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Andrzej</td>
                          <td>Nowak</td>
                          <td>609940823</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Janusz</td>
                          <td>Tracz</td>
                          <td>798503955</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Anna</td>
                          <td>Wiśniewska</td>
                          <td>504493033</td>
                        </tr>
                      </tbody>
                    </table>
              </div>
            </div>
          </div>
        </div>








      </div> --}}
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
