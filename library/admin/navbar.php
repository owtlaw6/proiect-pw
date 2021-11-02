<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial scale=1">
	<title>
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<!--<style type="text/css">
        nav{
		    float:  right;
		    word-spacing: 30px;
		}
		nav li{
		    display: inline-block;
		    line-height: 50px;
		}
    </style>-->
</head>
<body>

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


          <?php
            if(isset($_SESSION['student']))
            {?>
                <ul class="nav navbar-nav">
                  <li><a style="color:lightgray; font-family: Lucida Handwriting;" href="allstudents.php">Students-List</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="profile.php">
                    <div style="color: lightgray;">
                      <?php
                        echo "<img class='img-circle profile_img' height=20 width=20 src='images/".$_SESSION['picture']."'>";
                        echo " ".$_SESSION['student']; 
                      ?>
                    </div>
                  </a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> Logout</span></a></li>
                </ul>
              <?php
            }
            else
            {?>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="admin.php"><span class="glyphicon glyphicon-log-in"> Login</span></a></li>
                <li><a href="registration.php"><span class="glyphicon glyphicon-user"> Registration</span></a></li>
              </ul>
                <?php
            }
          ?>

      </div>
    </nav>

</body>
</html>