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
