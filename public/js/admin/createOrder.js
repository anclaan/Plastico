<script>
  $(document).ready(function()
  {

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
