
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
            <li><a href="/admin/calendar">Strona Główna</a></li>
            <li class="dropdown">
              <a href="/admin/orders/index" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Okna <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Aluplast</a></li>
                <li><a href="#">Veka</a></li>
                <li><a href="#">Salamander</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Montaż</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="/admin/orders/index" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Drzwi <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Aluplast</a></li>
                <li><a href="#">Veka</a></li>
                <li><a href="#">Salamander</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Montaż</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="/admin/orders/index" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rolety <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Zewnętrzne</a></li>
                <li><a href="#">Wewnętrzne</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Montaż</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="/admin/orders/index" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Parapety<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Zewnętrzne</a></li>
                <li><a href="#">Wewnętrzne</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Montaż</a></li>
              </ul>
            </li>
            <li><a href="/admin/orders/index">Bramy garażowe</a></li>
            <li><a href="/admin/dictionaries/index">Moskitiery</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/admin/orders/index">Kontakt</a></li>
            <li><a href="/admin/dictionaries/index">O Nas</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
