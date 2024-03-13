<?php 

session_start();

require_once("../conn.php");
if (isset($_POST['user']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['address']) && isset($_POST['number'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $user = validate($_POST['user']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $address = validate($_POST['address']);
    $number = validate($_POST['number']);

    $emailchecker = "SELECT * FROM customers WHERE email_address ='" . $email . "'";
    $emailresult = $mysqli->query($emailchecker);

    $userchecker = "SELECT * FROM customers WHERE username ='" . $user . "'";
    $userresult = $mysqli->query($userchecker);

    if ($emailresult->num_rows > 0) {
        echo "Email address is already taken";
        exit();
        
    } else if ($userresult->num_rows > 0) {
        echo "Username is already taken";
        exit();

    } else {
        // $sqlsign = "INSERT INTO customers (username, email_address, password, address, mobile_number) VALUES ('$user','$email','$password', '$address', '$number')";
        

        $sqlsign = "
        CALL insert_new_user('". $user ."',
						'". $email ."',
						'". $password ."',
						'". $address ."',
						'". $number ."')";
        
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

?>

<link rel="stylesheet" href="../conn.php">