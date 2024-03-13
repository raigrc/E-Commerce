$(document).ready(function(){
    $('button[name="dlt-btn"]').on('click', function(){
        var customer_id = $(this).closest('tr').find('.cust_id').text();
        console.log(customer_id);
        var confirmDelete = confirm("Are you sure you want to delete the customer?");
        if (confirmDelete) {
            $.ajax ({
                type: "POST",
                url: "delete-customers.php",
                data: {
                    delete_customer: true,
                    customer_id: customer_id
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.log(status + ':' + error);
                    console.log("error");
                },
            });
        }
    });
})