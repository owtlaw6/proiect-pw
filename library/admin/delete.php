<?php 
	include "connection.php";

    $id = $_GET['identifier'];
    $query = "DELETE FROM books WHERE bookid='$id'";

    $data=mysqli_query($db, $query);
    if($data){
        ?>
        <script type="text/javascript">
            alert("The book was deleted!");
            window.location="books.php"
        </script>
        <?php
    }
    else{
        ?>
        <script type="text/javascript">
            alert("An error has occured while trying to delete the book!");
            window.location="book.php"
        </script>
        <?php
    }

?>