<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Profile</title>
  <style type="text/css">
    .wrapper{
      width: 400px;
      height: 450px;
      margin: 0 auto;
      background-color: #FEFEC6 ;
      color: #422727;
      font-family: Lucida Handwriting;
    }
  </style>
</head>
<body style="background-color: #422727;">
  <div class="container">
    <form action="" method="post" >
      <button class="btn btn-default" style="float: right; width: 90px;" name="submit1">
        Edit
      </button>
    </form>
    <div class="wrapper">
      <?php
        if(isset($_POST['submit1'])){
              ?>
              <script type="text/javascript">
                window.location="edit.php"
              </script>
              <?php
          }
        $q=mysqli_query($db, "SELECT * FROM student where email='$_SESSION[student]' ;");
      ?>
      <h2 style="text-align: center; font-size: 35px; padding-top: 10px;">My Profile</h2>
      <?php
        $row=mysqli_fetch_assoc($q);
        echo "<div style='text-align: center'>
          <img class='img-circle profile_img' height=80 width=80 src='images/".$_SESSION['picture']."'>
        </div>";
      ?>
      <div style="text-align: center;">Welcome
        <h4>
          <?php
            echo $_SESSION['student'];
          ?>
        </h4>
      </div>
      <br><br>
      <?php
        echo "<table class='table table-bordered'>";
          echo "<tr>"; 
            echo "<td>"; 
              echo "<b> Name: </b>";  
            echo "</td>"; 
            echo "<td>"; 
              echo $row['names']; 
            echo "</td>"; 
          echo "</tr>";

          echo "<tr>"; 
            echo "<td>"; 
              echo "<b> Email: </b>"; 
            echo "</td>"; 
            echo "<td>"; 
              echo $row['email']; 
            echo "</td>"; 
          echo "</tr>";
          /*
          echo "<tr>"; 
            echo "<td>"; 
              echo "<b> Password: </b>"; 
            echo "</td>"; 
            echo "<td>"; 
              echo $row['password']; 
            echo "</td>"; 
          echo "</tr>";
          */
        echo "</table>";
      ?>
    </div>
  </div>
</body>
</html>