<?php 
    include('../admin/layout/nav.php')
?>

<div class="main-content">
    <div class="container">
        <div class="row">
            <h1 class="title mb-4">Update Category</h1>

            <?php
                if(isset($_GET['id'])){
                    //Get the Id and all other details
                    //echo "Getting the data.";
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM tbl_category WHERE id = $id";

                    $res = mysqli_query($conn, $sql);

                    $num_rows = mysqli_num_rows($res);

                    if($num_rows === 1){
                        // echo 'category found';
                        $row = mysqli_fetch_assoc($res);
                        $title = $row['title'];
                        $current_image = $row['image_name'];
                        $featured =$row['featured'];
                        $active = $row['active'];

                    }else {
                        $_SESSION['no-category-found'] = "<div class='title fst-italic'>Category not found</div>";
                         header('location:'.$url.'category/manage_category.php');
                    }

                } else {
                    header('location:'.$url.'category/manage_category.php');
                }
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl_admin mt-4">
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" class="form-control" name="title" Value="<?php echo $title ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Current Image: </td>
                        <td>
                            <?php if($current_image !== ""){
                                ?>
                            <img src="<?php echo $url; ?>images/category/<?php echo $current_image ?>" width="150px"
                                height="150px">
                            <?php
                            } else {
                                echo "<div class='title fst-italic'>Image Not Added</div>";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>New Image: </td>
                        <td>
                            <input type="file" class="form-control" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input <?php if($featured === "Yes"){echo "checked";} ?> type="radio" name="featured"
                                value="Yes"> Yes
                            <input <?php if($featured === "No"){echo "checked";} ?> type="radio" name="featured"
                                value="No"> No
                        </td>
                    </tr>
                    <tr>
                        <td>Active: </td>
                        <td>
                            <input <?php if($active === "Yes"){echo "checked";} ?> type="radio" name="active"
                                value="Yes"> Yes
                            <input <?php if($active === "No"){echo "checked";} ?> type="radio" name="active" value="No">
                            No
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input type="submit" class="btn btn-outline-success mt-3" name="submit" value="Update">
                        </td>
                    </tr>
                </table>
                <a href="<?php echo $url; ?>category/manage_category.php" class="btn btn-danger ms-1">Back</a>
            </form>

            <?php

                if(isset($_POST['submit'])){
                    // echo "Button Clicked";
                    //1.Get all the values from the form
                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $current_image = $_POST['current_image'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];

                    //2.Updating New Image if selected
                    if(isset($_FILES['image']['name'])){
                        $image_name = $_FILES['image']['name'];

                        //Check whether the image is available or not
                        if($image_name !== ""){
                            //Image available
                            // A) Upload the New Image

                            //Auto Rename our Image
                            //Get the Extension of our image (jpeg, jpg, png, gif, etc) e.g. "coffee1.jpg"
                            $result = explode('.', $image_name);
                            $ext = end($result);

                            //Rename the image 
                            $image_name = "Coffee_Category_".time().'.'.$ext; // e.g. Coffee_Category_834.jpg or use .rand(000, 999)


                            $source_path = $_FILES['image']['tmp_name'];
                            $destination_path = "../images/category/".$image_name;

                            //Finally Upload the image
                            $upload = move_uploaded_file($source_path, $destination_path);

                            //Check whether the image is uploaded or not
                            //And if the iamge is not uploaded then we will stop the process and redirect with error message
                            if($upload == false){
                                $_SESSION['upload'] = "<div class='title fst-italic'>Failed to upload image</div>";
                                header('location:'.$url.'category/manage_category.php');
                                die();
                            }

                            // B) Remove the current image if available
                            if($current_image != ""){
                                $remove_path = "../images/category/".$current_image;

                                $remove = unlink($remove_path);
    
                                //Check whether the image is removed or not
                                //If failed to remove then display message and stop the process
                                if($remove == false){
                                    $_SESSION['failed-remove'] = "<div class='title fst-italic'>Failed to remove current image</div>";
                                    // header('location:'.$url.'category/manage_category.php');
                                    echo "<script> window.location.href='manage_category.php';</script>";
                                    die(); // To stop the process
                                }
    
                            }
                           
                        } else {
                            $image_name = $current_image;
                        }

                    } else {
                        $image_name = $current_image;
                    }



                    //3.Update the Database
                    $sql2 = "UPDATE tbl_category SET
                            title = '$title',
                            image_name = '$image_name',
                            featured = '$featured',
                            active = '$active'
                            WHERE id = $id
                    ";

                    $request = mysqli_query($conn, $sql2);

                    //4.Redirect to manage_category
                    //check whether executed or not
                    if($request == true){
                        // Category updated
                        $_SESSION['update'] = "<div class='title fst-italic'>Category updated successfully.</div>";
                        // header('location:'.$url.'category/manage_category.php');
                        echo "<script> window.location.href='manage_category.php';</script>"; //use this whenever the problem occured in the header
                    } else {
                        $_SESSION['update'] = "<div class='title fst-italic'>Failed to update the category.</div>";
                        header('location:'.$url.'category/manage_category.php');
                    }
                }
            ?>
        </div>
    </div>
</div>
<?php 
    include('../admin/layout/footer.php')
?>