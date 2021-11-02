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
		Student Registration
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
	<!--
	<nav class="navbar navbar-inverse">
      <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand active">ONLINE LIBRARY</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a style="color:lightgray; font-family: Lucida Handwriting;" href="index.php">Home</a></li>
            <li><a style="color:lightgray; font-family: Lucida Handwriting;" href="books.php">Books</a></li>
            <li><a style="color:lightgray; font-family: Lucida Handwriting;" href="feedback.php">Feedback</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">

            <li><a href="student.html"><span class="glyphicon glyphicon-log-in"> Login</span></a></li>
            <li><a href="student.html"><span class="glyphicon glyphicon-log-out"> Logout</span></a></li>
            <li><a href="registration.html"><span class="glyphicon glyphicon-user"> Register</span></a></li>
          </ul>

      </div>
    </nav>
-->
<!--
	<header>
		<div class="logo">
				<img src="images/cartelatitlu.png">
				<hl style="color:lightgray; font-family: Lucida Handwriting;">ONLINE LIBRARY</hl> 
			</div>

			<nav>
				<ul>
					<li><a style="color:lightgray;" href="index.php">Home</a></li>
					<li><a style="color:lightgray;" href="books.php">Books</a></li>
					<li><a style="color:lightgray;" href="student.php">Student-Login</a></li>
					<li><a style="color:lightgray;" href="admin.php">Admin-Login</a></li>
					<li><a style="color:lightgray;" href="feedback.php">Feedback &nbsp</a></li>
				</ul>
			</nav>
	</header>
-->
	<section>
		<div class="login-image">
				<br><br><br>
				<div class="box-student"> <br>
					<p style="text-align:center; font-size: 25px;"> Hello there! </p>
					<p style="text-align:center; font-size: 20px;"> Student Registration Form</p> <br>
					<form name="sregistration" action="" method="post">
						<div class="std-login">
							<input class="form-control" type="text" name="names" placeholder="First and Last Name" required=""> <br>
							<input class="form-control" type="text" name="email" placeholder="Email" required=""> <br>
							<input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
							<input class="btn btn-default" type="submit" name="submit" value="Register" style="color: black; width: 80px; height: 40px">
						</div>
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
        $count=0;
        $sql="SELECT email from student";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['email']==$_POST['email'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          mysqli_query($db,"INSERT INTO STUDENT VALUES('$_POST[names]', '$_POST[email]', '$_POST[password]', 'profilepicture.jpg');");
        ?>
          <script type="text/javascript">
           alert("Registration successful");
          </script>
        <?php
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("The email already exist.");
            </script>
          <?php

        }

      }

	?>

</body>
</html>