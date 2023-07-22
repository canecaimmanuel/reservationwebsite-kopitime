<?php 
    include('layout/nav.php')
?>

<!-- Main Content Section Starts  -->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="">
                <h1 class="title">Update Admin </h1>

                <?php
                    //1. Get the id of selected Admin
                    $id = $_GET['id'];
                    //2. Create SQL Query to Get the Details
                    $sql = "SELECT * FROM tbl_admin WHERE id = $id";

                    //Execute the Query
                    $res = mysqli_query($conn, $sql);

                    //Check whether the query is executed or not
                    if($res == true){

                        // Check whether the data is available or not
                        $num_rows = mysqli_num_rows($res);
                        // Check whether we have admin data or not
                        if($num_rows == 1){
                            // Get the Details
                            // echo "Admin Available";
                            $row = mysqli_fetch_assoc($res);

                            $full_name = $row['full_name'];
                            $username = $row['username'];
                        } else {
                            // Redirect to Manage Admin Page
                            header("location:".$url.'admin/manage_admin.php');
                        }
                            
                    }
                ?>

                <form action="" method="POST">

                    <table class="tbl_admin my-4">
                        <tr>
                            <td>Full Name: </td>
                            <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"
                                    class="form-control" placeholder="Enter Your Name"></td>
                        </tr>

                        <tr>
                            <td>Username: </td>
                            <td><input type="text" name="username" value="<?php echo $username; ?>" class="form-control"
                                    placeholder="Enter Username"></td>
                        </tr>

                        <tr>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="submit" name="submit" value="Update Admin" class="btn btn-outline-success">
                            </td>
                        </tr>
                    </table>
                </form>

            </div>


            <?php

                //Check whether the submit Button is Clicked or not
                if(isset($_POST['submit'])){
                    //echo "Button Clicked";
                    //Get all the values from forn to update
                    $id = $_POST['id'];
                    $full_name = $_POST['full_name'];
                    $username = $_POST['username'];

                    //Create SQL Query to Update Admin
                    $sql = "UPDATE tbl_admin SET
                            full_name = '$full_name',
                            username = '$username'
                            WHERE id = $id
                    ";

                    
                    //Execute the Query
                    $res = mysqli_query($conn, $sql);

                    //Check whether the query executed successfully or not
                    if($res == True){

                        // Query executed and Admin Updated
                        $_SESSION['update'] = "<div class='title fst-italic'>Admin updated successfully.</div>";
                       //Redirect to Manage Admin page
                       header("location:".$url.'admin/manage_admin.php');
                            
                    } else {
                        //Failed to Update Admin
                        $_SESSION['update'] = "<div class='title fst-italic'>Failed to update.</div>";
                        //Redirect to Manage Admin page
                        header("location:".$url.'admin/manage_admin.php');
                    }
                }
            ?>
        </div>
    </div>

</div>
<!-- Main Content Section Ends  -->

<?php 
    include('layout/footer.php')
?>