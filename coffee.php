<?php
    include('front/nav.php');
?>

<!-- fOOD sEARCH Section Starts Here -->
<section
    style="background: linear-gradient(rgba(0,0,0,0.5),#4b1f0e), url(coffeepics/coffee-footer.webp); background-size: cover; background-repeat: no-repeat; background-position: center; padding: 7% 0; text-align: center; margin-bottom: 8rem;">

    <div class="container">
        <div class="row" style="font-family: 'Montserrat';">
            <form action="<?php echo $url; ?>coffee_search.php" method="POST" class="d-flex justify-content-center">
                <input type="search" name="search" placeholder=" Search for coffee..." class="p-2" style="width: 50%;"
                    required>
                <input type="submit" name="submit" value="Search" class="button ms-1">
            </form>
        </div>
    </div>
</section>
<!-- coffee menu starts-here  -->
<div class="container my-5" id="main-body">
    <h3 class="title text-center"> <span>C</span>OFFEE <span>M</span>ENU</h3>
    <hr>
    <div class="row">

        <?php
        $sql = "SELECT * FROM tbl_coffee";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        $num_rows = mysqli_num_rows($res);

        if($num_rows > 0){
            while($row = mysqli_fetch_assoc($res)){
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $image_name = $row['image_name'];
                $active = $row['active'];

                ?>
        <div class="col-md-5 shadow m-5 p-3" style="border-radius: 15px; display: flex;">
            <?php
                    if($image_name == ""){
                           
            echo "<div class='fst-italic title'>Image not found</div>";
                    } else {
                        ?>
            <img src="<?php echo $url; ?>images/coffee/<?php echo $image_name; ?>" class="me-3" width="150px"
                height="150px" style="border-radius: 15px;">
            <?php
                    }
                ?>

            <div>
                <h5><?php echo $title; ?></h5>
                <div style="font-size: 14px;">Price: ₱<?php echo $price; ?></div>
                <p style="font-size: 14px;">Details: <?php echo $description; ?>.</p>
                <div style="font-size: 12px;" class="mb-1">Active: <span><?php echo $active; ?></span></div>
                <a class="btn btn-success" href="<?php echo $url; ?>order.php?coffee_id=<?php echo $id; ?>">Order</a>
            </div>
        </div>
        <?php
            }
        }else{
            //Coffee not found.
            echo "<div class='fst-italic title'>Coffee not found</div>";
        }

        ?>



    </div>
</div>
<!-- coffee menu ends-here  -->



<?php
    include('front/footer.php');
?>