$(document).ready(function(){
   
    $('.upd-dlt').on('click', function(){
        $('.upd-dlt-option', this).toggle();
        var $td = $(this).closest('td');
        var del_prod = $td.siblings('.cust_id').text();
        console.log(del_prod);
    });

})