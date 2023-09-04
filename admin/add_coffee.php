<?php 
    include('../admin/layout/nav.php');
?>

<!-- Main Content Section Starts  -->
<div class="main-content">
    <div class="container">
        <div class="row">
            <h1 class="title mb-4">Add Coffee</h1>
            <?php 
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload']; //Displaying Session Message
                unset($_SESSION['upload']); //Removing Session Message
            }

            ?>

            <form action="" method="POST" enctype="multipart/form-data">

                <table class="tbl_admin mt-4">
                    <tr>
                        <td>Title: </td>
                        <td><input type="text" name="title" class="form-control" placeholder="Coffee name...">
                        </td>
                    </tr>

                    <tr>
                        <td>Description: </td>
                        <td>
                            <textarea name="description" class="form-control" placeholder="Type a description here..."
                                cols="40" rows="3"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Price: </td>
                        <td>
                            <input type="number" name="price" class="form-control">
                        </td>
                    </tr>

                    <tr>
                        <td>Select Image: </td>
                        <td>
                            <input type="file" name="image" class="form-control">
                        </td>
                    </tr>

                    <tr>
                        <td>Category: </td>
                        <td>
                            <select name="category">

                                <?php 
                                    //Create PHP code to display categories from Database
                                    //1. Create Sql to get all active categories from the database
                                    $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";

                                    $res = mysqli_query($conn, $sql);
                                    
                                    //Count rows to check whether we have categories or not
                                    $num_rows = mysqli_num_rows($res);
                                    // If count is greater than zero we have categories
                                    if($num_rows > 0){
                                 
                                        while($row = mysqli_fetch_assoc($res)){
                                            //get the details of categories
                                            $id = $row['id'];
                                            $title = $row['title'];
                                            ?>

                                <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                <?php
                                        }
                                    } else {
                                        //We don't have categories
                                        ?>
                                <option value="0">No Category found</option>
                                <?php
                                    }

                                    //2.Display on the dropdown
                                ?>

                            </select>
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
                            <input type="submit" name="submit" value="Submit" class="btn btn-outline-success mt-3">
                        </td>
                    </tr>
                </table>
                <a href="<?php echo $url; ?>admin/manage_coffee.php" class="btn btn-danger ms-1">Back</a>
            </form>

            <?php
              //Check whether the button is clicked
              if(isset($_POST['submit'])){
                // echo "button clicked";
                //Add coffee in database

                //1. Get data from form
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                //check whether radio button for featured and active are checked or not
                if(isset($_POST['featured'])){
                    $featured = $_POST['featured'];
                } else {
                    $featured = "No"; //Setting the Default value
                }
                
                if(isset($_POST['active'])){
                    $active = $_POST['active'];
                }else {
                    $active = "No"; 
                }
                //2. Upload the image if selected
                //Checked whether the select image is clicked or not and upload the image only if the image is selected
                if(isset($_FILES['image']['name'])){
                    //Get the details of the selected image
                    $image_name = $_FILES['image']['name'];

                    //Checked whether the image is selected or not and uploaf only if selected
                    if($image_name !== ""){
                        // iamge is selected
                        //A. Rename the image
                        //get the extension of selected image
                        $result = explode('.', $image_name);
                        $ext = end($result);
                         
                        //Creaate new name for image
                        $image_name = "Coffee_name_".time().".".$ext;


                        //B. Upload the image
                        //get the source path and destination path

                        //Source path is the current location of the image

                        $src = $_FILES['image']['tmp_name'];

                        //Destination path for the image to be uploaded
                        $dst = "../images/coffee/".$image_name;

                        //Finally upload the image
                        $upload = move_uploaded_file($src, $dst);

                        //check whether image uploaded or not
                        if($upload == false){
                            //Failed to upload the image
                            //redirect to add food page with error message
                            $_SESSION['upload'] = "<div class='title fst-italic'>Failed to upload image</div>";     
                            header('location:'.$url.'admin/add_coffee.php');            
                            //stop the process
                            die();
                        } 
                    }
                } else {
                    $image_name = ""; //Default value as blank
                }
                
                //3. Insert Into database

                //create a sql query to save or add coffee
                // for numerical we do not need to pass value inside strings
                $sql2 = "INSERT INTO tbl_coffee SET
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = $category,
                    featured = '$featured',
                    active = '$active'                     
                ";

                //execute the query
                $request = mysqli_query($conn, $sql2);

                //check date whether inserted or not
                //4. redirect and send message to manage_coffee.php
                if($request == true){
                    $_SESSION['add'] = "<div class='title fst-italic'>Coffee added successfully</div>";   
                    // header('location:'.$url.'admin/manage_coffee.php');  
                    echo "<script> window.location.href='manage_coffee.php';</script>";
                } else {
                    $_SESSION['add'] = "<div class='title fst-italic'>Failed to add coffee</div>";   
                    header('location:'.$url.'admin/manage_coffee.php');  
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