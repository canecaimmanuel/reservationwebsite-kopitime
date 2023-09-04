<?php
    include('config/constant.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopitime</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Meddon&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Staatliches&display=swap');

* {
    margin: 0 0;
    padding: 0 0;
    font-family: 'Montserrat', Arial, Helvetica, sans-serif;
}

.container {
    width: 92%;
    margin: 0 auto;
    padding: 1%;
}

.logo {
    float: left;
}

.menu ul {
    list-style-type: none;
}

.menu ul li {
    display: inline;
    padding: 1%;
    font-family: Arial;
    font-size: 15px;
}

.text-right {
    text-align: right;
}

.text-center {
    text-align: center;
}

.text-white {
    color: white;
}

.order {
    width: 50%;
    margin: 0 auto;
}

a {
    color: #302e2e;
    text-decoration: none;
}

a:hover {
    color: #0b0b0b;
}

.navbar-brand {
    font-family: Helvetica;
    font-weight: 900;
    font-size: 1.2rem;
}

.navbar-brand span {
    color: #a98779;
}

.img-responsive {
    width: 100%;
}

.img-curve {
    border-radius: 15px;
}

.title {
    font-size: 2.5rem;
}

.title span {
    color: #a98779;
}

.button {
    border: 1px solid black;
    color: black;
    padding: 10px 20px;
    font-size: small;
}

.button:hover {
    background: #a98779;
    color: #fff;
    border: #fff;
}

h2 {
    color: #2f3542;
    font-size: 2rem;
    margin-bottom: 2%;
}

legend {
    font-weight: bold;
    color: #a98779;
}

fieldset {
    border: 1px solid;
    margin: 5%;
    padding: 3%;
    border-radius: 5px;
}

.coffee-menu-img {
    width: 20%;
    float: left;
}

.coffee-menu-desc {
    width: 70%;
    float: left;
    margin-left: 8%;
}

.coffee-price {
    font-size: 1.2rem;
    margin: 2% 0;
}

.order-label {
    margin-bottom: 1%;
    font-weight: bold;
}

.input-responsive {
    width: 96%;
    padding: 1%;
    margin-bottom: 3%;
    border-radius: 5px;
    font-size: 1rem;
    border: 1px solid #a98779;
}

.clearfix {
    clear: both;
    float: none;
}

.social ul {
    list-style-type: none;
    margin-top: 7rem;
}

.social ul li {
    display: inline;
    padding: 1%;
    list-style-type: none;
}
</style>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a class="navbar-brand" href="#"><span>Kopi</span> time</a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo $url; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>admin/manage_admin.php">Admin</a>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>categories.php">Category</a>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>coffee.php">Coffee</a>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>contact.php">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <div class="clearfix"></div>
    </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <?php
       //Check whether coffee is set or not
       if(isset($_GET['coffee_id']))  
       {
        $coffee_id = $_GET['coffee_id'];

        //Get the details of the selected coffee
        $sql = "SELECT * FROM tbl_coffee WHERE id=$coffee_id";
        $res = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($res);
        //Check wheyher the data available or not
        if($num_rows == 1){
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
        } else {
            //food not available
            //Redirect to Home page
            header('location:'.$url);
        }
        
       } else {
        //Redirect to homepage
        header('location:'.$url);
       }
    ?>

    <!-- coffee sEARCH Section Starts Here -->
    <section class="coffee-search">
        <div
            style="background: linear-gradient(rgba(0,0,0,0.5),#4b1f0e), url(coffeepics/coffee-footer.webp); background-size: cover; background-repeat: no-repeat; background-position: center; padding: 7% 0; text-align: center; height: 4rem;">

            <h2 class="text-center text-white" style="font-family: 'Montserrat'; font-size: 45px;">Fill this form to
                confirm your order.
            </h2>
        </div>
        <div class="container">


            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Coffee</legend>

                    <div class="coffee-menu-img">
                        <?php
                            //Check whether the image is available or not
                            if($image_name == ""){
                                echo "<div class='fst-italic title'>Image not available</div>";
                            }else{
                                ?>
                        <img src="<?php echo $url; ?>images/coffee/<?php echo $image_name; ?>"
                            class="img-responsive img-curve">
                        <?php
                            }
                        ?>

                    </div>

                    <div class="coffee-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="coffee" value="<?php echo $title; ?>">
                        <p class="coffee-price">Price: ₱<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="0" required>

                    </div>

                </fieldset>

                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Juan Dela Cruz" class="input-responsive"
                        required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 92743xxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. juan@mail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive"
                        required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="button">
                </fieldset>

            </form>

            <?php
                if(isset($_POST['submit'])){
                    // echo 'click';
                    $coffee = $_POST['coffee'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $total = $price * $qty; 

                    $order_date = date("Y-m-d h:i:sa"); //order date

                    $status = "Ordered"; //Ordered, On delivery, delivered, cancelled

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];

                    //Save order in database

                    $sql2 = "INSERT INTO tbl_order SET
                     coffee = '$coffee',
                     price = $price,
                     qty = $qty,
                     total = $total,
                     order_date = '$order_date',
                     status = '$status',
                     customer_name = '$customer_name',
                     customer_contact = '$customer_contact',
                     customer_email = '$customer_email',
                     customer_address = '$customer_address'
                    ";

                    // echo $sql2; die();

                    //Execute the query
                    $res2 = mysqli_query($conn, $sql2);

                    if($res2 == true){
                        $_SESSION['order'] = "<div class='fst-italic message'>Ordered successfully</div>";
                        // header('location:'.$url);
                        echo "<script> window.location.href='index.php'</script>";

                    } else {
                        $_SESSION['order'] = "<div class='fst-italic message'>Failed to ordered</div>";
                        header('location:'.$url);
                    }
                }
            ?>

        </div>
    </section>
    <!-- coffee sEARCH Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png" /></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png" /></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png" /></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <small class="text-muted">COPYRIGHT &copy 2023 KOPI TIME PROJECT, ALL RIGHTS RESERVED</small>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>

</html>