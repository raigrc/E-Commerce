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
    
    $username = validate($_POST['username']);
    $email_address = validate($_POST['email_address']);
    $password = validate($_POST['password']);
    $address = validate($_POST['address']);
    $number = validate($_POST['number']);

    $emailchecker = "SELECT * FROM customers WHERE email_address ='" . $email_address . "'";
    $emailresult = $mysqli->query($emailchecker);

    $userchecker = "SELECT * FROM customers WHERE username ='" . $username . "'";
    $userresult = $mysqli->query($userchecker);

    if ($emailresult->num_rows > 0) {
        echo "Email address is already taken";
        exit();
        
    } else if ($userresult->num_rows > 0) {
        echo "Username is already taken";
        exit();

    } else {
        $sqlsign = "INSERT INTO customers (username, email_address, password, address, mobile_number) VALUES ('$username','$email_address','$password', '$address', '$number')";
        $resultsign = $mysqli->query($sqlsign);

        if ($resultsign) {
            echo "successfully inserted";
            exit();
        }else {
            echo "unsuccesfully inserted";
            exit();
        }
    }
}
