
$(document).ready(function() {
    $(document).on('click', '#update_customer', function(e) {
        e.preventDefault();
        var id = $("input[name='customer_id']").val();
        var username = $("input[name='username']").val();
        var email = $("input[name='email_address']").val();
        var password = $("input[name='password']").val();
        var address = $("input[name='address']").val();
        var number = $("input[name='number']").val();

        if(!username) {
            alert('Please enter a username.');
            return;
        } else if (!email) {
            alert('Please enter an email address.');
            return;
        } else if (!password) {
            alert('Please enter a password.');
            return;
        }else if (!address) {
            alert('Please enter a address.');
            return;
        } else if (!number) {
            alert('Please enter a number.');
            return;
        }

        var test = $('#update_customer_form').serialize();
        console.log(test);
        $.ajax({
            url: 'update-customers.php',
            data: $('#update_customer_form').serialize(),
            method: 'POST',
            success: function(resp) {
                console.log(resp);
                if (resp == 'successfully updated') {
                    alert("Nice! The user is updated");
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