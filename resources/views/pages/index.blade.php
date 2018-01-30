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
                            <h2 class="text-center">Witamy na stronie Plastico!!</h2>
                            <p class="text-center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit
                                lobortis nisl ut aliquip ex ea commodo consequat.</p>
                            <p class="text-center">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit
                                augue duis dolore te feugait nulla facilisi. Cras non sem sem, at eleifend mi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Curabitur eget nisl
                                a risus.</p>
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
                                                <span>Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui et everti tamquam suavitate mea.</span>
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
                                                <span>Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui et everti tamquam suavitate mea.</span>
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
                                                <span>Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui et everti tamquam suavitate mea.</span>
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
                                                <span>Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui et everti tamquam suavitate mea.</span>
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
                                                <span>Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui et everti tamquam suavitate mea.</span>
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
                                <li class="portfolio-item col-sm-6 col-xs-6 padding-20">
                                    <a href="#">
                                        <figure class="animate fadeInRight">
                                            <img alt="image6" src="{{ asset('img/frontpage/ogrodzeniowe.jpg') }}">
                                            <figcaption>
                                                <h3>Bramy ogrodzeniowe</h3>
                                                <span>Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui et everti tamquam suavitate mea.</span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- //Portfolio Item// -->
                                <!-- Portfolio Item -->
                                <li class="portfolio-item col-sm-6 col-xs-6 padding-20">
                                    <a href="#">
                                        <figure class="animate fadeInRight">
                                            <img alt="image6" src="{{ asset('img/frontpage/rolety.jpg') }}">
                                            <figcaption>
                                                <h3>Rolety</h3>
                                                <span>Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui et everti tamquam suavitate mea.</span>
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
                                                <span>Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui et everti tamquam suavitate mea.</span>
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
