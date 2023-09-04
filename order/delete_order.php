<?php

    include('../config/constant.php');

    //1. Get the ID of Admin to be deleted
    $id = $_GET['id'];

    //2. Create SQL Query to Delete Admin
    $sql = "DELETE FROM tbl_order WHERE id=$id";

    //Execute the Query 
    $res = mysqli_query($conn, $sql);

    if($conn->query($sql)){
        // echo "Admin deleted successfully!";
        $_SESSION['delete'] = "<div class='fst-italic title'>Order deleted successfully</div>";
        header("location:".$url.'order/manage_order.php');
    }else{
        // echo "Failed to delete admin.";
        $_SESSION['delete'] = "<div class='fst-italic title'>Failed to delete admin</div>";
        header("location:".$url.'order/manage_order.php');
    }


?>