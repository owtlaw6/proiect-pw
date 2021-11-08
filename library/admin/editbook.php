<?php
    include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
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

    <h2 style="text-align: center;color: #fff;">Edit Book</h2>
    <?php

        $id = $_GET['identifier'];
        $query = "SELECT * FROM books WHERE bookid='$id'";

        $result=mysqli_query($db, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $name=$row['name'];
            $description=$row['description'];
            $autor=$row['autor'];
            $editura=$row['editura'];
            $pages=$row['pages'];
            $price=$row['price'];
        }
    ?>
    
    <div class="form1">
        <form action="" method="post" enctype="multipart/form-data">
            <br>
        <label><h4><b>Name: </b></h4></label>
        <input class="form-control" type="text" name="name" value="<?php echo $name; ?>">

        <label><h4><b>Description: </b></h4></label>
        <input class="form-control" type="text" name="description" value="<?php echo $description; ?>">

        <label><h4><b>Author: </b></h4></label>
        <input class="form-control" type="text" name="autor" value="<?php echo $autor; ?>">

        <label><h4><b>Editura: </b></h4></label>
        <input class="form-control" type="text" name="editura" value="<?php echo $editura; ?>">

        <label><h4><b>Pages: </b></h4></label>
        <input class="form-control" type="text" name="pages" value="<?php echo $pages; ?>">

        <label><h4><b>Price: </b></h4></label>
        <input class="form-control" type="text" name="price" value="<?php echo $price; ?>">

        <br><br><br>
        <div style="padding-left: 100px;">
            <button class="btn btn-default" type="submit" name="submit">save</button></div>
        <br><br><br><br>
    </form>
</div>
    <?php 

        if(isset($_POST['submit'])){

            $name=$_POST['name'];
            $description=$_POST['description'];
            $autor=$_POST['autor'];
            $editura=$_POST['editura'];
            $pages=$_POST['pages'];
            $price=$_POST['price'];

            $sql1= "UPDATE books SET name='$name', description='$description', autor='$autor', editura='$editura', pages='$pages', price='$price' WHERE bookid='$id';";

            if(mysqli_query($db,$sql1)){
                ?>
                    <script type="text/javascript">
                        alert("Saved Successfully.");
                        window.location="books.php";
                    </script>
                <?php
            }
        }
     ?>
</body>
</html>