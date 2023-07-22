<?php
    //Authorization - Access control
    //Check whether the user is logged in or not
    if(!isset($_SESSION['user'])){
        $_SESSION['no-login-message'] = "<p class='title fst-italic'>Please log in to access Admin Panel</p>";
        //Redirect to login page
        header('location:'.$url.'admin/login.php');
    }
?>