<?php 
    include "connection.php";

    $id = $_GET['identifier'];
    $query = "UPDATE buy SET approve='done' WHERE rid='$id'";

    $data=mysqli_query($db, $query);
    if($data){
        ?>
        <script type="text/javascript">
            alert("The request was approved!");
            window.location="request.php"
        </script>
        <?php
    }
    else{
        ?>
        <script type="text/javascript">
            alert("An error has occured while trying to approve the request!");
            window.location="request.php"
        </script>
        <?php
    }

?>