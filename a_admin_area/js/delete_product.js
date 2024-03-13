$(document).ready(function(){
    $('button[name="dlt-btn"]').on('click', function(){
        var product_id = $(this).closest('tr').find('.prod_id').text();
        console.log(product_id);
        var confirmDelete = confirm("Are you sure you want to delete the product?");
        if (confirmDelete) {
            $.ajax ({
                type: "POST",
                url: "delete-products.php",
                data: {
                    delete_product: true,
                    product_id: product_id
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