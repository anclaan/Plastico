<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <link href="{{ asset('css/stats.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.html">Panel Administratora Plastico</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                  <div class="input-group form">
	                       <input type="text" class="form-control" placeholder="Search...">
	                       <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Search</button>
	                       </span>
	                  </div>
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="profile.html">Profile</a></li>
	                          <li><a href="login.html">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="/admin"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href="/admin/calendar"><i class="glyphicon glyphicon-calendar"></i> Terminarz</a></li>
                    <li class="current"><a href="/admin/stats"><i class="glyphicon glyphicon-stats"></i> Statystyki</a></li>
                    <li><a href="/admin/tables"><i class="glyphicon glyphicon-list"></i> Tabele</a></li>
                    <li><a href="/admin/editors"><i class="glyphicon glyphicon-pencil"></i> Edycja</a></li>
                </ul>
             </div>
		  </div>
		  <div class="col-md-10">

  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Sprzedaż</div>

					<div class="panel-options">
						<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
						<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					</div>
				</div>
  				<div class="panel-body">
  					<div id="hero-area" style="height: 230px;"></div>
  				</div>
  			</div>

  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Sprzedaż 2</div>

					<div class="panel-options">
						<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
						<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					</div>
				</div>
  				<div class="panel-body">
  					<div id="hero-graph" style="height: 230px;"></div>
  				</div>
  			</div>

  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Wykresy</div>

					<div class="panel-options">
						<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
						<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					</div>
				</div>
  				<div class="panel-body">
  					<div class="row">
  						<div class="col-md-6">
  							<div id="hero-bar" style="height: 230px;"></div>
  						</div>
  						<div class="col-md-3">
  							<div id="hero-donut" style="height: 230px;"></div>
  						</div>
  						<div class="col-md-3">
  							<div id="hero-donut2" style="height: 230px;"></div>
  						</div>
  					</div>
  				</div>
  			</div>

  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">jQuery Knob</div>

					<div class="panel-options">
						<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
						<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					</div>
				</div>
  				<div class="panel-body">
  					<div class="row">
  						<div class="col-md-3">
  							<input type="text" value="50" class="knob second" data-thickness=".3" data-inputColor="#333" data-fgColor="#30a1ec" data-bgColor="#d4ecfd" data-width="150">
  						</div>
  						<div class="col-md-3">
  							<input type="text" value="75" class="knob second" data-thickness=".3" data-inputColor="#333" data-fgColor="#8ac368" data-bgColor="#c4e9aa" data-width="150">
  						</div>
  						<div class="col-md-3">
  							<input type="text" value="35" class="knob second" data-thickness=".3" data-inputColor="#333" data-fgColor="#5ba0a3" data-bgColor="#cef3f5" data-width="150">
  						</div>
  						<div class="col-md-3">
  							<input type="text" value="85" class="knob second" data-thickness=".3" data-inputColor="#333" data-fgColor="#b85e80" data-bgColor="#f8d2e0" data-width="150">
  						</div>
  					</div>
  				</div>
  			</div>

  			<div class="row">
  				<div class="col-md-6">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Pie Chart</div>

							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<div id="piechart1" style="width:100%;height:200px"></div>
		  				</div>
		  			</div>
  				</div>
  				<div class="col-md-6">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Pie Chart</div>

							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<div id="piechart2" style="width:100%;height:200px"></div>
		  				</div>
		  			</div>
  				</div>
  			</div>

  			<div class="row">
  				<div class="col-md-6">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Bar Chart</div>

							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<div id="catchart" style="width:100%;height:300px"></div>
		  				</div>
		  			</div>
  				</div>
  				<div class="col-md-6">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Multiple axes</div>

							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<div id="timechart" style="width:100%;height:300px"></div>
		  				</div>
		  			</div>
  				</div>
  			</div>


		  </div>
		</div>
    </div>

    <footer>
         <div class="container">

            <div class="copy text-center">
               Copyright 2014 <a href='#'>Website</a>
            </div>

         </div>
      </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/morris.css') }}">




    <script src="{{ asset('js/jquery.knob.js') }}"></script>
    <script src="{{ asset('js/raphael-min.js') }}"></script>
    <script src="{{ asset('js/morris.min.js') }}"></script>

    <script src="{{ asset('js/jquery.flot.js') }}"></script>
    <script src="{{ asset('js/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('js/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('js/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('js/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('js/jquery.flot.resize.js') }}"></script>


    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/stats.js') }}"></script>

  </body>
</html>
