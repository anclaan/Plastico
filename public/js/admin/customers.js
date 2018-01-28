$(document).ready(function()
{

  // $(document).on('click', '#edit-modal', function(){
  //
  //   $('#myModal').modal('show');
  //
  //   $('#myModal #_imie').val($(this).data('imie'));
  //   $('#updatemodal').attr("action", '/customers/'+$(this).data('id'));
  //   $('#_nazwisko').val($(this).data('nazwisko'));
  //   $('#_telefon').val($(this).data('telefon'));
  //   $('#_email').val($(this).data('email'));
  //   $('#_nip').val($(this).data('nip'));
  //   $('#_adres').val($(this).data('adres'));
  //   $('#_kod').val($(this).data('kod'));
  //   $('#_poczta').val($(this).data('poczta'));
  //   $('#_id').val($(this).data('id'));
  // })


//       $('#usun').on('click', function() {
//         // if(result)
//         //   alert(result.error);
//         console.log(result.order);
//         //  });
// })



    $('#dodajKlienta').on('click',function(){
      $('#responsive-modal').modal('show')
    });
    // $('.btn-edit').on('click', function(){
    //
    // });
    // $('tbody').delegate('.btn-edit','click', function(){
    //   var value = $(this).data('id');
    //   var url = '{URL::to('getUpdate')}}';
    //   $.ajax({
    //     type : 'get',
    //     url : url,
    //     data : {'id':value},
    //     success:function(data){
    //       console.log(data);
    //     }
    //   })
    // })

    // eventClick: function (customer, jsEvent, view)
    // {
    //   var date_start = $.fullCalendar.moment(event.start).format('YYYY-MM-DD');
    //   var time_start = $.fullCalendar.moment(event.start).format('HH:mm:ss');
    //   var date_end = $.fullCalendar.moment(event.end).format('YYYY-MM-DD HH:mm:ss');
    //   $('#modal-event #delete').attr('data-id', event.id);
    //   $('#updatemodal').attr("action", '/events/'+event.id);
    //   $('#modal-event #_title').val(event.title);
    //   $('#modal-event #_date_start').val(date_start);
    //   $('#modal-event #_time_start').val(time_start);
    //   $('#modal-event #_date_end').val(date_end);
    //   $('#modal-event #_typ').val(event.typ);
    //   $('#modal-event #_opis').val(event.opis);
    //   $('#modal-event').modal('show');
    //
    //
    // }
    $('.button').on('click', function ()
  {
        var url = '/customers';
        var id =$(this).data('id');

        $('#myModal').modal('show');
        $.ajax({
        type: 'GET',
        url: '/customers/'+id+'/edit',
        success: function(result)
        {
          console.log(result.id);

          $('#myModal #_imie').val(result.imie);
          $('#updatemodal').attr("action", '/customers/'+result.id);
          $('#_nazwisko').val(result.nazwisko);
          $('#_telefon').val(result.telefon);
          $('#_email').val(result.email);
          $('#_nip').val(result.nip);
          $('#_adres').val(result.adres);
          $('#_kod').val(result.kod);
          $('#_poczta').val(result.poczta);

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

  })




  })
