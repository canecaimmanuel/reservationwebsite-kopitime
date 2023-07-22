<?php

    include('../config/constant.php');

    //1. Get the ID of Admin to be deleted
    $id = $_GET['id'];

    //2. Create SQL Query to Delete Admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute the Query 
    $res = mysqli_query($conn, $sql);

    if($conn->query($sql)){
        // echo "Admin deleted successfully!";
        $_SESSION['delete'] = "Admin deleted successfully";
        header("location:".$url.'admin/manage_admin.php');
    }else{
        // echo "Failed to delete admin.";
        $_SESSION['delete'] = "Failed to delete admin.";
        header("location:".$url.'admin/manage_admin.php');
    }


?>