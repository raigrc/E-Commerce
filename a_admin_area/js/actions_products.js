$(document).ready(function() {
    $(document).on('change', '.form1', function(e) {
      var quantity = $(this).val();
      var price = $(this).closest('.row').find("input[name='total_amount']").val();
      var total_price = quantity * price;
      console.log(price);
  
      $(this).closest('.row').find('.total-price').html('₱ ' + total_price);
    })
  });
  