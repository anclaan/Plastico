@extends('main')

@section('title', '| Strona Główna')

@section('content')

            <!-- === BEGIN CONTENT === -->
            <div id="content">
                <div class="container no-padding">
                    <div class="row">
                        <!-- Carousel Slideshow -->
                        <div id="carousel-example" class="carousel slide" data-ride="carousel">
                            <!-- Carousel Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example" data-slide-to="1"></li>
                                <li data-target="#carousel-example" data-slide-to="2"></li>
                            </ol>
                            <div class="clearfix"></div>
                            <!-- End Carousel Indicators -->
                            <!-- Carousel Images -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{{ asset('img/slideshow/salamander-baner.jpg') }}">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('img/slideshow/aluplast-baner.jpg') }}">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('img/slideshow/veka-baner.jpg') }}">
                                </div>

                            </div>
                            <!-- End Carousel Images -->
                            <!-- Carousel Controls -->
                            <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                            <!-- End Carousel Controls -->
                        </div>
                        <!-- End Carousel Slideshow -->
                    </div>
                </div>
                <div class="container background-gray-lighter">

                </div>
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <!-- Main Text -->
                        <div class="col-md-12">
                            <h1 class="text-center">Witamy na stronie Plastico!!</h1>
                            <pstyle="font-size:20px;">Jesteśmy przediębiorstwem trudniącym się sprzedażą drzwi i okien od najlepszych firm w kraju.
                              Przedsiębiorstwo wszystkim klientom gwarantuje wszechstronną pomoc przy kupowaniu, a na dodatek pełen zakres
                               obsługi - włączając w to wykonanie montażu, a także techniczny serwis i o wiele więcej.
                                Klienci firmy cenią również atrakcyjne finansowe warunki kooperacji, a także sprawną realizację wszystkich zleceń</p>

                        </div>
                        <!-- End Main Text -->
                    </div>
                </div>
                <div class="container background-gray-lighter">
                    <div class="row padding-vert-20">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">
                            <!-- Portfolio -->
                            <ul class="portfolio-group">
                                <!-- Portfolio Item -->
                                <li class="portfolio-item col-sm-6 col-xs-6 padding-20">
                                    <a href="#">
                                        <figure class="animate fadeInLeft">
                                            <img alt="image1" src="{{ asset('img/frontpage/veka.jpg') }}">
                                            <figcaption>
                                                <h3>Okna Veka</h3>
                                                <span>Veka posiada ponad 40 letnie doświadczenie i jest czołowym na świecie producentem profili okiennych z PCV. Produkty tej firmy  zaliczane są do najwyższej klasy A.</span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- //Portfolio Item// -->
                                <!-- Portfolio Item -->
                                <li class="portfolio-item col-sm-6 col-xs-6 padding-20">
                                    <a href="#">
                                        <figure class="animate fadeInRight">
                                            <img alt="image2" src="{{ asset('img/frontpage/salamander.jpg') }}">
                                            <figcaption>
                                                <h3>Okna Salamander</h3>
                                                <span>Koncern Salamander działa na polskim rynku od prawie dwóch dekad. Firma dysponuje dwoma rodajami systemów okiennych: Brügmann bluEvolution i Salamander.</span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- //Portfolio Item// -->
                                <!-- Portfolio Item -->
                                <li class="portfolio-item col-sm-6 col-xs-6 padding-20">
                                    <a href="#">
                                        <figure class="animate fadeInLeft">
                                            <img alt="image3" src="{{ asset('img/frontpage/aluplast.jpg') }}">
                                            <figcaption>
                                                <h3>Okna Aluplast</h3>
                                                <span>Frima Aluplast charakteryzuje się bogactwem oferty jak i innowacyjnością. Firma praktycznie co roku wprowadza na rynek nowe rozwiązania aby spełnić wymagania klientów. Zróżnicowana oferta pozwala wybrać okna o różnej kombinacji profili.</span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- //Portfolio Item// -->

                                <!-- Portfolio Item -->
                                <li class="portfolio-item col-sm-6 col-xs-6 padding-20">
                                    <a href="#">
                                        <figure class="animate fadeInLeft">
                                            <img alt="image5" src="{{ asset('img/frontpage/zew.jpg') }}">
                                            <figcaption>
                                                <h3>Drzwi zewnętrzne</h3>
                                                <span>Oferujemy drzwi zewnętrze firm PORTO oraz LUNA. Nasi klinci mają możliwość dostosowywania drzwi do własnych potrzeb. Dostępnę są takie opcje jak zmiana futryny, klamek, dobór wizjera, możliwość skracania drzwi. </span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- //Portfolio Item// -->
                                <!-- Portfolio Item -->
                                <li class="portfolio-item col-sm-6 col-xs-6 padding-20">
                                    <a href="#">
                                        <figure class="animate fadeInRight">
                                            <img alt="image6" src="{{ asset('img/frontpage/wew.jpg') }}">
                                            <figcaption>
                                                <h3>Drzwi wewnętrzne</h3>
                                                <span>Oferujemy drzwi wewnętrze firm PORTO oraz LUNA. Nasi klinci mają możliwość dostosowywania drzwi do własnych potrzeb. Dostępnę są takie opcje jak zmiana futryny, klamek, dobór wizjera, możliwość skracania drzwi. </span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- //Portfolio Item// -->
                                <!-- Portfolio Item -->
                                <li class="portfolio-item col-sm-6 col-xs-6 padding-20">
                                    <a href="#">
                                        <figure class="animate fadeInRight">
                                            <img alt="image6" src="{{ asset('img/frontpage/garaz.jpg') }}">
                                            <figcaption>
                                                <h3>Bramy garażowe</h3>
                                                <span>Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui et everti tamquam suavitate mea.</span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- //Portfolio Item// -->
                                <!-- Portfolio Item -->

                                <!-- //Portfolio Item// -->
                                <!-- Portfolio Item -->
                                <li class="portfolio-item col-sm-6 col-xs-6 padding-20">
                                    <a href="#">
                                        <figure class="animate fadeInRight">
                                            <img alt="image6" src="{{ asset('img/frontpage/rolety.jpg') }}">
                                            <figcaption>
                                                <h3>Rolety</h3>
                                                <span>W naszej ofercie można znaleźć rolety od wielu czołowych firm. Są to producenci z wieloletnim doświadczeniem oraz gwarancją jakości wyrabianych produktów. W ofercie dostępne są rolety wewnętrze i zewnętrze.</span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- //Portfolio Item// -->
                                <!-- Portfolio Item -->
                                <li class="portfolio-item col-sm-6 col-xs-6 padding-20">
                                    <a href="#">
                                        <figure class="animate fadeInRight">
                                            <img alt="image6" src="{{ asset('img/frontpage/moskitiery.jpg') }}">
                                            <figcaption>
                                                <h3>Moskitiery</h3>
                                                <span>Posiadamy w ofercie także moskitiery najwyższej jakości, produkowane w naszej firmie.</span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- //Portfolio Item// -->
                            </ul>
                            <!-- End Portfolio -->
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>
                </div>
                <div class="container background-white">
                    <div class="row padding-vert-40">
                        <div class="col-md-12">
                            <h2 class="animate fadeIn text-center">Zapraszamy do skorzystania z naszych usług!</h2>
                            <p class="animate fadeIn text-center">Zapewniamy profesiolaną obsługę, konsultacje, pomiary, montaże oraz serwis naszych produktów</p>
                            <p class="animate fadeInUp text-center">
                                <button class="btn btn-primary btn-lg" type="button">Zobacz więcej</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- === END CONTENT === -->
@endsection
