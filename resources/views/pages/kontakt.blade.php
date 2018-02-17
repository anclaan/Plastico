@extends('main')

@section('title', '| Strona Główna')

@section('content')

            <!-- === BEGIN CONTENT === -->
            <div id="content">

                <div class="container background-gray-lighter">

                </div>

                <div class="container background-gray-lighter">
                    <div class="row padding-vert-20">

                        <div class="col-md-10">
                            {{-- <h3>Tefelon: 509903934</h3>
                            <h3>Adres E-mail: plastico@gmail.com</h3>
                            <h3>Adres siedziby firmy: Błaszki, ul. Sulwińskiego 29</h3> --}}


                                        <form class="form-horizontal" action="{{ url('kontakt') }}" method="POST">
                                        <fieldset>
                                          <legend class="text-center" style="padding-left: 160px;">Napisz do Nas!</legend>
                                            {{ csrf_field() }}
                                          <!-- Email input-->
                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Adres E-mail</label>
                                            <div class="col-md-9">
                                              <input id="email" name="email" type="text" placeholder="Twój E-mail" class="form-control">
                                            </div>
                                          </div>

                                          <!-- Subject input-->
                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="temat">Temat</label>
                                            <div class="col-md-9">
                                              <input id="temat" name="temat" type="text" placeholder="Temat wiadomości" class="form-control">
                                            </div>
                                          </div>

                                          <!-- Message body -->
                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="wiadomosc">Wiadomość</label>
                                            <div class="col-md-9">
                                              <textarea class="form-control" id="wiadomosc" name="wiadomosc" placeholder="Tutaj możesz wpisać treść wiadomości..." rows="5"></textarea>
                                            </div>
                                          </div>

                                          <!-- Form actions -->
                                          <div class="form-group">
                                            <div class="col-md-12 text-right">
                                              <button type="submit" class="btn btn-primary btn-lg">Wyślij</button>
                                            </div>
                                          </div>
                                        </fieldset>
                                        </form>
                                        <div class="col-md-1">
                                        </div>
                                        <div style="float: left;">
                                        <h3>Tefelon: 509903934</h3>
                                        <h3>Adres E-mail: plastico@gmail.com</h3>
                                        <h3>Adres siedziby firmy: Błaszki, ul. Sulwińskiego 29</h3>
                                      </div>

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
