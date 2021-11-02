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
		Student Login
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
				<div class="box-student"> 
					<p style="text-align:center; font-size: 20px;"> Hello there! </p>
					<p style="text-align:center; font-size: 20px;"> Student Login </p>
					<form name="login" action="" method="post">
						<b><p style="padding-left: 70px;font-size: 15px; font-weight: 100; color: black;">Login as:</p>
                    <input style="margin-left: 0px; width=20px; color: black;" type="radio" name="user" id="admin" value="admin">
                    <label for="admin" style=" color: black;" >Admin</label>
                    <input style=" margin-left: 0px; width=20px; color: black;" type="radio" name="user" checked="checked" id="student" value="student">
                    <label for="student" style="color: black;" >Student</label>
						<div class="std-login">
							<input class="form-control" type="text" name="email" placeholder="Email" required="">
							<input class="form-control" type="password" name="password" placeholder="Password" required=""> 
							<input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 60px; height: 30px">
						</div>
					
						<p style="padding-left: 80px;">
							<br>
							<a style="color: black;" href="updatepass.php">Forgot Password?</a> <br>
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
        if(isset($_POST['submit']))
        {
            if($_POST['user']=='admin')
            {
                $count=0;
            $res = mysqli_query($db, "SELECT * FROM `admin` WHERE email='$_POST[email]' AND password='$_POST[password]' ;");

            $row = mysqli_fetch_assoc($res);
            $count=mysqli_num_rows($res);

            if($count==0){
                ?>
                    <script type="text/javascript">
                    alert("Email and password don't match!");
                    </script> 
                
                <?php
            }
            else{
                /*------------------if username and pass matches-------------------*/
                $_SESSION['student'] = $_POST['email'];
                $_SESSION['picture'] = $row['picture'];
                ?>
                    <script type="text/javascript">
                    window.location="admin/index.php";
                    </script>
                <?php
            }
            }
            else if($_POST['user']=='student'){
            $count=0;
            $res = mysqli_query($db, "SELECT * FROM `student` WHERE email='$_POST[email]' AND password='$_POST[password]' ;");
            $row = mysqli_fetch_assoc($res);
            $count=mysqli_num_rows($res);
            if($count==0){
                ?>
                    <script type="text/javascript">
                    alert("Username and password don't match!");
                    </script> 
                <?php
            }
            else{
                $_SESSION['student'] = $_POST['email'];
                $_SESSION['picture'] = $row['picture'];
                ?>
                    <script type="text/javascript">
                    window.location="student/index.php";
                    </script>
                <?php
            }
            }
            else{
            	?>
                <script type="text/javascript">
               		alert("You must chose a role.");
                </script>
               <?php
            }

        }

    ?>

</body>
</html>