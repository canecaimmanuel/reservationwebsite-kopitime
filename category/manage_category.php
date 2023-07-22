<?php 
    include('../admin/layout/nav.php')
?>

<!-- Main Content Section Starts  -->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="title">Manage Category</h1>

                    <!-- Button to add admin  -->
                    <a href="<?php echo $url; ?>category/add_category.php" class="btn btn-outline-dark my-3 ">
                        <span class="me-2">+ Add Category</span>
                    </a>
                </div>

                <div class='title fst-italic'>
                    <?php
                    if(isset($_SESSION['add'])){
                    echo $_SESSION['add']; //Displaying Session Message
                    unset($_SESSION['add']); //Removing Session Message
                    }

                    if(isset($_SESSION['remove'])){
                        echo $_SESSION['remove']; 
                        unset($_SESSION['remove']); 
                    }

                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete']; 
                        unset($_SESSION['delete']); 
                    }
                    if(isset($_SESSION['no-category-found'])){
                        echo $_SESSION['no-category-found']; 
                        unset($_SESSION['no-category-found']); 
                    }
                    if(isset($_SESSION['upload'])){
                        echo $_SESSION['upload']; 
                        unset($_SESSION['upload']); 
                      }
                    if(isset($_SESSION['failed-remove'])){
                    echo $_SESSION['failed-remove']; 
                    unset($_SESSION['failed-remove']); 
                    }
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update']; 
                        unset($_SESSION['update']); 
                    }
                    
                    ?>
                </div>
            </div>
            <table class="col-md-11 mx-auto my-5 shadow">
                <tr class="bg-dark-subtle">
                    <th class="col-1">S.N.</th>
                    <th class="col-4">Category Title</th>
                    <th class="col-3">Images</th>
                    <th class="col-1">Featured</th>
                    <th class="col-1">Active</th>
                    <th class="col-2">Actions</th>
                </tr>

                <?php
                    $sql = "SELECT * FROM tbl_category";

                    $res = mysqli_query($conn, $sql);

                    $num_rows = mysqli_num_rows($res);

                    // Create serial number
                    $sn=1;

                    if($num_rows > 0){
                        //We have data in the database
                        //get the data and display
                        while($row = mysqli_fetch_assoc($res)){
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];

                ?>
                <tr>
                    <td><?php echo $sn++; ?>. </td>
                    <td><?php echo $title; ?></td>
                    <td>
                        <?php 
                            if($image_name != ""){ 
                                ?>
                        <img src="<?php echo $url; ?>images/category/<?php echo $image_name;?>" height="100px"
                            width="100px">
                        <?php
                            } else {
                                echo "<div class='title fst-italic'>Image not added.</div>'";
                            }
                        ?>
                    </td>
                    <td><?php echo $featured; ?></td>
                    <td><?php echo $active; ?></td>
                    <td>
                        <a href="<?php echo $url; ?>category/update_category.php?id=<?php echo $id; ?>"
                            class="btn btn-outline-success"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="<?php echo $url; ?>category/delete_category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>"
                            class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <?php
                        }

                    } else {
                        //We will display message inside table
                ?>
                <tr>
                    <td colspan="6">
                        <div class="title fst-italic">No Category Added</div>
                    </td>
                </tr>

                <?php
                    }
                ?>


            </table>
        </div>
    </div>

</div>
<!-- Main Content Section Ends  -->

<?php 
    include('../admin/layout/footer.php')
?>