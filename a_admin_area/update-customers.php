<?php 

session_start();

require_once("conn.php");

if (isset($_POST['username']) && isset($_POST['email_address']) && isset($_POST['password']) && isset($_POST['address']) && isset($_POST['number'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $customer_id = validate($_POST['customer_id']);
    $username = validate($_POST['username']);
    $email_address = validate($_POST['email_address']);
    $password = validate($_POST['password']);
    $address = validate($_POST['address']);
    $number = validate($_POST['number']);
 
        $sqlsign = "UPDATE customers SET username ='$username', email_address ='$email_address', password ='$password', address ='$address', mobile_number ='$number' WHERE customer_id = '$customer_id'";
        $resultsign = $mysqli->query($sqlsign);

        if ($resultsign) {
            echo "successfully updated";
            exit();
        }else {
            echo "unsuccesfully updated";
            exit();
        }
}
