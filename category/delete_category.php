<?php

    include('../config/constant.php');

    //Check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name'])){

        //Get the value and Delete
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        // Remove the physical image file is available
        if($image_name !== ""){

            $path = "../images/category/".$image_name;
            //Remove the image
            $remove = unlink($path);

            //If failed to remove image then add an error message and stop the process
            if($remove == false){

                 //Set the session message
                $_SESSION['remove'] = "<div class='title fst-italic'>Failed to remove category image.</div>";
  
                //Redirect to manage category page
                header("location:".$url.'category/manage_category.php');

                //stop the process
                die();
            }
        }
        // Delete data from database 
        $sql = "DELETE FROM tbl_category WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        //Check whether the data is delete from database or not
        if($res == true){

            //set success message and redirect
            $_SESSION['delete'] = "<div class='title fst-italic'>Category Deleted successfully.</div>";
            header("location:".$url.'category/manage_category.php');
        }
            //set fail message and redirect
            $_SESSION['delete'] = "<div class='title fst-italic'>Failed to delete category.</div>";
            header("location:".$url.'category/manage_category.php');
    }else{

        // $_SESSION['delete'] = "<div class='title fst-italic'>Failed to delete category.</div>";
        header("location:".$url.'category/manage_category.php');
    }

    

    
?>