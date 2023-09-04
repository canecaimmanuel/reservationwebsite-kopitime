<?php 
    include('../admin/layout/nav.php')
?>

<?php
    if(isset($_GET['id'])){
        //Get all the details
        $id = $_GET['id'];

        $sql2 = "SELECT * FROM tbl_coffee WHERE id=$id";
        $request = mysqli_query($conn, $sql2);

        $row2=mysqli_fetch_assoc($request);

        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $current_category = $row2['category_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];

    }else {
        header('location:'.$url.'admin/manage_cofee.php');
    }
?>

<div class="main-content">
    <div class="container">
        <div class="row">
            <h1 class="title mb-4">Update Coffee</h1>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl_admin mt-4">
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <textarea class="form-control" placeholder="Write Description here..." name="description"
                                cols="30" rows="4"><?php echo $description; ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Price: </td>
                        <td>
                            <input type="number" name="price" value="<?php echo $price; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Current Image:</td>
                        <td>
                            <?php
                                if($current_image == ""){
                                    echo "<div class='fst-italic title'>Image not available</div>";
                                } else {
                                    ?>
                            <img src="<?php echo $url; ?>images/coffee/<?php echo $current_image; ?>" width="150px"
                                height="150px">
                            <?php
                                }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Select New Image:</td>
                        <td>
                            <input type="file" name="image" class="form-control">
                        </td>
                    </tr>

                    <tr>
                        <td>Category:</td>
                        <td>
                            <select name="category">
                                <?php
                                    //Query to Select data from tbl_category 
                                    $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                                    $res = mysqli_query($conn, $sql);

                                    $num_rows = mysqli_num_rows($res);

                                    if($num_rows > 0){
                                        while($row = mysqli_fetch_assoc($res)){
                                            $category_title = $row['title'];
                                            $category_id = $row['id'];

                                            // echo " <option value='$category_id'>$category_title</option>";
                                            ?>
                                <option <?php if($current_category == $category_id){echo "selected";} ?>
                                    value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                <?php
                                       
                                        }
                                    } else {
                                        echo " <option value='0'> Category not available</option>";
                                    }

                                ?>

                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input <?php if($featured == "Yes"){ echo "checked";} ?> type="radio" name="featured"
                                value=" Yes"> Yes
                            <input <?php if($featured == "No"){ echo "checked";} ?> type="radio" name="featured"
                                value=" No"> No
                        </td>
                    </tr>
                    <tr>
                        <td>Active: </td>
                        <td>
                            <input <?php if($active == "Yes"){ echo "checked";} ?> type="radio" name="active"
                                value=" Yes"> Yes
                            <input <?php if($active == "No"){ echo "checked";} ?> type="radio" name="active"
                                value=" No"> No

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" class="btn btn-outline-success mt-3" name="submit" value="Update">
                        </td>
                    </tr>
                </table>
                <a href="<?php echo $url; ?>admin/manage_coffee.php" class="btn btn-danger ms-1">Back</a>
            </form>

            <?php
                if(isset($_POST['submit'])){
                    // echo "clicked";0-=
                    //1. Get all the image if selected
                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $description = $_POST['description']; 
                    $price = $_POST['price'];
                    $current_image = $_POST['current_image'];
                    $category = $_POST['category'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];
                     //2. Upload image if selected
                     //Checked whether upload button is upload or not
                     
                     if(isset($_FILES['image']['name'])){
                        //upload button clicked
                        $image_name = $_FILES['image']['name'];
                        //Checked whether the file is available or not
                        if($image_name !=""){

                            $result = explode(".", $image_name);
                            $ext = end($result);
                            $image_name = "Coffee_name".time().".".$ext;

                            $src = $_FILES['image']['tmp_name'];
                            $dst = "../images/coffee/".$image_name;

                            $upload = move_uploaded_file($src, $dst);

                            if($upload == false){
                                $_SESSION['upload'] = " <div class='fst-italic title'> Failed to upload new image.</div>";
                                header('location:'.$url.'admin/manage_coffee.php');
                                die();
                            } 

                            if($current_image != ""){
                                $remove_path = "../images/coffee/".$current_image;

                                $remove = unlink($remove_path);
                                if($remove == false){
                                    //failed to remove current image
                                    $_SESSION['remove_failed']  = " <div class='fst-italic title'> Failed to remove current image.</div>";
                                    header('location:'.$url.'admin/manage_coffee.php');
                                    die();
                                }
                            } 
                        } else {
                            $image_name = $current_image; //Default image if when image is not selected
                        }
                     } else {
                        $image_name = $current_image;
                     }

                     $sql3 = "UPDATE tbl_coffee SET
                        title = '$title',
                        description = '$description',
                        price = $price,
                        image_name = '$image_name',
                        category_id = '$category',
                        featured = '$featured',
                        active = '$active'
                        WHERE id = $id
                     ";

                     $request2 = mysqli_query($conn, $sql3);

                     if($request2 == true){
                        $_SESSION['update']  = " <div class='fst-italic title'>Coffee updated successfully.</div>";
                        // header('location:'.$url.'admin/manage_coffee.php');
                        echo "<script> window.location.href='manage_coffee.php'</script>";
                      
                     } else {
                        $_SESSION['update']  = " <div class='fst-italic title'>Failed to update coffee.</div>";
                        header('location:'.$url.'admin/manage_coffee.php');
                       
                     }
                }

                
            ?>
        </div>
    </div>
</div>
<?php 
    include('../admin/layout/footer.php')
?>