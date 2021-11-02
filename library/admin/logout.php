    <?php
    session_start();
    if(isset($_SESSION['student'])){
        unset($_SESSION['student']);
    }
    header("location:http://localhost/library/index.php");
?>