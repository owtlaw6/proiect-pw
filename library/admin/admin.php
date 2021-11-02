<?php
	include "connection.php";
	include "navbar.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial scale=1">
	<title>
		Admin Login
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<style type="text/css">
    section{
      margin-top: -20px;
    }
  </style>   

</head>
<body>
	<section>
		<div class="login-image">
				<br><br><br>
				<div class="box-student"> <br>
					<p style="text-align:center; font-size: 25px;"> Hello there! </p>
					<p style="text-align:center; font-size: 20px;"> Admin Login </p>
					<form name="slogin" action="" method="post">
						<div class="std-login">
							<input class="form-control" type="text" name="email" placeholder="Email" required=""> <br>
							<input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
							<input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 60px; height: 30px">
						</div>
						
						<p style="padding-left: 80px;">
							<br>
							<a style="color: black;" href="updatepass.php">Forgot Password?</a> <br> <br>
							Want to become a member? <a style="color:black;" href="registration.php">Sign Up</a>
						</p>
					</form>
				</div>
			</div>
	</section>
	<footer>
		<style type="text/css">
			footer{ 
			    height: 75px; 
			    width: 100%;
			    background-color: #422727; 
			}
		</style>
	</footer>

	<?php

		if(isset($_POST['submit'])){
            $count=0;
            $res = mysqli_query($db, "SELECT * FROM admin WHERE email='$_POST[email]' AND password='$_POST[password]' ;");
            $row=mysqli_fetch_assoc($res);
            $count=mysqli_num_rows($res);
            if($count==0){
                ?>
                <script type="text/javascript">
                    alert("Wrong password for this email !");
                    </script>

                <?php
            }
            else{
            	$_SESSION['student'] = $_POST['email'];
            	$_SESSION['picture'] = $row['picture'];
              ?>
                  <script type="text/javascript">
                  window.location="index.php";
                  </script>
              <?php
            }

        }


	?>

</body>
</html>