// $('#dodajProdukt').on('click',function(){
//   $('#responsive-modal').modal('show')
// });
$('#tabelaZamowien').DataTable({

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

$('#szczegoly').on('click', function ()
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
