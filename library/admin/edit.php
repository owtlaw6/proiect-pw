<?php
    include "navbar.php";
    include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <style type="text/css">
        .form-control{
            width:250px;
            height: 38px;
        }
        .form1{
            margin:0 540px;
        }
        label{
            color: white;
        }

    </style>
</head>
<body style="background-color: #422727;">

    <h2 style="text-align: center;color: #fff;">Edit Info</h2>
    <?php
        $sql = "SELECT * FROM admin WHERE email='$_SESSION[student]'";
        $result = mysqli_query($db,$sql) or die (mysql_error());

        while ($row = mysqli_fetch_assoc($result)) {
            $names=$row['names'];
            $email=$row['email'];
            $password=$row['password'];
        }

    ?>

    <div class="profile_info" style="text-align: center;">
        <span style="color: white;">Welcome,</span>    
        <h4 style="color: white;"><?php echo $_SESSION['student']; ?></h4>
    </div><br><br>
    
    <div class="form1">
        <form action="" method="post" enctype="multipart/form-data">

        <input class="form-control" type="file" name="file">

        <label><h4><b>Names: </b></h4></label>
        <input class="form-control" type="text" name="names" value="<?php echo $names; ?>">

        <label><h4><b>Email</b></h4></label>
        <input class="form-control" type="text" name="email" value="<?php echo $email; ?>">

        <label><h4><b>Password</b></h4></label>
        <input class="form-control" type="text" name="password" value="<?php echo $password; ?>">

        <br>
        <div style="padding-left: 100px;">
            <button class="btn btn-default" type="submit" name="submit">save</button></div>
    </form>
</div>
    <?php 

        if(isset($_POST['submit'])){
            move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);

            $names=$_POST['names'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $picture=$_FILES['file']['name'];
            $sql1= "UPDATE admin SET picture='$picture', names='$names', email='$email', password='$password' WHERE email='".$_SESSION['student']."';";

            if(mysqli_query($db,$sql1)){
                ?>
                    <script type="text/javascript">
                        alert("Saved Successfully.");
                        window.location="profile.php";
                    </script>
                <?php
            }
        }
     ?>
</body>
</html>