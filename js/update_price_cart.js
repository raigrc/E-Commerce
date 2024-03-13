$(document).ready(function() {
  $(document).on('change','#form1', function(e) {
    var quantity = $(this).val();
    var price = $(this).closest('.card').find("input[name='total_amount']").val();
    var total_price = quantity * price;
    console.log(total_price);

    $(this).closest('.card').find('#total-price').html('₱ ' + total_price);
  })
});

