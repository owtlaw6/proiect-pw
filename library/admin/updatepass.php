<?php 
	include "connection.php";
 	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Password</title>
	<style type="text/css">
		body{
			width: 1280;
			height: 400px;
			background-color: #422727;
			background-image: url(images/forgot.jpg);
			color: #422727;
			/*padding: 27px 15px;*/

		}
		.wrapper{
			width: 550px;
			height: 400px;
			margin: 0px auto;
			background-color: #8E8E8E;
			opacity: .9;
			padding: 20px 10px;

		}
	</style>
</head>
<body>
	<div class="wrapper">
		<div style="text-align: center; font-family: Lucida Handwriting; font-weight: bold;">
			<hl style="font-size: 20px;"> Admin Login </hl> <br>
			<hl style="font-size: 20px;"> Change Password </hl>
		</div>
		<form action="" method="post"> <br><br>
			<input style="background-color: lightgray; width: 300px; margin-left: 110px;" type="text" name="email" class="form-control" placeholder="Email" required=""> <br>
			<input style="background-color: lightgray; width: 300px; margin-left: 110px;" type="password" name="password" class="form-control" placeholder="New Password" required=""> <br>
			<button style="background-color: lightgray; margin-left: 330px; margin-top: 30px;" class="btn btn-default" type="submit" name="submit">Update</button>
		</form>
	</div>

	<?php
		if(isset($_POST['submit'])){
			$query=mysqli_query($db, "SELECT * FROM `admin` WHERE email='$_POST[email]' ");
			if(mysqli_num_rows($query)>0){
				$sth=mysqli_query($db, "UPDATE admin set password='$_POST[password]' where email='$_POST[email]';")
				?>
					<script type="text/javascript"> alert("Password Updated"); </script>
				<?php
			}
			else {
				?>
					<script type="text/javascript"> alert("The username does not exist :c"); </script>
				<?php
			}
		}
	?>
</body>
</html>