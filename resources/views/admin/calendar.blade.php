<!DOCTYPE html>
<html>
  <head>
    <title>Terminarz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    {{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('css/fullcalendar.css') }}" rel="stylesheet" media="screen"> --}}
    {{-- <link  href=“https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css” rel=“stylesheet” > --}}

    <!-- styles -->
    {{-- <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('css/calendar.css') }}" rel="stylesheet"> --}}
    {!! Html::style('vendor/fullcalendar/fullcalendar.min.css') !!}
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') !!}
    {!! Html::style('css/styles.css') !!}
    {!! Html::style('vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css') !!}

     {{-- fullcalendar  --}}

  {{-- <link href=“css/fullcalendar.css” rel=“stylesheet” />
  <link href=“css/fullcalendar.print.css” rel=“stylesheet” media=“print” /> --}}

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
                    <li class="current"><a href="/admin/calendar"><i class="glyphicon glyphicon-calendar"></i> Terminarz</a></li>
                    <li><a href="/admin/stats"><i class="glyphicon glyphicon-stats"></i> Statystyki</a></li>
                    <li><a href="/admin/tables"><i class="glyphicon glyphicon-list"></i> Tabele</a></li>
                    <li><a href="/admin/editors"><i class="glyphicon glyphicon-pencil"></i> Edycja</a></li>
                </ul>
             </div>
		  </div>
		  <div class="col-md-10">

		  			<div class="content-box-large">
		  				<div class="panel-body">
		  					<div class="row">


                    {{Form::open(['route'=>'events.store', 'method'=>'post', 'role'=>'form']) }}
                    <div id = "responsive-modal" class = "modal fade" tabindex="-1" data-backdrop="static">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                              <h4>Dodaj nową sprawę</h4>
                          </div>
                          <div class="modal-body">
                              <div class="form-group">
                                  {{ Form::label('title', 'Nazwa sprawy') }}
                                  {{ Form::text('title', old('title'), ['class'=>'form-control']) }}
                              </div>
                              <div class="form-group">
                                  {{ Form::label('date_start', 'Data rozpoczęcia') }}
                                  {{ Form::text('date_start', old('date_start'), ['class'=>'form-control', 'readonly'=>'true']) }}
                              </div>
                              <div class="form-group">
                                  {{ Form::label('time_start', 'Data rozpoczęcia') }}
                                  {{ Form::text('time_start', old('time_start'), ['class'=>'form-control']) }}
                              </div>
                              <div class="form-group">
                                  {{ Form::label('date_end', 'Data zakończenia') }}
                                  {{ Form::text('date_end', old('date_end'), ['class'=>'form-control']) }}
                              </div>

                              <div class="form-group">
                                  {{ Form::label('typ', 'Typ sprawy') }}
                                  {{ Form::text('typ', old('typ'), ['class'=>'form-control']) }}
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


                    <div id='calendar'></div>


                    {{ Form::open(['route'=>['events.update',1], 'method'=>'PUT', 'id'=>'updatemodal']) }}
                    <div id = "modal-event" class = "modal fade" tabindex="-1" data-backdrop="static">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                              <h4>Edytuj sprawę</h4>
                          </div>
                          <div class="modal-body">
                              <div class="form-group">
                                  {{ Form::label('_title', 'Nazwa sprawy') }}
                                  {{ Form::text('_title', old('_title'), ['class'=>'form-control']) }}
                              </div>
                              <div class="form-group">
                                  {{ Form::label('_date_start', 'Data rozpoczęcia') }}
                                  {{ Form::text('_date_start', old('_date_start'), ['class'=>'form-control']) }}
                              </div>
                              <div class="form-group">
                                  {{ Form::label('_time_start', 'Data rozpoczęcia') }}
                                  {{ Form::text('_time_start', old('_time_start'), ['class'=>'form-control']) }}
                              </div>
                              <div class="form-group">
                                  {{ Form::label('_date_end', 'Data zakończenia') }}
                                  {{ Form::text('_date_end', old('_date_end'), ['class'=>'form-control']) }}
                              </div>

                              <div class="form-group">
                                  {{ Form::label('_typ', 'Typ sprawy') }}
                                  {{ Form::text('_typ', old('_typ'), ['class'=>'form-control']) }}
                              </div>
                          </div>
                          <div class="modal-footer">
                              <meta name="csrf-token" content="{{ csrf_token() }}">
                              <a id="delete" data-href="{{ url('events') }}" data-id="" class="btn btn-danger">Usuń</a>
                              <button type="button" class="btn btn default" data-dismiss="modal">Anuluj</button>
                              {!! Form::submit('Aktualizuj',['class' => 'btn btn-success']) !!}
                          </div>
                        </div>
                      </div>
                    </div>
                    {{ Form::close() }}


		  				</div>
		  			</div>
          </div>
        </div>
		  </div>
		</div>
    </div>
