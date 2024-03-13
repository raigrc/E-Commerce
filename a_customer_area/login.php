<?php
	session_start();

	require_once'../conn.php';
    //if(isset($_POST['login'])){
    if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM customers WHERE username='" . $username . "' AND password='" . $password . "'";
    $result = $mysqli->query($sql);

    if ($result->num_rows) {

        $user = mysqli_fetch_assoc($result);

        $_SESSION['customer_id'] = $user['customer_id'];
        $_SESSION['user'] = $username;
        $_SESSION['email'] = $user['email_address'];
        echo "<script>window.location='../index.php'</script>";
    }else{
        echo "<script>alert('Invalid Username or Password')</script>";
        echo "<script>window.location='../index.php'</script>";
    }
        $result->free_result();
        $mysqli->close();
    }
?>