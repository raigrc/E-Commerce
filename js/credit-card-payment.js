$(document).ready(function(){
    $('#credit-card-payment').on('click', function(e){

        var pay_method = "Credit Card";
        const urlParams = new URLSearchParams(window.location.search);
        const orderId = urlParams.get('id');

        var acc_name = $("input[name='username']").val();
        var acc_number = $("input[name='cardNumber']").val();
        var month = $("input[name='monthy']").val();
        var cvv = $("input[name='cvvs']").val();

        if (acc_name == '' || acc_number == '' || month == '' || cvv == '') {
            alert('Please fill in all required fields.');
            return false;
        } else {
            $.ajax({
                url: '../elective/payment.php',
                data: {
                    pay_method: pay_method,
                    order_id: orderId
                },
                method: 'POST',
                success: function(resp) {
                    console.log(resp);
                    if (resp == 'successfully paid the order!') {
                        alert('successfully paid the order!');
                        window.location.href = '../elective/user_setting.php'
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Error: " + error);
                }
            })        
        }
        
    })

    $('#paypal-payment').on('click', function(e){

        var pay_method = "Paypal";
        const urlParams = new URLSearchParams(window.location.search);
        const orderId = urlParams.get('id');

        var paypal_acc = $("input[name='paypal-mail']").val();

        if (paypal_acc == '') {
            alert('Please fill in all required fields.');
            return false;
        } else {
            $.ajax({
                url: '../elective/payment.php',
                data: {
                    pay_method: pay_method,
                    order_id: orderId
                },
                method: 'POST',
                success: function(resp) {
                    console.log(resp);
                    if (resp == 'successfully paid the order!') {
                        alert('successfully paid the order!');
                        window.location.href = '../elective/user_setting.php'
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Error: " + error);
                }
            })      
        }
    })

    $('#gcash-payment').on('click', function(e){

        var pay_method = "GCASH";
        const urlParams = new URLSearchParams(window.location.search);
        const orderId = urlParams.get('id');

        var gcash_num = $("input[name='gcash-num']").val();

        $.ajax({
            url: '../elective/payment.php',
            data: {
                pay_method: pay_method,
                order_id: orderId
            },
            method: 'POST',
            success: function(resp) {
                console.log(resp);
                if (resp == 'successfully paid the order!') {
                    alert('successfully paid the order!');
                    window.location.href = '../elective/user_setting.php'
                }
            },
            error: function(xhr, status, error) {
                console.log("Error: " + error);
            }
        })        
    })
})
