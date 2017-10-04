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
          <div class="panel-heading">
            <div class="panel-title">CKEditor Standard</div>

            <div class="panel-options">
              <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
              <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
            </div>
          </div>
          <div class="panel-body">
            <textarea id="ckeditor_standard"></textarea>
          </div>
        </div>

        <div class="content-box-large">
          <div class="panel-heading">
          <div class="panel-title">CKEditor Full</div>

          <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
          </div>
        </div>
          <div class="panel-body">
            <textarea id="ckeditor_full"></textarea>
          </div>
        </div>

        <div class="content-box-large">
          <div class="panel-heading">
          <div class="panel-title">TinyMCE Basic</div>

          <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
          </div>
        </div>
          <div class="panel-body">
            <textarea id="tinymce_basic"></textarea>
          </div>
        </div>

        <div class="content-box-large">
          <div class="panel-heading">
          <div class="panel-title">TinyMCE Full</div>

          <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
          </div>
        </div>
          <div class="panel-body">
            <textarea id="tinymce_full"></textarea>
          </div>
        </div>

        <div class="content-box-large">
          <div class="panel-heading">
          <div class="panel-title">Bootstrap WYSIWYG</div>

          <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
          </div>
        </div>
          <div class="panel-body">
            <textarea id="bootstrap-editor" placeholder="Enter text ..." style="width:98%;height:200px;"></textarea>
          </div>
        </div>



		  </div>
		</div>
    </div>

    @include('partials._AdminFooter')

     <link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/wysihtml5-0.3.0.js') }}"></script>
    <script src="{{ asset('js/bootstrap-wysihtml5.js') }}"></script>

    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>

    <script src="{{ asset('js/tinymce.min.js') }}"></script>

    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/editors.js') }}"></script>
  </body>
</html>
