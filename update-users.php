<?php 

session_start();

require_once("conn.php");

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['mobile_number']) && isset($_POST['address']) && isset($_POST['new_pass']) && isset($_POST['conf_new_pass'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $customer_id = validate($_SESSION['customer_id']);
    $username = validate($_POST['username']);
    $email_address = validate($_POST['email']);
    $mobile_number = validate($_POST['mobile_number']);
    $address = validate($_POST['address']);
    $new_pass = validate($_POST['new_pass']);
 
        $sqlsign = "UPDATE customers SET username ='$username', email_address ='$email_address', password ='$new_pass', address ='$address', mobile_number ='$mobile_number' WHERE customer_id = '$customer_id'";
        $resultsign = $mysqli->query($sqlsign);

        if ($resultsign) {
            echo "successfully updated";
            exit();
        }else {
            echo "unsuccesfully updated";
            exit();
        }
}else {
    echo 'bobo';
}