</body>
    <footer>
         <div class="container">

            <div class="copy text-center">
               Copyright 2014 <a href='#'>Website</a>
            </div>

         </div>
      </footer>

    {{-- {!! Html::script('https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js') !!} --}}
    {!! Html::script('vendor/jquery/dist/jquery.min.js') !!}
    {{-- {!! Html::script('js/bootstrap.js') !!} --}}
    {!! Html::script('js/bootstrap.min.js') !!}
    {!! Html::script('vendor/moment/min/moment.min.js') !!}
    {!! Html::script('vendor/fullcalendar/lib/moment.min.js') !!}
    {!! Html::script('vendor/fullcalendar/fullcalendar.min.js') !!}
    {!! Html::script('vendor/fullcalendar/locale/pl.js') !!}
    {!! Html::script('vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') !!}
    {!! Html::script('vendor/bootstrap-timepicker/js/bootstrap-timepicker.js') !!}



  <script>
  var BASEURL = "{{ url('/') }}";
  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      selectable: true,
      selectHelper: true,

      select: function(start)
      {
        start = moment(start.format());
        $('#date_start').val(start.format('YYYY-MM-DD'));
        $('#responsive-modal').modal('show');

      },
      events: BASEURL + '/events',

      eventClick: function (event, jsEvent, view)
      {
        var date_start = $.fullCalendar.moment(event.start).format('YYYY-MM-DD');
        var time_start = $.fullCalendar.moment(event.start).format('HH:mm:ss');
        var date_end = $.fullCalendar.moment(event.end).format('YYYY-MM-DD hh:mm:ss');
        $('#modal-event #delete').attr('data-id', event.id);
        $('#updatemodal').attr("action", '/events/'+event.id);
        $('#modal-event #_title').val(event.title);
        $('#modal-event #_date_start').val(date_start);
        $('#modal-event #_time_start').val(time_start);
        $('#modal-event #_date_end').val(date_end);
        $('#modal-event #_typ').val(event.typ);
        $('#modal-event').modal('show');
      }

    });

  });

  $('#time_start').timepicker({
      showMeridian: false,
      showSeconds: true,


          });
  $('#date_end').datetimepicker({
      format: 'YYYY-MM-DD HH:mm:ss',

          });
  $('#delete').on('click', function(){
      var x = $(this);
      var delete_url = x.attr('data-href')+'/'+x.attr('data-id');

      $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

      $.ajax({
        url: delete_url,
        type: 'DELETE',
        success: function()
        {
          $('#modal-event').modal('hide');
          alert(result.message);
        },
        error: function(result)
        {
          $('#modal-event').modal('hide');
          alert(result.message);
        }
      })

          });
    // $('#update').on('click', function(){
    //     var x = $(this);
    //     var update_url = x.attr('data-href')+'/'+x.attr('data-id');
    //
    //     $.ajax({
    //       url: update_url,
    //       type: 'UPDATE',
    //       success: function()
    //       {
    //         $('#modal-event').modal('hide');
    //         alert(result.message);
    //       },
    //       error: function(result)
    //       {
    //         $('#modal-event').modal('hide');
    //         alert(result.message);
    //       }
    //     })
    //
    //         });
</script>
</html>
