<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" style="font-size:25px; color:white;" href="/admin/calendar">  PLASTICO - Panel Administracyjny</a>
          </div>
          <!-- Top Menu Items -->
          <ul class="nav navbar-right top-nav">


              <li class="dropdown">
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-power-off"></i>Wyloguj</a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       {{ csrf_field() }}
                   </form>
              </li>
          </ul>
          <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav side-nav">
                  <li>
                      <a href="/admin/calendar"><i class="fa fa-calendar"></i>  Terminarz</a>
                  </li>
                  <li>
                      <a href="javascript:;" data-toggle="collapse" data-target="#klienci"><i class="fa fa-group"></i> Klienci <i class="fa fa-fw fa-caret-down"></i></a>
                      <ul id="klienci" class="collapse">
                          <li>
                              <a href="/admin/customers/index">Aktualni klienci</a>
                          </li>
                          <li>
                              <a href="/admin/customers/archive">Archwium</a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="javascript:;" data-toggle="collapse" data-target="#produkty"><i class="fa fa-cube"></i> Produkty <i class="fa fa-fw fa-caret-down"></i></a>
                      <ul id="produkty" class="collapse">
                          <li>
                              <a href="/admin/products/index">Aktualne produkty</a>
                          </li>
                          <li>
                              <a href="/admin/products/archive">Archwium</a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="javascript:;" data-toggle="collapse" data-target="#zamowienia"><i class="fa fa-cart-arrow-down"></i> Zamowienia <i class="fa fa-fw fa-caret-down"></i></a>
                      <ul id="zamowienia" class="collapse">
                          <li>
                              <a href="/admin/orders/index">Aktualne zamówienia</a>
                          </li>
                          <li>
                              <a href="/admin/orders/archive">Archwium</a>
                          </li>
                      </ul>
                  </li>

              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
