<?php
	session_start();

	require_once'conn.php';
    //if(isset($_POST['login'])){
    if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE admin_username='" . $username . "' AND admin_password='" . $password . "'";
    $result = $mysqli->query($sql);

    if ($result->num_rows) {
        $admin = mysqli_fetch_assoc($result);

        $_SESSION['admin_name'] = $username;
        $_SESSION['admin_email'] = $admin['admin_email_address'];
        $_SESSION['admin_pwd'] = $admin['admin_password'];
        $_SESSION['admin_id'] = $admin['admin_id'];
        
        echo "<script>window.location='./admin-dashboard.php'</script>";
    }else{
        echo "<script>alert('Invalid Username or Password')</script>";
        echo "<script>window.location='./admin-login-page.php'</script>";
    }
        $result->free_result();
        $mysqli->close();
    }
?>

<link rel="stylesheet" href="./admin-dashboard.php">