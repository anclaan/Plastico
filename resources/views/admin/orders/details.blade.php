@extends('admin.main')

@section('title', '| Szczegóły zamówienia')

@section('content')

  {{Form::open(['route'=>'orders.create', 'method'=>'GET', 'role'=>'form']) }}
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
          <div id="parametry"></div>
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

  {{Form::open(['route'=>['orders.create',1], 'method'=>'PUT', 'id'=>'updatemodal']) }}
  <div id = "changeStatusM" class = "modal" tabindex="-1" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4>Zmiana statusu zamówienia: {{ $order->nazwa}}</h4>
        </div>

        <div class="modal-body">

          <div class="form-group">
            {{ Form::label('id', 'Id:') }}
            {{ Form::text('id', old($order->id), ['class'=>'form-control']) }}
          </div>

          <div class="form-group">
            {{ Form::label('status', 'Status:') }}
            {{ Form::select('status', ['Wszystkie','Przyjęte do realizacji', 'Wysłane do producenta', 'Gotowe do montażu', 'Oczekujące na zapłatę', 'Zakończone', 'Anulowane']) }}
          </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Anuluj</button>
            {!! Form::submit('Zapisz',['class' => 'btn btn-success']) !!}
        </div>
      </div>
    </div>
  </div>
  {{ Form::close() }}

<div>
{{-- {{Form::open(['route'=>'customers.create', 'method'=>'GET', 'role'=>'form']) }} --}}
<a type="button" href="/admin/orders/index" class="btn btn-info" style="float:right;" data-dismiss="modal">Powrót do listy zamówień</a>
      <div style="border-bottom-style: solid;">
          <h1>Szczegóły zamówienia {{ $order->nazwa }}</h1>
      </div>
      <div>
      <h2>Status zamówienia:
         @if($order->status_id == 1 || $order->status_id == 2 || $order->status_id == 3 )
              <p style="color:green; font:bold;">{{$order->status['nazwa']}}</p>
         @else
              <p style="color:red;">{{$order->status['nazwa']}}</p>
         @endif
      </h2>
      <button type="button" id="zmienStatus" class="btn btn-default" data-dismiss="modal">Zmień status</button>
    </div>

      <div id = "content" class="col-md-3">

          <div class="modal-header">
              <h4>Dane zamówienia</h4>
          </div>
          <div id="form-body" style="background color: white;">
              <div class="form-group">
                  {{ Form::label('nazwa', 'Numer zamówienia') }}
                  {{ Form::text('nazwa', $order->nazwa, ['class'=>'form-control']) }}
              </div>
              <div class="form-group">
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
                  {{ Form::label('cena', 'Koszt całkowity') }}
                  {{ Form::text('cena', old('cena'), ['class'=>'form-control']) }}
              </div>
          </div>
          <a role="button" id="nowyProdukt" type="button" class="btn btn-default">Dodaj produkt</a>
          <h2>Koszt całkowity: {{$order->kosztCalkowity}} zł</h2>
        </div>




        <div id = "produkty" class="col-md-9">
          <div class="modal-header">
              <h4>Lista produktów</h4>
          </div>
          <div class="panel-body">
            <table class="table">
                  <thead>
                    <tr>
                      <th>Lp.</th>
                      <th>Typ produktu</th>
                      <th>Nazwa produktu</th>
                      <th>Cena</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php ($i = 1)
{{-- {{dd($orderProducts)}} --}}
                    @foreach ($orderProducts as $op)

                    <tr>
                        <td>
                          {{$i}}
                        </td>
                        <td>
                          {{$op->typy['nazwa']}}
                        </td>
                        <td>
                          {{$op->produkt['nazwa']}}
                        </td>
                        <td>
                          {{$op->cenaProduktu}} zł
                        </td>
                        <td>
                          <span class="glyphicon glyphicon-remove"  style="color:red;"></span>

                        </a>
                          </th>
                      </tr>
                      @php ($i++)
                      @endforeach
                  </tbody>
                </table>
          </div>
        </div>
      <div class="modal-footer">

        @if($order->status_id == 1)
          <a href={{ route('changeStatus',['id'=>$order->id,'status'=>2])}} type="button" class="btn btn-success" id='wyslane' style="float:left;" data-dismiss="modal">Oznacz jako "Wysłane do producenta"</a>
        @elseif($order->status_id == 2)
          <a href={{ route('changeStatus',['id'=>$order->id,'status'=>3])}} type="button" class="btn btn-success" id='gotowe' style="float:left;" data-dismiss="modal">Oznacz jako "Gotowe do montażu"</a>
        @elseif($order->status_id == 3)
          <a href={{ route('changeStatus',['id'=>$order->id,'status'=>4])}} type="button" class="btn btn-danger"  id='oczekujace' style="float:left;" data-dismiss="modal">Oznacz jako "Oczekujące na zapłatę"</a>
          <a href={{ route('changeStatus',['id'=>$order->id,'status'=>5])}} type="button" class="btn btn-success" id='zakonczone' style="float:left;" data-dismiss="modal">Oznacz jako "Zakończone"</a>
        @elseif($order->status_id == 4)
          <a href={{ route('changeStatus',['id'=>$order->id,'status'=>5])}} type="button" class="btn btn-success" id='zakonczone' style="float:left;" data-dismiss="modal">Oznacz jako "Zakończone"</a>
        @endif

        <a href={{ route('changeStatus',['id'=>$order->id,'status'=>6])}} type="button" style="float:right;" id='anulowane' class="btn btn-danger" >Anuluj zamówienie</a>
      </div>

