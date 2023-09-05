<?php 
    include('../config/constant.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/904fa8d934.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/admin.css">
    <title>Login - Food Order System</title>
</head>

<body>
    <div id="cover">
        <section class="container">
            <div class="row">
                <div class="col-md-5 mx-5 text-center mx-auto" id="login">

                    <form action="" method="POST">
                        <p class="title login-title">Welcome to Kopitime.</p>
                        <?php 
                        if(isset($_SESSION['login'])){
                            echo $_SESSION['login'];
                            unset($_SESSION['login']);
                        }

                        if(isset($_SESSION['no-login-message'])){
                            echo $_SESSION['no-login-message'];
                            unset($_SESSION['no-login-message']);
                        }
                    ?>
                        <input type="text" name="username" placeholder="Username" class="form-control mt-3"
                            required /><br>
                        <input type="password" name="password" placeholder="Password" class="form-control"
                            required /><br>
                        <button type="submit" name="submit" class="btn_login">Log In</button>
                        <a href="<?php echo $url; ?>" class="btn_login text-decoration-none">Home</a>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
</body>

</html>

<?php 
    if(isset($_POST['submit'])){
        //Get the data from the login form

        //Get data from login form
        $username = mysqli_real_escape_string($_POST['username']);
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";

        $res = mysqli_query($conn, $sql);

        $num_rows = mysqli_num_rows($res);

        if($num_rows == 1){
            $_SESSION['login'] = "<div class='title fst-italic'>Log in Successfully.</div>";
            $_SESSION['user'] = $username; // to check if the user is log in or not and logout will unset it
        
            header("location:".$url."admin/");
        } else {
            $_SESSION['login'] = "<div class='title fst-italic'>Log in failed. Username or Password did not match</div>";
            header("location:".$url."admin/login.php");
        }
    }

?>