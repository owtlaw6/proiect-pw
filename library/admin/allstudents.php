<?php
    include "navbar.php";
    include "connection.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Students List
        </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
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
            echo "<img class='img-circle profile_img' height=60 width=60 src='images/".$_SESSION['picture']."'>";
            echo " ".$_SESSION['student']; 
          ?>
        </div>
      <a href="index.php">Home</a>
      <a href="books.php">Books</a>
      <a href="allstudents.php">Students-List</a>
      <a href="feedback.php">Feedback</a>
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
        <div class="searchClass">
            <form class="navbar-form" method="post" name="navbarForm">
                <input class="form-control" type="text" name="searchBar" placeholder="enter email..." required="">
                <button style="background-color: #1FC58E;" type="submit" name="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </form>
        </div>
        <h2 style="color:lightgray; font-family: Lucida Handwriting; font-size: 45px; text-align: center;">Students List</h2>

        <?php
            if(isset($_POST['submit'])){
                $query=mysqli_query($db, "SELECT names, email from student WHERE email like '%$_POST[searchBar]%' ");
                if(mysqli_num_rows($query)==0){
                    echo "Unfortunately, no emails were found with the given email! :c";
                }
                else{
                    echo "<table class='table table-bordered table-hover'>";
                    echo "<tr style='background-color: #1FC58E; color: white;'>";
                    echo "<th>"; echo "Names"; echo "</th>";
                    echo "<th>"; echo "Email"; echo "</th>";
                    echo "</tr>";
                    while($row=mysqli_fetch_assoc($query)){
                        echo "<tr>";
                        echo "<td>"; echo $row['names']; echo "</td>";
                        echo "<td>"; echo $row['email']; echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }
            else{  
                $res=mysqli_query($db, "SELECT names, email from student ORDER BY `student`.`names` ASC;");
                echo "<table class='table table-bordered table-hover'>";
                echo "<tr style='background-color: white; color: black;'>";
                echo "<th>"; echo "Names"; echo "</th>";
                echo "<th>"; echo "Email"; echo "</th>";
                echo "</tr>";
                while($row=mysqli_fetch_assoc($res)){  //get rows from table
                    echo "<tr>";
                    echo "<td>"; echo $row['names']; echo "</td>";
                    echo "<td>"; echo $row['email']; echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        ?>
    </body>
</html>