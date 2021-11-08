<?php 
	include "connection.php";

    $id = $_GET['identifier'];
    $query = "DELETE FROM buy WHERE rid='$id'";

    $data=mysqli_query($db, $query);
    if($data){
        ?>
        <script type="text/javascript">
            alert("The request was deleted!");
            window.location="request.php"
        </script>
        <?php
    }
    else{
        ?>
        <script type="text/javascript">
            alert("An error has occured while trying to delete the request!");
            window.location="request.php"
        </script>
        <?php
    }

?>