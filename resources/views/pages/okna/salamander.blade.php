@extends('main')

@section('title', ' Okna - Salamander')

@section('content')

            <!-- === BEGIN CONTENT === -->
            <div id="content">
                <div class="container no-padding">
                    <div class="row">
                        <!-- Carousel Slideshow -->
                        <div id="carousel-example" class="carousel slide" style="border-bottom-style: solid; "data-ride="carousel">

                            <div class="clearfix"></div>

                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{{ asset('img/slideshow/salamander-baner.jpg') }}">
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="container background-gray-lighter">

                </div>
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <!-- Main Text -->
                        <div class="col-md-12">
                          <div style="border-bottom-style: solid; font-size:25px;">
                            <h1>Okna Salamander</h1>
                          </div>
                          </br>
                          </br>
                            <p>Salamander jest koncernem działa na polskim rynku od prawie
                              dwóch dekad. Firma dysponuje dwoma rodajami systemów okiennych: Brügmann bluEvolution i Salamander.
                              Produkty dostępne są w wielu technicznych kombinacjach i wzorach.
                            </br>
                              </br>

                            System Brügmann bluEvolution:
                              <ul>
                                <li>Brügmann bluEvolution: 82 AD</li>
                                <li>Brügmann bluEvolution: 82 MD</li>
                                <li>Brügmann bluEvolutionL 82 Alu</li>
                              </ul>
                            </br>
                            System Salamander:
                              <ul>
                                <li>Streamline AD</li>
                                <li>Streamline MD</li>
                                <li>Streamline Alu</li>
                                <li>Streamline Skrzydło klejone</li>
                              </ul>
                              Dokładne informacje na temat poszczególnych systemów okiennych można uzyskać poprzez kliknięcie na wybraną pozycje, co spowoduje to przekierowanie na stronę producenta.
                            </br>
                            </br>
                            </br>
                              Aby uzyskać więcej informacji, zapraszamy na konsultacje do naszego sklepu znajdującego się W Błaszkach, na ulicy Sulwińskiego 29!

                            </p>
                            <p class="text-center">https://www.veka.pl/index.php?id=4</p>
                        </div>
                        <!-- End Main Text -->
                    </div>
                </div>
                <div class="container background-gray-lighter">
                    <div class="row padding-vert-20">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">

                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>
                </div>

            </div>
            <!-- === END CONTENT === -->
@endsection
