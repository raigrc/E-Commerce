$(document).ready(function(){
    $('#submit').on('click', function(e) {
        var username = $("input[name='username']").val();
        var email_address = $("input[name='email']").val();
        var mobile_number = $("input[name='mobile_number']").val();
        var address = $("input[name='address']").val();
        var new_pass = $("input[name='new_pass']").val();
        var conf_new_pass = $("input[name='conf_new_pass']").val();

        var test = $('#upd-usr-setting').serialize();
        // console.log(test);

        if (username == '' || email_address == '' || mobile_number == '' || address == '') {
            alert ('Please fill up all the field');
        } else if (new_pass != conf_new_pass) {
            alert ('The new password does not match');
        } else {
            $.ajax({
                url: 'update-users.php',
                data: $('#upd-usr-setting').serialize(),
                method: 'POST',
                success: function(resp) {
                    console.log(resp);
                    if (resp == 'successfully updated') {
                        alert("Nice! The customer is updated");
                    } else {
                        console.log("Error: " + resp);
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Error: " + error);
                }
            })      
        }
    })
})