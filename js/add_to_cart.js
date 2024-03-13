$(document).ready(function(){
    $('#add_to_cart').on('click', function(e){

        var quantity = $("input[name='quantity']").val();
        var prod_id = $("input[name='prod_id']").val();
        var cust_id = $("input[name='cust_id']").val();

        console.log(quantity);
        console.log(prod_id);
        console.log(cust_id);

        $.ajax({
            url: 'add_to_cart.php',
            data: {
                quantity: quantity,
                prod_id: prod_id,
                cust_id: cust_id
            },
            method: 'POST',
            success: function(resp) {
                
                if (resp == 'successfully added to cart') {
                    console.log("Nice! Keep on adding to cart!");
                    alert("Nice! Keep on adding to cart!");
                } else {
                    console.log("Error: " + resp);
                }
            },
            error: function(xhr, status, error) {
                console.log("Error: " + error);
            }
        })        
    })
})
