<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.html">Panel Administracyjny PLASTICO</a>
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
                      <a href="/admin/calendar"><i class="fa fa-fw fa-dashboard"></i>Terminarz</a>
                  </li>
                  <li>
                      <a href="/admin/customers/index"><i class="fa fa-user"></i> Klienci</a>
                  </li>
                  <li>
                      <a href="/admin/products/index"><i class="fa fa-fw fa-table"></i>Produkty</a>
                  </li>
                  <li>
                      <a href="/admin/orders/index"><i class="fa fa-fw fa-edit"></i>Zamowienia</a>
                  </li>

                  {{-- <li>
                      <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                      <ul id="demo" class="collapse">
                          <li>
                              <a href="#">Dropdown Item</a>
                          </li>
                          <li>
                              <a href="#">Dropdown Item</a>
                          </li>
                      </ul>
                  </li> --}}

              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
