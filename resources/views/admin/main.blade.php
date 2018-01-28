<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials._adminHeader')
  </head>

  <body>
    @include('partials._adminNav')

      <div class="page-content">
        <div class="row">
          <div class="col-md-10">
            <div class="row">
              <div class="content-box-large">
                @include('partials._adminMessage')
                @yield('content')
              </div>
            </div>
          </div>
        </div>
      </div>
    @include('partials._AdminFooter')
    @include('partials._adminJS')
    @yield('js')
  </body>
</html>
