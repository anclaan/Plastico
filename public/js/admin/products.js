$(document).ready(function()
  {
    $('#dodajProdukt').on('click',function(){
      $('#responsive-modal').modal('show')
    });
    $('.button').on('click', function ()
  {
        var url = '/products';
        var id =$(this).data('id');

        $('#myModal').modal('show');
        $.ajax({
        type: 'GET',
        url: '/products/'+id+'/edit',
        success: function(result)
        {
          console.log(result.produkt.id);
          console.log(result.produkt.productType_id);
          $('#myModal #_imie').val(result.produkt.imie);
          $('#updatemodal').attr("action", '/products/'+result.produkt.id);
          $('#_nazwa').val(result.produkt.nazwa);
          $('#_typy').val(result.produkt.productType_id);

          $('#_opis').val(result.produkt.opis);

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
