<?php 
    include('layout/nav.php')
?>

<!-- Main Content Section Starts  -->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="">
                <h1 class="title">Update Password </h1>

                <?php 
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                    }
                ?>

                <form action="" method="POST">

                    <table class="tbl_admin my-4">
                        <tr>
                            <td>Current Password: </td>
                            <td><input type="password" name="current_password" value="" class="form-control"
                                    placeholder="Current password"></td>
                        </tr>

                        <tr>
                            <td>New Password: </td>
                            <td><input type="password" name="new_password" value="" class="form-control"
                                    placeholder="Enter new password"></td>
                        </tr>

                        <tr>
                            <td>Confirm Password: </td>
                            <td><input type="password" name="confirm_password" value="" class="form-control"
                                    placeholder="Confirm password"></td>
                        </tr>

                        <tr>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="submit" name="submit" value="Change Password"
                                    class="btn btn-outline-success">
                            </td>
                        </tr>
                    </table>
                </form>

            </div>


            <?php

                //Check whether the submit Button is Clicked or not
                if(isset($_POST['submit'])){
                    //echo "Button Clicked";
                    //Get all the values from form to update
                    $id = $_POST['id'];
                    $current_password = md5($_POST['current_password']);
                    $new_password = md5($_POST['new_password']);
                    $confirm_password = md5($_POST['confirm_password']);
                    

                    //Create SQL Query to Update Admin
                    $sql = "SELECT * FROM tbl_admin WHERE id = $id AND password = '$current_password'";

                    //Execute the Query
                    $res = mysqli_query($conn, $sql);

                    if($res == true){

                        // Check whether the data is available or not
                        $num_rows = mysqli_num_rows($res);

                        if($num_rows == 1){
                            // User exist and password can be change
                            // echo 'User found';  
                            if($new_password == $confirm_password){
                                
                                //Create SQL Query to Update Admin
                                $sql2 = "UPDATE tbl_admin SET password='$new_password' WHERE id = $id ";

                                $request = mysqli_query($conn, $sql2);

                                if($request == true){
                                    $_SESSION['change-pwd'] = "<div class='title fst-italic text-center'>Password Change Successfully.</div>";
                                    //Redirect to Manage Admin page
                                    header("location:".$url.'admin/manage_admin.php'); 
                                } else {
                                    $_SESSION['change-pwd'] = "<div class='title fst-italic text-center'>Failed to change password.</div>";
                                    //Redirect to Manage Admin page
                                    header("location:".$url.'admin/manage_admin.php'); 
                                }

                            } else {
                                $_SESSION['pwd-not-match'] = "<div class='title fst-italic text-center'>Password not match</div>";
                                 //Redirect to Manage Admin page
                                 header("location:".$url.'admin/manage_admin.php'); 
                            }
                        } else {
                            
                            // User does not exist
                            $_SESSION['user-not-found'] = "<div class='title fst-italic text-center'>Incorrect current password</div>";
                            //Redirect to Manage Admin page
                            header("location:".$url.'admin/manage_admin.php');
                        }
                                    
                    }
                }
            ?>

        </div>
    </div>
</div>
<!-- Main Content Section Ends  -->

<?php 
    include('layout/footer.php');
?>