<?php
    session_start();
    unset($_SESSION['is_logged_in']);
    unset($_SESSION['user_data']);
    session_destroy();
    //Redirect
    echo "<script>location.href='index.php';</script>";
        
?>