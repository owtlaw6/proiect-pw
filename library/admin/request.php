<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Book Request</title>
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

	<div class="container">

	<h3 style="text-align: center;">Request for Books</h3>
	<?php 
		if(isset($_SESSION['student'])){
			$res=mysqli_query($db, "select student.email,books.bookid,name,autor,editura from student inner join buy on student.email=buy.email inner join books on buy.bookid=books.bookid where buy.approve='' ;");
			if(mysqli_num_rows($res)==0){
				echo "<h2>";
                echo "No pending requests!";
                echo "</h2>";
            }
            else{
            	echo "<table class='table table-bordered table-hover' >";
					echo "<tr style='background-color: white;'>";
					echo "<th>"; echo "Student Email";	echo "</th>";
					echo "<th>"; echo "Book ID";  echo "</th>";
					echo "<th>"; echo "Book Name";  echo "</th>";
					echo "<th>"; echo "Author Name";  echo "</th>";
					echo "<th>"; echo "Editura";  echo "</th>";
					echo "</tr>";	
                    
                    while($row=mysqli_fetch_assoc($res)){ 
                        echo "<tr>";
						echo "<td>"; echo $row['email']; echo "</td>";
						echo "<td>"; echo $row['bookid']; echo "</td>";
						echo "<td>"; echo $row['name']; echo "</td>";
						echo "<td>"; echo $row['autor']; echo "</td>";
						echo "<td>"; echo $row['editura']; echo "</td>";

						echo "</tr>";
                    }
                    echo "</table>";
            }
            
		}
		else
		{
			?>
			<br>
				<h3 style="text-align: center;">You need to login first!</h3>
				
			<?php
		}

		if(isset($_POST['submit']))
		{
			$_SESSION['email']=$_POST['email'];
			$_SESSION['bookid']=$_POST['bookid'];

			?>
				<script type="text/javascript">
					window.location="approve.php"
				</script>
			<?php
		}

		?>

    </div>
</div>
	
</body>
</html>