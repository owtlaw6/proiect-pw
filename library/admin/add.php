<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Books</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">
            section{
                margin-top: -20px;
            }
            .searchClass{
                float: right;
            }
            h2{
                height: 50px;
                padding-top: 10px;
                padding-left: 10px;
            }
            .sidenav {
			  height: 100%;
			  width: 0;
			  position: fixed;
			  z-index: 1;
			  top: 0;
			  left: 0;
			  background-color: #111;
			  overflow-x: hidden;
			  transition: 0.5s;
			  padding-top: 60px;
			}

			.sidenav a {
			  padding: 8px 8px 8px 32px;
			  text-decoration: none;
			  font-size: 25px;
			  color: #818181;
			  display: block;
			  transition: 0.3s;
			}

			.sidenav a:hover {
			  color: #f1f1f1;
			}

			.sidenav .closebtn {
			  position: absolute;
			  top: 0;
			  right: 25px;
			  font-size: 36px;
			  margin-left: 50px;
			}

			#main {
			  transition: margin-left .5s;
			  padding: 16px;
			}

			@media screen and (max-height: 450px) {
			  .sidenav {padding-top: 15px;}
			  .sidenav a {font-size: 18px;}
			}
			.book{
				width: 400px;
				margin: 0px auto;

			}
        </style>


</head>

<body>

	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <div style="color: lightgray; font-family: Lucida Handwriting; margin-left: 30px;">
	      <?php
	      	if(isset($_SESSION['student'])) {
	        echo "<img class='img-circle profile_img' height=60 width=60 src='images/".$_SESSION['picture']."'>";
	        echo " ".$_SESSION['student']; 
	    	}
	      ?>
	    </div>
	  <a href="add.php">Add Books</a>
	  <a href="request.php">Book Requests</a>
	</div>

	<div id="main">
	  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
	  <div class="container">
	  	<h2 style="color: black; font-family: Lucida Handwriting; text-align: center;">Add New Books</h2> 

	  	<form class="book" action="" method="post">
	  		<input type="text" name="bookid" class="form-control" placeholder="Book ID" required="">
	  		<input type="text" name="description" class="form-control" placeholder="Description" required="">
	  		<input type="text" name="autor" class="form-control" placeholder="Author" required="">
	  		<input type="text" name="editura" class="form-control" placeholder="Editura" required="">
	  		<input type="text" name="pages" class="form-control" placeholder="Pages no" required="">
	  		<input type="text" name="price" class="form-control" placeholder="Price" required="">
	  		<input type="text" name="name" class="form-control" placeholder="Name" required="">
	  		<br>
	  		<button class="btn btn-default" type="submit" name="submit">Add</button>
	  	</form>
	  </div>

	<?php
    if(isset($_POST['submit']))
    {
      if(isset($_SESSION['student']))
      {
        mysqli_query($db,"INSERT INTO books VALUES ('$_POST[bookid]', '$_POST[description]', '$_POST[autor]', '$_POST[editura]', '$_POST[pages]', '$_POST[price]', '$_POST[name]');");
        ?>
          <script type="text/javascript">
            alert("Book Added! :3");
          </script>

        <?php

      }
      else
      {
        ?>
          <script type="text/javascript">
            alert("You need to login first!");
          </script>
        <?php
      }
    }
?>
	</div>

	<script>
	function openNav() {
	  document.getElementById("mySidenav").style.width = "250px";
	  document.getElementById("main").style.marginLeft = "250px";
	  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
	}

	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	  document.getElementById("main").style.marginLeft= "0";
	  document.body.style.backgroundColor = "white";
	}
	</script>
</body>
</html>