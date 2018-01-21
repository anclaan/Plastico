<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">


    {!! Html::style('vendor/bootstrap/dist/css/bootstrap.css') !!}
    {!! Html::style('vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') !!}
    {!! Html::style('css/styles.css') !!}
    {!! Html::style('css/myStyles.css') !!}





  </head>
  <body>
    @include('partials._adminNav')

        <div class="page-content">
        	<div class="row">


		  <div class="col-md-10">
        <div class="content-box-large">
		  	<div class="row">
          {{Form::open(['route'=>'orders.create', 'method'=>'post', 'role'=>'form']) }}
          <div id = "responsive-modal" class = "modal" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                    <h4>Dodawanie produktu do zamówienia</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    {{ Form::label('typy', 'Typ produktu') }}
                    {!! Form::select('typy', $typy, null,['class' => 'form-control'] ) !!}
                  </div>
                  <div class="form-group">
                    <label>Wybierz produkt</label>
                    <select name="produkty" class="form-control">
                       <option>--Produkt--</option>
                    </select>
                  </div>
                  <div id="parametry">
                  </div>
                  <div class="col-md-2"><span id="loader"><i class="fa fa-spinner fa-3x fa-spin"></i></span></div>
                    <div class="form-group">
                        {{ Form::label('cena', 'Cena') }}
                        {{ Form::text('cena', old('cena'), ['class'=>'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{ Form::label('opis', 'Dodatki/Opis') }}
                        {{ Form::textarea('opis', old('opis'), ['class'=>'form-control']) }}
                    </div>
                  </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn default" data-dismiss="modal">Anuluj</button>
                    {!! Form::submit('Dodaj',['class' => 'btn btn-success']) !!}
                </div>
              </div>
            </div>
          </div>
          {{ Form::close() }}
          <div id = "content" class="col-md-4" onloadedmetadata="">


            {{Form::open(['route'=>'orders.create', 'method'=>'GET', 'role'=>'form']) }}
                <div class="modal-header">
                    <h4>Nowe zamówienie</h4>
                </div>
                <div id="form-body" style="background color: white;">
                <div class="form-group">
                        {{ Form::label('nazwa', 'Numer zamówienia') }}
                        {{ Form::text('nazwa', old('nazwa'), ['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                      {{-- {{ Form::label('klient', 'Klient') }}
                      {!! Form::select('klient', $klienci, null,['class' => 'form-control'] ) !!} --}}
                      {{ Form::label('klient', 'Klient') }}
                      <select class="form-control" name="klient">
                        @foreach($klienci as $klient)
                          <option value="{{$klient->id}}">{{$klient->imie}} {{$klient->nazwisko}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        {{ Form::label('terminRealizacji', 'Termin realizacji') }}
                        {{ Form::text('terminRealizacji', old('terminRealizacji'), ['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('dataRealizacji', 'Data realizacji') }}
                        {{ Form::text('dataRealizacji', old('dataRealizacji'), ['class'=>'form-control']) }}
                    </div>

                </div>
                <a role="button" id="dodajProdukt" type="button" class="btn btn-info">Dodaj produkt</a>

              </div>
              <div id = "produkty" class="col-md-6">
                <div class="modal-header">
                    <h4>Lista produktów</h4>
                </div>
                <div class="panel-body">
                  <table class="produktyZamowienie table" style="height:5300px;">
  				              <thead>
  				                <tr>
                            <th>Lp.</th>
                            <th>Nazwa produktu</th>
  				                  <th>Cena</th>
  				                  <th>Opis</th>
  				                  <th>Zarządzaj</th>
  				                </tr>
  				              </thead>
                      </table>
                </div>
                <div class="modal-footer">
                    <button  type="button" class="btn btn default" data-dismiss="modal">Anuluj</button>

                    {!! Form::submit('Utwórz zamówienie',['class' => 'btn btn-success']) !!}
                </div>
                {{ Form::close() }}
              </div>

          </div>

          </div>








		  </div>
    </div>
    </div>





    {!! Html::script('https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js') !!}
    {!! Html::script('vendor/jquery/dist/jquery.min.js') !!}
    {!! Html::script('vendor/bootstrap/dist/js/bootstrap.js') !!}
    {{-- {!! Html::script('js/bootstrap.min.js') !!} --}}
    {!! Html::script('vendor/moment/min/moment.min.js') !!}
    {!! Html::script('vendor/bootstrap/js/collapse.js') !!}
    {!! Html::script('vendor/bootstrap/js/transition.js') !!}
    {!! Html::script('vendor/fullcalendar/fullcalendar.min.js') !!}
    {!! Html::script('vendor/fullcalendar/locale/pl.js') !!}
    {!! Html::script('vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') !!}
    {!! Html::script('vendor/bootstrap-timepicker/js/bootstrap-timepicker.js') !!}

    <script>
      $(document).ready(function()
      {
        $('#terminRealizacji').datetimepicker({
            format: 'YYYY-MM-DD',

                });
        $('#dataRealizacji').datetimepicker({
            format: 'YYYY-MM-DD',

                });
        $('#dodajProdukt').on('click',function(){
          $('#responsive-modal').modal('show')
        });

        $('#produkt').on('change', function()
        {
              var produkt = $('#produkt').val($(this).data('typId'));

              // $.ajax({
              // type: 'GET',
              // url: '/events/create',
              // success: function(result)
              // {
              //
              // },
              // error: function(result)
              // {
              //
              //
              // },
              // complete: function () {
              //       //  window.location.reload();
              //     }
              //
              // })

          })

    $('select[name="typy"]').on('change', function(){
        var typeId = $(this).val();
        console.log(typeId);
        if(typeId) {
            $.ajax({


                url: '/admin/orders/get/'+typeId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="produkty"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="produkty"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="produkty"]').empty();
        }

        if(typeId == 1)
        {
          $('#parametry').html(
          '<div class="form-group"> {{ Form::label('wysokoscOkna', 'Wysokość okna:') }} {{ Form::text('wysokoscOkna', old('wysokoscOkna'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('szerokoscOkna', 'Szerokość okna:') }} {{ Form::text('szerokoscOkna', old('szerokoscOkna'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('szerokoscProfilu', 'Szerokość profilu:') }} {{ Form::text('szerokosc', old('szerokosc'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('kolorOkna', 'Kolor okna:') }} {{ Form::select('kolorOkna', ['Biały'=>'Biały','Aluminium'=>'Aluminium','Złoty Dąb'=>'Złoty Dąb','Ciemny Dąb'=>'Ciemny Dąb','Dąb Naturalny'=>'Dąb Naturalny','Orzech'=>'Orzech','Mahoń'=>'Mahoń'],null,['class' => 'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('kolorCieplejRamki', 'Kolor ciepłej ramki:') }} {{ Form::select('kolorCieplejRamki', ['Biały'=>'Biały','Brązowy'=>'Brązowy','Czarny'=>'Czarny','Szary'=>'Szary','Orzech'=>'Orzech'],null,['class' => 'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('klamki', 'Klamki:') }} {{ Form::text('klamki', old('klamki'), ['class'=>'form-control']) }}</div>'
        );




        }else if(typeId == 2)
        {
          $('#parametry').html(
          '<div class="form-group"> {{ Form::label('wysokoscDrzwi', 'Wysokość drzwi:') }} {{ Form::text('wysokoscDrzwi', old('wysokoscDrzwi'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('szerokoscDrzwi', 'Szerokość drzwi:') }} {{ Form::text('szerokoscDrzwi', old('szerokoscDrzwi'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('oscieznica', 'Ościeżnica:') }} {{ Form::text('szerokosc', old('szerokosc'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('wizjer', 'Wizjer:') }} {{ Form::select('wizjer', ['Brak'=>'Brak','Panoramiczny'=>'Panoramiczny','Z lustrzanką'=>'Z lustrzanką'],null,['class' => 'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('klamki', 'Klamki:') }} {{ Form::select('klamki', ['Plastikowe'=>'Plastikowe','Metalowe'=>'Metalowe'],null,['class' => 'form-control']) }}</div>'
        );


        }
        if(typeId == 3)
        {
          $('#parametry').html(
          '<div class="form-group"> {{ Form::label('wysokoscDrzwi', 'Wysokość drzwi:') }} {{ Form::text('wysokoscDrzwi', old('wysokoscDrzwi'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('szerokoscDrzwi', 'Szerokość drzwi:') }} {{ Form::text('szerokoscDrzwi', old('szerokoscDrzwi'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('oscieznica', 'Ościeżnica:') }} {{ Form::text('oscieznica', old('oscieznica'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('klamki', 'Klamki:') }} {{ Form::select('klamki', ['Plastikowe'=>'Plastikowe','Plastikowe'=>'Metalowe'],null,['class' => 'form-control']) }}</div>'
          );
        }
        if(typeId == 4)
        {
          $('#parametry').html(
          '<div class="form-group"> {{ Form::label('wysokoscBramy', 'Wysokość bramy:') }} {{ Form::text('wysokoscBramy', old('wysokoscBramy'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('szerokoscBramy', 'Szerokość bramy:') }} {{ Form::text('szerokoscBramy', old('szerokoscBramy'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('oscieznica', 'Ościeżnica:') }} {{ Form::text('oscieznica', old('oscieznica'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('typ', 'Typ:') }} {{ Form::select('typ', ['Segmentowa'=>'Segmentowa','Uchylna'=>'Uchylna'],null,['class' => 'form-control']) }}</div>'
          );
        }
        if(typeId == 5)
        {
          $('#parametry').html(
          '<div class="form-group"> {{ Form::label('dlugoscParapetu', 'Długość parapetu:') }} {{ Form::text('dlugoscParapetu', old('dlugoscParapetu'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('szerokoscParapetu', 'Szerokość parapetu:') }} {{ Form::text('szerokoscParapetu', old('szerokoscParapetu'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('tworzywo', 'Tworzywo:') }} {{ Form::select('tworzywo', ['PVC'=>'PVC','Marmur'=>'Marmur','Metal'=>'Metal'],null,['class' => 'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('zakonczenie', 'Zakończenie:') }} {{ Form::select('zakonczenie', ['Brak'=>'Brak','Zwykłe'=>'Zwykłe','Specjalne'=>'Specjalne'],null,['class' => 'form-control']) }}</div>'
          );
        }
        if(typeId == 6)
        {
          $('#parametry').html(
          '<div class="form-group"> {{ Form::label('dlugoscParapetu', 'Długość parapetu:') }} {{ Form::text('dlugoscParapetu', old('dlugoscParapetu'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('szerokoscParapetu', 'Szerokość parapetu:') }} {{ Form::text('szerokoscParapetu', old('szerokoscParapetu'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('tworzywo', 'Tworzywo:') }} {{ Form::select('tworzywo', ['PVC'=>'PVC','Marmur'=>'Marmur','Metal'=>'Metal'],null,['class' => 'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('zakonczenie', 'Zakończenie:') }} {{ Form::select('zakonczenie', ['Brak'=>'Brak','Zwykłe'=>'Zwykłe','Specjalne'=>'Specjalne'],null,['class' => 'form-control']) }}</div>'
        );
        }
        if(typeId == 7)
        {
          $('#parametry').html(
          '<div class="form-group"> {{ Form::label('dlugoscRolety', 'Długość rolety:') }} {{ Form::text('dlugoscRolety', old('dlugoscRolety'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('szerokoscRolety', 'Szerokość rolety:') }} {{ Form::text('szerokoscRolety', old('szerokoscRolety'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('typ', 'Typ rolety:') }} {{ Form::select('typ', ['Elewacyjna'=>'Elewacyjna','Integro'=>'Integro'],null,['class' => 'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('tworzywo', 'Tworzywo:') }} {{ Form::select('tworzywo', ['PVC'=>'PVC','Metal'=>'Metal'],null,['class' => 'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('kolorRolety', 'Kolor rolety:') }} {{ Form::select('kolorRolety', ['Brak'=>'Brak','Zwykłe'=>'Zwykłe','Specjalne'=>'Specjalne'],null,['class' => 'form-control']) }}</div>'
          );
        }
        if(typeId == 8)
        {
          $('#parametry').html(
          '<div class="form-group"> {{ Form::label('dlugoscRolety', 'Długość rolety:') }} {{ Form::text('dlugoscRolety', old('dlugoscRolety'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('szerokoscRolety', 'Szerokość rolety:') }} {{ Form::text('szerokoscRolety', old('szerokoscRolety'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('typ', 'Typ rolety:') }} {{ Form::select('typ', ['Zwykła'=>'Zwykła','Dzień/Noc'=>'Dzień/Noc'],null,['class' => 'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('tworzywo', 'Tworzywo:') }} {{ Form::select('tworzywo', ['PVC'=>'PVC','Metal'=>'Metal'],null,['class' => 'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('kolorMaterialu', 'Kolor materiału:') }} {{ Form::select('kolorMaterialu', ['Biały'=>'Biały','Czarny'=>'Czarny','Pomarańczowy'=>'Pomarańczowy','Szary'=>'Szary','Zielony'=>'Zielony','Niebieski'=>'Niebieski','Inny'=>'Inny'],null,['class' => 'form-control']) }}</div>'
          );

        }
        if(typeId == 9)
        {
          $('#parametry').html(
          '<div class="form-group"> {{ Form::label('wysokoscMoskitiery', 'Wysokość moskitiery:') }} {{ Form::text('wysokoscMoskitiery', old('wysokoscMoskitiery'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('szerokoscMoskitiery', 'Szerokość moskitiery:') }} {{ Form::text('szerokoscMoskitiery', old('szerokoscMoskitiery'), ['class'=>'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('kolor', 'Kolor:') }} {{ Form::select('typ', ['Czarny'=>'Czarny','Biały'=>'Biały','Dąb'=>'Dąb '],null,['class' => 'form-control']) }}</div>'+
          '<div class="form-group"> {{ Form::label('klipsy', 'Klipsy:') }} {{ Form::select('kolorMaterialu', ['Standardowe'=>'Standardowe','Czarne'=>'Czarne','Białe'=>'Białe','Brązowe'=>'Brązowe'],null,['class' => 'form-control']) }}</div>'
          );

        }


    });
      })
    </script>

  </body>
</html>
