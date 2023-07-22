<?php 
    include('layout/nav.php')
?>

<!-- Main Content Section Starts  -->
<div class="main-content">
    <div class="container">
        <div class="row">
            <h1 class="title">Add Admin</h1>

            <?php
                if(isset($_SESSION['add'])){ //Checking the session if display or not
                    echo $_SESSION['add']; //Display the Session Message if set
                    unset($_SESSION['add']); //Remove Session Message
                }
            ?>

            <form action="" method="POST">

                <table class="tbl_admin my-4">
                    <tr>
                        <td>Full Name: </td>
                        <td><input type="text" name="full_name" class="form-control" placeholder="Enter Your Name"
                                required></td>
                    </tr>

                    <tr>
                        <td>Username: </td>
                        <td><input type="text" name="username" class="form-control" placeholder="Enter Username"
                                required></td>
                    </tr>

                    <tr>
                        <td>Password: </td>
                        <td><input type="password" name="password" class="form-control" placeholder="Enter Password"
                                required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Submit" class="btn btn-outline-success">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Main Content Section Ends  -->
<?php 
    //Process the value from form and save it in Database
    
    if(isset($_POST['submit']))
    {   
        //Check if button clicked
        // echo "Button Clicked";

        //1. Get data from the form
       $full_name = $_POST['full_name'];
       $username = $_POST['username'];
       $password = md5($_POST['password']); //Password Encryption with MD5

        // if (strlen($password) >= 8) {
        // $password = md5($password); // Password Encryption with MD5
        // } else {
        // echo "Password must be at least 8 characters long.";
        // }

       //2. SQL Query to save the data into database
       $sql = "INSERT INTO tbl_admin SET
            full_name = '$full_name',
            username ='$username',
            password='$password'
       ";
       
       // 3. Executing Query and Saving Data into Database
       $res = mysqli_query($conn, $sql) or die(mysqli_error());

       //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res == TRUE){

            //Data Inserted
            // echo "Data inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='title fst-italic'>Admin Added Successfully.</div>";
            //Redirect Page to Manage Admin
            header("location:".$url.'admin/manage_admin.php');
        } else {

            //Data not Inserted
            // echo "Failed to insert data!";
              //Create a Session Variable to Display Message
              $_SESSION['add'] = "<div class='title fst-italic'>Failed to add Admin</div>";
              //Redirect Page to Manage Admin
              header("location:".$url.'admin/add_admin.php');
        }
       
    }
?>

<?php 
    include('layout/footer.php')
?>