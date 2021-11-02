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
		Registration
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
					<p style="text-align:center; font-size: 25px;"> Hello there! </p>
					<p style="text-align:center; font-size: 20px;"> Registration Form</p> 
					<form name="sregistration" action="" method="post">
						<b><p style="padding-left: 70px;font-size: 15px; font-weight: 100; color: black;">Role:</p>
                    <input style="margin-left: 0px; width=20px; color: black;" type="radio" name="user" id="admin" value="admin">
                    <label for="admin" style=" color: black;" >Admin</label>
                    <input style=" margin-left: 0px; width=20px  color: black;;" type="radio" name="user" checked="checked" id="student" value="student">
                    <label for="client" style="color: black;" >Student</label>
						<div class="std-login">
							<input class="form-control" type="text" name="names" placeholder="First and Last Name" required="">
							<input class="form-control" type="text" name="email" placeholder="Email" required="">
							<input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
							<input class="btn btn-default" type="submit" name="submit" value="Register" style="color: black; width: 80px; height: 35px">
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
        if($_POST['user']=='admin')
        {
          $count=0;
          $sql="SELECT email from admin";
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
            mysqli_query($db,"INSERT INTO ADMIN VALUES('', '$_POST[names]', '$_POST[email]', '$_POST[password]', 'profilepicture.jpg');");
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
                alert("The email already exists.");
              </script>
            <?php

          }
        }
        else if($_POST['user']=='student'){
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
          mysqli_query($db,"INSERT INTO student VALUES('$_POST[names]', '$_POST[email]', '$_POST[password]', 'profilepicture.jpg');");
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
              alert("The email already exists.");
            </script>
          <?php

        }

      }
      else {
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