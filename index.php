<?php
    include('front/nav.php');
?>

<header id="header-body">
    <div class="container header-content">
        <div class="row">
            <div class="header-text text-center col-sm-12">
                <h2 class="text-decoration-underline">Coffee</h2>
                <h1 class="text-uppercase">Life begins after coffee</h1>
                <p>
                    Welcome to our coffee shop, where every cup is made with love.
                </p>
            </div>
            <div class="header-btn">
                <a href="<?php echo "categories.php"; ?>" type="button" class="text-decoration-none">READ MORE</a>
                <a href="<?php echo "coffee.php"; ?>" type="button" class="text-decoration-none">ORDER</a>
            </div>
        </div>
    </div>
</header>


<div class="text-end p-4" style="color: #a98779;">
    <?php
    if(isset($_SESSION['order'])){
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
?>

</div>


<main id="main-body">
    <div class="container ">
        <h3 class="title text-center"> <span>C</span>OFFEE <span>C</span>ATEGORIES</h3>
        <hr>

        <div class="row main-content">

            <?php
            $sql = "SELECT * FROM tbl_category WHERE active = 'Yes' AND featured = 'Yes' LIMIT 8";

            $res = mysqli_query($conn, $sql);

            $num_rows = mysqli_num_rows($res);

            if($num_rows > 0){
                //Category available
                while($row = mysqli_fetch_assoc($res)){
                    //Get the values 
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
            <div class="col-md-4 col-sm-6 col-lg-3 main-card">
                <div class="card menu-card">
                    <?php
                        //check whether available or not
                        if($image_name == ""){
                            echo "<div class='fst-italic title'>Image not available</div>";
                        } else {
                            ?>
                    <img class="img-fluid" src="<?php echo $url; ?>images/category/<?php echo $image_name; ?>">
                    <?php
                        }
                    ?>

                    <div class=" menu-text">
                        <a href="" class="text-decoration-none text-center">
                            <p><?php echo $title; ?></p>
                        </a>
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                //Category not available
                echo "<div class='fst-italic title'>Category not available</div>";
            }
        ?>

        </div>
        <hr>
        <div class="button-below">
            <a href="<?php echo $url; ?>categories.php" type="button" class="button"><span class="me-4">SEE MORE</span>
                <i class="fa-solid fa-angle-right"></i></a>
        </div>
</main>

<div class="container">
    <h3 class="title text-center" style="font-family: 'Montserrat'; margin-top: -4%;"> <span>C</span>OFFEE
        <span>M</span>ENU
    </h3>
    <hr>
</div>
<div style=" background-color: #e3fac4; padding: 4% 0; font-family: 'Montserrat';">
    <div class="container">

        <div class="row">

            <?php
                $sql2 = "SELECT * FROM tbl_coffee LIMIT 4";

                $request = mysqli_query($conn, $sql2);

                $num_rows = mysqli_num_rows($request);

                if($num_rows > 0){
                    while($row = mysqli_fetch_assoc($request)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        $active = $row['active'];
                        ?>
            <div class="col-md-5 shadow m-5 p-3 bg-white" style="border-radius: 15px; display: flex;">
                <?php 
                                if($image_name == ""){
                    echo "<div class='fst-italic title'>Coffee image not available.</div>";
                                }else{
                                    ?>
                <img src="<?php echo $url; ?>images/coffee/<?php echo $image_name; ?>" class="me-3" width="150px" <?php
                                }
                            ?> style="border-radius: 15px;">
                <div>
                    <h5><?php echo $title; ?></h5>
                    <div style="font-size: 14px;">Price: ₱<?php echo $price; ?></div>
                    <p style="font-size: 14px;">Details: <?php echo $description; ?>.</p>
                    <div style="font-size: 12px;" class="mb-1">Active: <span><?php echo $active; ?></span></div>
                    <a class="btn btn-success"
                        href="<?php echo $url; ?>order.php?coffee_id=<?php echo $id; ?>">Order</a>
                </div>
            </div>
            <?php
                    }
                } else {
                    echo "<div class='fst-italic title'>Error not found</div>";
                }
            ?>




        </div>
    </div>
</div>
<div class="container" style=" margin-bottom: 7rem">
    <hr>
    <div class="button-below">
        <a href="<?php echo $url; ?>coffee.php" type="button" class="button"><span class="me-4">SEE
                MORE</span>
            <i class="fa-solid fa-angle-right"></i></a>
    </div>
</div>


<?php
    include('front/footer.php');
?>