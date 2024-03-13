$(document).ready(function() {
    $(document).on('click', '#upd_prod', function(e) {
        e.preventDefault();

        var form_data = new FormData($('#update_products_form')[0]);
        form_data.append('product_id', $('#product-id').val());

        var product_name = $("input[name='prod_name']").val();
        var product_price = $("input[name='prod_price']").val();
        var prod_desc = $("textarea[name='prod_desc']").val();
        var quantity = $("input[name='quantity']").val();

        if (!product_name) {
            alert('Please fill Product Name.');
            return;
        } else if (!product_price) {
            alert('Please fill Product Price.');
            return;
        } else if (!prod_desc) {
            alert('Please fill Product Description.');
            return;
        } else if (!quantity) {
            alert('Please enter a quantity.');
            return;
        }

        $.ajax({
            url: 'update-products-img.php',
            data: form_data,
            processData: false,
            contentType: false,
            method: 'POST',
            success: function(resp) {
                console.log(resp);
                if (resp == 'successfully updated') {
                    alert("Nice! The product is updated");
                } else {
                    console.log("Error: " + resp);
                }
            },
            error: function(xhr, status, error) {
                console.log("Error: " + error);
                }
                });
                });
                });
