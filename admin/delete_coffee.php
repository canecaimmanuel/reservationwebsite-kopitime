<?php

    include('../config/constant.php');

    //Check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name'])){

        //Get the value and Delete
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        // Remove the physical image file is available
        if($image_name != ""){

            $path = "../images/coffee/".$image_name;
            //Remove the image
            $remove = unlink($path);

            //If failed to remove image then add an error message and stop the process
            if($remove == false){

                 //Set the session message
                $_SESSION['remove'] = "<div class='title fst-italic'>Failed to remove image.</div>";
  
                //Redirect to manage category page
                header("location:".$url.'admin/manage_coffee.php');

                //stop the process
                die();
            }
        }
        // Delete data from database 
        $sql = "DELETE FROM tbl_coffee WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        //Check whether the data is delete from database or not
        if($res == false){
              //set fail message and redirect
              $_SESSION['delete'] = "<div class='title fst-italic'>Failed to delete.</div>";
              header("location:".$url.'admin/manage_coffee.php');
         
        }
             //set success message and redirect
             $_SESSION['delete'] = "<div class='title fst-italic'>Deleted successfully.</div>";
             header("location:".$url.'admin/manage_coffee.php');
    }else{

        $_SESSION['unauthorized'] = "<div class='title fst-italic'>Unauthorized access.</div>";
        header("location:".$url.'admin/manage_coffee.php');
    }

    

    
?>