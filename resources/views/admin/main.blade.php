<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials.admin._adminHeader')
  </head>

  <body>
    @include('partials.admin._adminNav')

      <div class="page-content">
        <div class="row">
          <div class="col-md-10 col-md-offset-1" id="contentBox">
            <div class="row">
              <div class="content-box-large" id="boxLarge" style="min-height: 1080px;">
                @include('partials.admin._adminMessage')
                @yield('content')
              </div>
            </div>
          </div>
        </div>
      </div>
    @include('partials.admin._AdminFooter')
    @include('partials.admin._adminJS')
    @yield('js')
  </body>
</html>
