<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href="../css/bootstrap.min.css"/>
    <link rel = "stylesheet" href="../css/stylee.css"/>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

</head>
<body>
<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action="" method="" id="signup">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="user" placeholder="Username" >
					<input type="email" name="email" placeholder="Email" >
					<input type="password" name="password" placeholder="Password" >
					<input type="text" name="address" placeholder="Address" >
					<input type="text" name="number" placeholder="Mobile Number" >
					<button type="button" id="signup_btn">Sign up</button>
				</form>
			</div>

			<div class="login">
				<form action="login.php" method="POST">
					<label for="chk" aria-hidden="true">Login</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="" >
					<input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
					<button input type="submit" name="submit" class="btn submit-btnn" >Login</button>
				</form>
			</div>

	</div>

	<script src="../js/signup-function.js"></script>
</body>
</html>