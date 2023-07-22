<?php 
    include('layout/nav.php')
?>

<!-- Main Content Section Starts  -->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="title">Manage Coffee</h1>
                    <a href="<?php echo $url; ?>admin/add_coffee.php" class="btn btn-outline-dark my-3 ">
                        <span class="me-2">+ Add Coffee</span>
                    </a>
                </div>
                <div class='title fst-italic'>
                    <?php
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']); 
                    }
                    
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete']; 
                        unset($_SESSION['delete']); 
                    }

                    if(isset($_SESSION['unauthorized'])){
                        echo $_SESSION['unauthorized']; 
                        unset($_SESSION['unauthorized']); 
                    }

                    if(isset($_SESSION['upload'])){
                        echo $_SESSION['upload']; 
                        unset($_SESSION['upload']); 
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
                    <th class="col-2">Title</th>
                    <th class="col-2">Description</th>
                    <th class="col-1">Price</th>
                    <th class="col-2">Image</th>
                    <th class="col-1">Featured</th>
                    <th class="col-1">Active</th>
                    <th class="col-2">Actions</th>
                </tr>

                <?php
                    $sql = "SELECT * FROM tbl_coffee";

                    $res = mysqli_query($conn, $sql);

                    $num_rows = mysqli_num_rows($res);

                    $sn = 1;

                    if($num_rows > 0){
                        //coffee added in DB
                        //Get the coffee in DB and display
                        while($row = mysqli_fetch_assoc($res)){
                            $id = $row['id'];
                            $title = $row['title'];
                            $description = $row['description'];
                            $price = $row['price'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];

                            ?>
                <tr>
                    <td><?php echo $sn++; ?>.</td>
                    <td><?php echo $title; ?></td>
                    <td><?php echo $description; ?></td>
                    <td>&#8369 <?php echo $price; ?></td>
                    <td>

                        <?php 
                            if($image_name != ""){ 
                                ?>
                        <img src="<?php echo $url; ?>images/coffee/<?php echo $image_name;?>" height="100px"
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
                        <a href="<?php echo $url; ?>admin/update_coffee.php?id=<?php echo $id; ?>"
                            class="btn btn-outline-success"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="<?php echo $url; ?>admin/delete_coffee.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>"
                            class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <?php
                        }

                    } else {
                        //Coffee not added in DB
                        echo "<tr> <td colspan='7' class='fst-italic title'>Coffee not added yet.</td> </tr>";
                    }
                ?>


            </table>





        </div>
    </div>
    <!-- Main Content Section Ends  -->

    <?php 
    include('layout/footer.php')
?>