{{-- {{ Form::close() }} --}}
</div>


@endsection

@section('js')
  <script>
    $(document).ready(function()
    {

      $('#zmienStatus').on('click',function(){

        var url = '/orders';
        var id =$(this).data('id');

        $('#changeStatusM').modal('show');

        $.ajax({
        type: 'GET',
        url: '/orders/'+id+'/changeStatusManually',
        success: function()
        {



        },
        error: function(result)
        {
          $('#modal-event').modal('hide');
          alert(result.message);

        },
        complete: function () {
              //  window.location.reload();
            }



      })

      });


      $('#tabelaProduktowWZamowieniu').DataTable({

        "language": {
             "lengthMenu": "Pokaż _MENU_ rekordów",
             "zeroRecords": "Brak wyników",
             "search": "Szukaj:",
             "info": "Strona  _PAGE_ z _PAGES_",
             "infoEmpty": "No records available",
             "infoFiltered": "(filtered from _MAX_ total records)",
             "paginate": {
                          "first":      "Pierwsza",
                          "last":       "Ostatna",
                          "next":       "Następna",
                          "previous":   "Poprzednia"
                        }
         }
      });


      $('#terminRealizacji').datetimepicker({
          format: 'YYYY-MM-DD',

              });
      $('#dataRealizacji').datetimepicker({
          format: 'YYYY-MM-DD',

              });
      $('#nowyProdukt').on('click',function(){
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
        '<div class="form-group"> {{ Form::label('szerokoscProfilu', 'Szerokość profilu:') }} {{ Form::text('szerokoscProfilu', old('szerokoscProfilu'), ['class'=>'form-control']) }}</div>'+
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
        '<div class="form-group"> {{ Form::label('kolor', 'Kolor:') }} {{ Form::select('kolor', ['Złoty Dąb'=>'Złoty Dąb','Ciemny Dąb'=>'Ciemny Dąb'],null,['class' => 'form-control']) }}</div>'+
        '<div class="form-group"> {{ Form::label('typBramy', 'Typ:') }} {{ Form::select('typBramy', ['Segmentowa'=>'Segmentowa','Uchylna'=>'Uchylna'],null,['class' => 'form-control']) }}</div>'
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
        '<div class="form-group"> {{ Form::label('typRolety', 'Typ rolety:') }} {{ Form::select('typRolety', ['Elewacyjna'=>'Elewacyjna','Integro'=>'Integro'],null,['class' => 'form-control']) }}</div>'+
        '<div class="form-group"> {{ Form::label('tworzywo', 'Tworzywo:') }} {{ Form::select('tworzywo', ['PVC'=>'PVC','Metal'=>'Metal'],null,['class' => 'form-control']) }}</div>'+
        '<div class="form-group"> {{ Form::label('kolorRolety', 'Kolor rolety:') }} {{ Form::select('kolorRolety', ['Brak'=>'Brak','Zwykłe'=>'Zwykłe','Specjalne'=>'Specjalne'],null,['class' => 'form-control']) }}</div>'
        );
      }
      if(typeId == 8)
      {
        $('#parametry').html(
        '<div class="form-group"> {{ Form::label('dlugoscRolety', 'Długość rolety:') }} {{ Form::text('dlugoscRolety', old('dlugoscRolety'), ['class'=>'form-control']) }}</div>'+
        '<div class="form-group"> {{ Form::label('szerokoscRolety', 'Szerokość rolety:') }} {{ Form::text('szerokoscRolety', old('szerokoscRolety'), ['class'=>'form-control']) }}</div>'+
        '<div class="form-group"> {{ Form::label('typRolety', 'Typ rolety:') }} {{ Form::select('typRolety', ['Zwykła'=>'Zwykła','Dzień/Noc'=>'Dzień/Noc'],null,['class' => 'form-control']) }}</div>'+
        '<div class="form-group"> {{ Form::label('kolorMaterialu', 'Kolor materiału:') }} {{ Form::select('kolorMaterialu', ['Biały'=>'Biały','Czarny'=>'Czarny','Pomarańczowy'=>'Pomarańczowy','Szary'=>'Szary','Zielony'=>'Zielony','Niebieski'=>'Niebieski','Inny'=>'Inny'],null,['class' => 'form-control']) }}</div>'
        );

      }
      if(typeId == 9)
      {
        $('#parametry').html(
        '<div class="form-group"> {{ Form::label('wysokoscMoskitiery', 'Wysokość moskitiery:') }} {{ Form::text('wysokoscMoskitiery', old('wysokoscMoskitiery'), ['class'=>'form-control']) }}</div>'+
        '<div class="form-group"> {{ Form::label('szerokoscMoskitiery', 'Szerokość moskitiery:') }} {{ Form::text('szerokoscMoskitiery', old('szerokoscMoskitiery'), ['class'=>'form-control']) }}</div>'+
        '<div class="form-group"> {{ Form::label('kolor', 'Kolor:') }} {{ Form::select('kolor', ['Czarny'=>'Czarny','Biały'=>'Biały','Dąb'=>'Dąb '],null,['class' => 'form-control']) }}</div>'+
        '<div class="form-group"> {{ Form::label('klipsy', 'Klipsy:') }} {{ Form::select('klipsy', ['Standardowe'=>'Standardowe','Czarne'=>'Czarne','Białe'=>'Białe','Brązowe'=>'Brązowe'],null,['class' => 'form-control']) }}</div>'
        );

      }


  });

  $('#dodajProdukt').on('click',function(){

  });
    })
  </script>
@endsection
