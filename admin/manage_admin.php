<?php 
    include('layout/nav.php')
?>

<!-- Main Content Section Starts  -->
<div class="main-content" style="height: 85vh;">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h1 class="title">Manage Admin</h1>

                    <!-- Button to add admin  -->
                    <a href="add_admin.php" class="btn btn-outline-dark my-3 ">
                        <span class="me-2">+ Add Admin</span> <i class="fa-sharp fa-solid fa-user"></i></i>
                    </a>
                </div>

                <div class='title fst-italic'>
                    <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add']; //Displaying Session Message
                    unset($_SESSION['add']); //Removing Session Message
                }

                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete']; 
                    unset($_SESSION['delete']); 
                }
                ?>
                </div>

                <?php
                 if(isset($_SESSION['update'])){
                    echo $_SESSION['update']; 
                    unset($_SESSION['update']); 
                }
                ?>

                <?php
                 if(isset($_SESSION['user-not-found'])){
                    echo $_SESSION['user-not-found']; 
                    unset($_SESSION['user-not-found']); 
                }
                ?>

                <?php
                if(isset($_SESSION['pwd-not-match'])){
                   echo $_SESSION['pwd-not-match']; 
                   unset($_SESSION['pwd-not-match']); 
               }
                ?>

                <?php
                if(isset($_SESSION['change-pwd'])){
                   echo $_SESSION['change-pwd']; 
                   unset($_SESSION['change-pwd']); 
               }
                ?>
            </div>

            <table class="col-md-11 mx-auto my-5 shadow">
                <tr class="bg-dark-subtle">
                    <th class="col-1">S.N.</th>
                    <th class="col-5">Fullname</th>
                    <th class="col-4">Username</th>
                    <th class="col-2">Actions</th>
                </tr>

                <?php
                //Query to get all admin
                    $sql = "SELECT * FROM tbl_admin";
                    //Execute the query
                    $res = mysqli_query($conn, $sql);
                    if($res == TRUE ){
                        // Count Rows to Check whether we have data in database or not
                        $num_rows = mysqli_num_rows($res); //Function to get all the rows in database
                        
                        $sn = 1; //Create the variable and assign the value

                        //Check the num of rows
                        if($num_rows > 0){
                            //We have data in database
                            while($rows = mysqli_fetch_assoc($res)){
                                 //Using while loop to get all the data from the database.
                                 //And while loop will run as long as we have data in database
                                
                                 //Get the individual data
                                 $id = $rows['id'];
                                 $full_name = $rows['full_name'];
                                 $username = $rows['username'];

                                 //Display the values in our table
                                ?>

                <tr>
                    <td><?php echo $sn++; ?>.</td>
                    <td><?php echo $full_name; ?></td>
                    <td><?php echo $username; ?></td>
                    <td>
                        <a href="<?php echo $url; ?>admin/update_admin.php?id=<?php echo $id; ?>"
                            class="btn btn-outline-success"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="<?php echo $url; ?>admin/update_password.php?id=<?php echo $id; ?>"
                            class="btn btn-outline-primary"><i class="fa-sharp fa-solid fa-key"></i></a>
                        <a href="<?php echo $url; ?>admin/delete_admin.php?id=<?php echo $id; ?>"
                            class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>

                <?php
                            }
                        } else {
                            //We don't have data in DB
                        }
                    }
                ?>
            </table>
        </div>
    </div>

</div>
<!-- Main Content Section Ends  -->

<?php 
    include('layout/footer.php')
?>