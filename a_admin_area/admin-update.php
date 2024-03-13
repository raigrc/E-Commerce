<?php 
	session_start();

	require_once'conn.php';

    if (isset($_POST['admin_update'])) {
		$admin_user = $_POST['admin_name'];
		$admin_email = $_POST['admin_email'];
		$admin_pwd = $_POST['admin_password'];
		$admin_id = $_SESSION['admin_id'];

		$admin_update = "UPDATE `admin` SET `admin_username`='".$admin_user."',`admin_email_address`='".$admin_email."',`admin_password`='".$admin_pwd."' WHERE admin_id =".$admin_id."";
		$admin_result = mysqli_query($mysqli, $admin_update);

		if ($admin_result) {
			echo "<script>alert('Successfully Updated')</script>";
			echo "<script>window.location='./setting.php'</script>";
		}
	}else {
		echo "failed to update";
	};

?>
