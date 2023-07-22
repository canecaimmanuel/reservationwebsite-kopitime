<?php

    include('../config/constant.php');
    //Destroy the session
    session_destroy();

    //redirect to login page
    header('location:'.$url.'admin/login.php');
?>