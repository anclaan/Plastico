
<nav class="navbar navbar-default navbar-fixed-top" id="navbarContainer" >
  <div id="header">
      <div class="container">
          <div class="row" id="headerRow">
              <!-- Logo -->
              <div class="logo">
                  <a href="index.html" title="">
                      <img src="{{ asset('img/logo2.png') }}" alt="Logo">
                  </a>
              </div>
              <!-- End Logo -->
          </div>
      </div>
  </div>
      <div class="container" id="navbarC">

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/admin/calendar">Terminarz</a></li>
            <li><a href="/admin/stats">Statystyki</a></li>
            <li><a href="/admin/users/index">Uzytkownicy</a></li>
            <li><a href="/admin/customers/index">Klienci</a></li>
            <li><a href="/admin/products/index">Produkty</a></li>
            <li><a href="/admin/orders/index">Zamowienia</a></li>
            <li class="dropdown">
              <a href="/admin/orders/index" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Zamówienia <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
              </ul>
            </li>
            <li><a href="/admin/dictionaries/index">Słowniki</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <!-- Authentication Links -->
              @if (Auth::guest())
                  <li><a href="{{ route('login') }}">Login</a></li>
                  <li><a href="{{ route('register') }}">Register</a></li>
              @else
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <ul class="dropdown-menu" role="menu">
                          <li>
                              <a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  Logout
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                      </ul>
                  </li>
              @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
