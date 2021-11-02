<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial scale=1">
	<title>
		Librarie Online
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<style type="text/css">
        nav{
		    float:  right;
		    word-spacing: 30px;
		}
		nav li{
		    display: inline-block;
		    line-height: 50px;
		}
    </style>

</head>

<body>
	<div class="wrapper">
		<header>
			<div class="logo">
				<img src="images/cartelatitlu.png">
				<!--- <br> --->
				<hl style="color:lightgray; font-family: Lucida Handwriting;">ONLINE BOOKSHOP</hl> 
			</div>


			<?php
                if(isset($_SESSION['student'])){       //if someone has logged in
                ?>
                    <nav>
                        <ul>
                            <li><a href="index.php"> Home</a></li>
							<li><a href="books.php"> Books</a></li>
							<li><a href="profile.php"> Profile</a></li>
							<li><a href="logout.php">Logout</a></li>
							<li><a href="feedback.php">Feedback &nbsp</a></li>
                        </ul>
                    </nav>
                <?php
                }
                else{
                ?>
                    <nav>
                        <ul>
                            <li><a href="index.php"> Home</a></li>
							<li><a href="books.php"> Books</a></li>
							<li><a href="http://localhost/library/login.php"> Login</a></li>
							<li><a href="feedback.php">Feedback &nbsp</a></li>
                        </ul>
                    </nav>
                <?php
                }
                ?>
                
            <!--
			<nav>
				<ul>
					<li><a href="index.php"> Home</a></li>
					<li><a href="books.php"> Books</a></li>
					<li><a href="student.php"> Student-Login</a></li>
					<li><a href="admin.php">Admin-Login</a></li>
					<li><a href="feedback.php">Feedback &nbsp</a></li>
				</ul>
			</nav>
			-->

		</header>
		<section>
			<div class="sec_img">
				<br><br><br>
				<div class="box">
					<p style="text-align:center; font-size: 25px;"> Hello people, I am happy to see you here! </p> <br>
					<p style="text-align:center; font-size: 20px;"> opens at 09;00 </p> <br>
					<p style="text-align:center; font-size: 15px;"> closes at 22;00 </p> <br>
				</div>
			</div>
		</section>
		<?php
			include "footer.php";
		?>
	</div>
</body>

</html>