
$(document).ready(function() {
    $(document).on('click', '#signup_btn', function(e) {
        e.preventDefault();
        var user = $("input[name='user']").val();
        var email = $("input[name='email']").val();
        var password = $("input[name='password']").val();
        var address = $("input[name='address']").val();
        var number = $("input[name='number']").val();

        if(!user) {
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

        var test = $('#signup').serialize();
        console.log(test);
        $.ajax({
            url: '../a_customer_area/signup-valid.php',
            data: $('#signup').serialize(),
            method: 'POST',
            success: function(resp){
                // var data = JSON.parse(resp);
                console.log(resp);
                if (resp === 'successfully inserted') {
                    alert ("Nice! You can Login now");
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