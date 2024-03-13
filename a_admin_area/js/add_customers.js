
$(document).ready(function() {
    $(document).on('click', '#add_customer', function(e) {
        e.preventDefault();
        console.log("hello!");
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

        var test = $('#customer_form').serialize();
        console.log(test);
        $.ajax({
            url: 'add-customers.php',
            data: $('#customer_form').serialize(),
            method: 'POST',
            success: function(resp){
                // var data = JSON.parse(resp);
                console.log(resp);
                if (resp === 'successfully inserted') {
                    alert ("Nice! The user can now login");
                }else if (resp === "Email address is already taken") {
                    alert ('Email address is already taken');
                    $("input[name='password']").val("");
                }else if (resp === "Username Is already taken") {
                    alert ('Username Is already take')
                    $("input[name='password']").val("");
                }else {
                    console.log("error");
                }
            }
        })
    })
})