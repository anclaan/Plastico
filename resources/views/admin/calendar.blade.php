
  @extends('admin.main')

  @section('title', '| Klienci')

  @section('content')
  <div class="panel-body">

  <div id='calendar'></div>

  </div>


  {{Form::open(['route'=>'events.store', 'method'=>'post', 'role'=>'form']) }}
    <div id = "responsive-modal" class = "modal" tabindex="-1" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <h4>Dodaj nową sprawę</h4>
          </div>
          <div class="modal-body">
            <fieldset class="pytanie">
               <input class="czyKlient" type="checkbox" name="czyKlient" value="0" onchange="valueChanged()" />
               <label for="czyKlient">Sprawa dotycząca klienta</label>
           </fieldset>

           <fieldset class="klient">
             <label for="wybierzKlienta">Wybierz klienta</label></br>
             <select id="wybierzKlienta" name="wybierzKlienta" class="form-control"></select></br>
             <label for="wybierzSprawe">Wybierz typ sprawy</label></br>
             <select id="wybierzSprawe" name="wybierzSprawe" class="form-control"></select></br>
           </fieldset>
              <div class="form-group">
                  {{ Form::label('title', 'Nazwa sprawy') }}
                  {{ Form::text('title', old('title'), ['class'=>'form-control']) }}
              </div>
              <div class="form-group">
                  {{ Form::label('date_start', 'Data rozpoczęcia') }}
                  {{ Form::text('date_start', old('date_start'), ['class'=>'form-control', 'readonly'=>'true']) }}
              </div>
              <div class="form-group">
                  {{ Form::label('time_start', 'Czas rozpoczęcia') }}
                  {{ Form::text('time_start', old('time_start'), ['class'=>'form-control']) }}
              </div>
              <div class="form-group">
                  {{ Form::label('date_end', 'Data zakończenia') }}
                  {{ Form::text('date_end', old('date_end'), ['class'=>'form-control']) }}
              </div>
              <div class="form-group">
                  {{ Form::label('opis', 'Opis') }}
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


  {!!Form::open(['route'=>['events.update',1], 'method'=>'PUT', 'id'=>'updatemodal'])!!}
    <div id = "modal-event" class = "modal" tabindex="-1" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <h4>Edytuj sprawę</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  {{ Form::label('_title', 'Nazwa sprawy') }}
                  {{ Form::text('_title', old('_title'), ['class'=>'form-control']) }}
              </div>
              <div class="form-group">
                  {{ Form::label('_date_start', 'Data rozpoczęcia') }}
                  {{ Form::text('_date_start', old('_date_start'), ['class'=>'form-control']) }}
              </div>
              <div class="form-group">
                  {{ Form::label('_time_start', 'Data rozpoczęcia') }}
                  {{ Form::text('_time_start', old('_time_start'), ['class'=>'form-control']) }}
              </div>
              <div class="form-group">
                  {{ Form::label('_date_end', 'Data zakończenia') }}
                  {{ Form::text('_date_end', old('_date_end'), ['class'=>'form-control']) }}
              </div>

              <div class="form-group">
                  {{ Form::label('_opis', 'Opis') }}
                  {{ Form::text('_opis', old('_opis'), ['class'=>'form-control']) }}
              </div>
          </div>
          <div class="modal-footer">
              <meta name="csrf-token" content="{{ csrf_token() }}">
              <a id="delete" data-href="{{ url('events') }}" data-id="" class="btn btn-danger">Usuń</a>
              <button type="button" class="btn btn default" data-dismiss="modal">Anuluj</button>
              {!! Form::submit('Aktualizuj',['class' => 'btn btn-success']) !!}
          </div>
        </div>
      </div>
    </div>
  {{ Form::close() }}


@endsection

@section('js')
  <script>
  var BASEURL = "{{ url('/') }}";
    $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      navLinks: true,
      editable: true,
      selectable: true,
      selectHelper: true,
      events: BASEURL + '/events',

      select: function(start)
      {
        start = moment(start.format());
        $('#date_start').val(start.format('YYYY-MM-DD'));
        $('#responsive-modal').modal('show');



      },


      eventClick: function (event, jsEvent, view)
      {
        var date_start = $.fullCalendar.moment(event.start).format('YYYY-MM-DD');
        var time_start = $.fullCalendar.moment(event.start).format('HH:mm:ss');
        var date_end = $.fullCalendar.moment(event.end).format('YYYY-MM-DD HH:mm:ss');
        $('#modal-event #delete').attr('data-id', event.id);
        $('#updatemodal').attr("action", '/events/'+event.id);
        $('#modal-event #_title').val(event.title);
        $('#modal-event #_date_start').val(date_start);
        $('#modal-event #_time_start').val(time_start);
        $('#modal-event #_date_end').val(date_end);
        $('#modal-event #_typ').val(event.typ);
        $('#modal-event #_opis').val(event.opis);
        $('#modal-event').modal('show');


      }

    });

  });
  $(".klient").hide();
  function valueChanged()
  {
    if($('.czyKlient').is(":checked")){
        $.ajax({
        type: 'GET',
        url: '/events/create',
        success: function(result)
        {
          console.log(result)
          $("#wybierzKlienta").empty();
          $("#wybierzSprawe").empty();



          $.each(result.klienci, function (i, item) {
          $('#wybierzKlienta').append($('<option>', {

              value: item.id,
              text : item.imie+' '+item.nazwisko

          }));
      });



          $.each(result.sprawy, function (i, item) {
          $('#wybierzSprawe').append($('<option>', {

              value: item.id,
              text : item.nazwa


          }));
      });
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
      $(".klient").show();
      }
    else
        $(".klient").hide();
  }





  $('#time_start').timepicker({
      showMeridian: false,
      showSeconds: true,


          });
    $('#_time_start').timepicker({
        showMeridian: false,
        showSeconds: true,


            });
  $('#date_end').datetimepicker({
      format: 'YYYY-MM-DD HH:mm:ss',

          });
  $('#_date_end').datetimepicker({
      format: 'YYYY-MM-DD HH:mm:ss',

          });
  $('#date_start').datetimepicker({
      format: 'YYYY-MM-DD',

          });
  $('#delete').on('click', function(){
      var x = $(this);
      var delete_url = x.attr('data-href')+'/'+x.attr('data-id');

      $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

      $.ajax({
        type: 'DELETE',
        url: delete_url,

        success: function(result)
        {
          if (data.result)
            {
              return true;
            }
          return false;
        },
        error: function(result)
        {
          $('#modal-event').modal('hide');
          alert(result.message);

        },
        complete: function () {
                window.location.reload();
            }





      })

          });
    // $('#update').on('click', function(){
    //     var x = $(this);
    //     var update_url = x.attr('data-href')+'/'+x.attr('data-id');
    //
    //     $.ajax({
    //       url: update_url,
    //       type: 'UPDATE',
    //       success: function()
    //       {
    //         $('#modal-event').modal('hide');
    //         alert(result.message);
    //       },
    //       error: function(result)
    //       {
    //         $('#modal-event').modal('hide');
    //         alert(result.message);
    //       }
    //     })
    //
    //         });
  </script>
@endsection
