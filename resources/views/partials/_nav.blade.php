<div id="body-bg">
    <ul class="social-icons pull-right hidden-xs">
        <li class="social-rss">
            <a href="#" target="_blank" title="RSS"></a>
        </li>
        <li class="social-twitter">
            <a href="#" target="_blank" title="Twitter"></a>
        </li>
        <li class="social-facebook">
            <a href="#" target="_blank" title="Facebook"></a>
        </li>
        <li class="social-googleplus">
            <a href="#" target="_blank" title="GooglePlus"></a>
        </li>
    </ul>
    <div id="pre-header" class="container" style="height:340px">
    </div>
    <div id="header">
        <div class="container">
            <div class="row">
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

    <!-- Top Menu -->
    <div id="hornav" class="container no-padding">
        <div class="row">
            <div class="col-md-12 no-padding">
                <div class="text-center visible-lg">
                    <ul id="hornavmenu" class="nav navbar-nav">
                        <li>
                            <a href="index.html" class="fa-home">Stona Główna</a>
                        </li>
                        <li>
                            <span class="fa-gears">Okna</span>
                            <ul>
                                <li class="parent">
                                    <span>Aluplast</span>
                                    <ul>
                                        <li>
                                            <a href="#">Typ 1</a>
                                        </li>
                                        <li>
                                            <a href="#">Typ 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent">
                                    <span>Veka</span>
                                    <ul>
                                        <li>
                                            <a href="#">Typ 1</a>
                                        </li>
                                        <li>
                                            <a href="#">Typ 2</a>
                                        </li>
                                        <li>
                                            <a href="#">Typ 3</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent">
                                    <span>Inne</span>
                                    <ul>
                                        <li>
                                            <a href="#">Typ 1</a>
                                        </li>
                                        <li>
                                            <a href="#">Typ 2</a>
                                        </li>
                                        <li>
                                            <a href="#">Typ 3</a>
                                        </li>
                                        <li>
                                            <a href="#">Typ 4</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Montaż</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span class="fa-copy">Drzwi</span>
                            <ul>
                              <li class="parent">
                                  <span>Pancerne</span>
                                  <ul>
                                      <li>
                                          <a href="#">Typ 1</a>
                                      </li>
                                      <li>
                                          <a href="#">Typ 2</a>
                                      </li>
                                      <li>
                                          <a href="#">Typ 3</a>
                                      </li>
                                      <li>
                                          <a href="#">Typ 4</a>
                                      </li>
                                  </ul>
                                </li>
                                <li class="parent">
                                    <span>Wewnętrzne</span>
                                    <ul>
                                        <li>
                                            <a href="#">Typ 1</a>
                                        </li>
                                        <li>
                                            <a href="#">Typ 2</a>
                                        </li>
                                        <li>
                                            <a href="#">Typ 3</a>
                                        </li>
                                        <li>
                                            <a href="#">Typ 4</a>
                                        </li>
                                    </ul>
                                  </li>
                              <li>
                              <li class="parent">
                                  <span>Zewnętrzne</span>
                                  <ul>
                                      <li>
                                          <a href="#">Typ 1</a>
                                      </li>
                                      <li>
                                          <a href="#">Typ 2</a>
                                      </li>
                                      <li>
                                          <a href="#">Typ 3</a>
                                      </li>
                                      <li>
                                          <a href="#">Typ 4</a>
                                      </li>
                                  </ul>
                                </li>
                                <li>
                                  <a href="#">Montaż</a>
                              </li>
                            </ul>
                        </li>
                        <li>
                            <span class="fa-th">Akcesoria</span>
                            <ul>
                              <li class="parent">
                                  <span>Bramy</span>
                                  <ul>
                                      <li>
                                          <a href="#">Garazowe 1</a>
                                      </li>
                                      <li>
                                          <a href="#">Ogrodzeniowe 2</a>
                                      </li>
                                      <li>
                                          <a href="#">Montaż</a>
                                      </li>
                                  </ul>
                              </li>
                              <li class="parent">
                                  <span>Rolety</span>
                                  <ul>
                                      <li>
                                          <a href="#">Zewnętrzne</a>
                                      </li>
                                      <li>
                                          <a href="#">Wewnętrzne</a>
                                      </li>
                                      <li>
                                          <a href="#">Montaż</a>
                                      </li>
                                  </ul>
                              </li>
                              <li class="parent">
                                  <span>Moskitiery</span>
                                  <ul>
                                      <li>
                                          <a href="#">Rodzaje</a>
                                      </li>
                                      <li>
                                          <a href="#">Montaż</a>
                                      </li>

                                  </ul>
                              </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="fa-comment">Kontakt</a>
                        </li>
                        <li class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}">Zaloguj</a></li>
                                <li><a href="{{ route('register') }}">Rejestracja</a></li>
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
                                                Wyloguj
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Top Menu -->
    <div id="post_header" class="container" style="height:340px">
    </div>

    <!-- === END HEADER === -->
