<?php 
    include('../admin/layout/nav.php');
?>

<!-- Main Content Section Starts  -->
<div class="main-content">
    <div class="container">
        <div class="row">
            <h1 class="title mb-4">Add Category</h1>
            <?php 
            if(isset($_SESSION['add'])){
                echo $_SESSION['add']; //Displaying Session Message
                unset($_SESSION['add']); //Removing Session Message
            }

            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload']; 
                unset($_SESSION['upload']); 
            }
            ?>

            <form action="" method="POST" enctype="multipart/form-data">

                <table class="tbl_admin mt-4">
                    <tr>
                        <td>Title: </td>
                        <td><input type="text" name="title" class="form-control" placeholder="Category Title">
                        </td>
                    </tr>

                    <tr>
                        <td>Select Image: </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input type="radio" name="featured" value="Yes"> Yes
                            <input type="radio" name="featured" value="No"> No
                        </td>
                    </tr>

                    <tr>
                        <td>Active: </td>
                        <td>
                            <input type="radio" name="active" value="Yes"> Yes
                            <input type="radio" name="active" value="No"> No
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Add Category"
                                class="btn btn-outline-success mt-3">
                        </td>
                    </tr>
                </table>
            </form>

            <?php
                if(isset($_POST['submit'])){
                    // echo 'clicked';
                    $title = $_POST['title'];
                    
                    //For radio, need to check whether it is selected or not
                    if(isset($_POST['featured'])){
                        //Get the value from form
                        $featured = $_POST['featured'];
                    } else {
                        //Set the default value
                        $featured = 'No';
                    }

                    if(isset($_POST['active'])){
                        $active = $_POST['active'];
                    } else {
                        $active = "No";
                    }

                    //Check whether the image selected or not and set the value for the image name accordingly
       
                    // print_r($_FILES['image']); ---> you will know the source path Array([name] and [tmp_name])

                    // die();


                    if(isset($_FILES['image']['name'])){
                        //upload the image
                        //To upload image need, image name, source path and destination path
                        $image_name = $_FILES['image']['name'];
                        
                        //Upload the image only if image is selected
                        if($image_name !== ""){
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
                                header('location:'.$url.'category/add_category.php');
                                die();
                            }
                        }
                    } else {
                        //Don't upload the image set the image_name value as blank
                        $image_name = "";
                    }

                    $sql = "INSERT INTO tbl_category SET 
                        title='$title', 
                        image_name='$image_name',
                        featured='$featured', 
                        active='$active'
                     ";

                    $res = mysqli_query($conn, $sql);

                    if($res == true){
                        $_SESSION['add'] = "<div class='title fst-italic'>Category Added Successfully</div>";
                        header('location:'.$url.'category/manage_category.php');
                    } else {
                        $_SESSION['add'] = "<div class='title fst-italic'>Failed to add category</div>";
                        header('location:'.$url.'category/add_category.php');
                    }
                }
            ?>
        </div>
    </div>
</div>
<!-- Main Content Section Ends  -->

<?php 
    include('../admin/layout/footer.php')
?>