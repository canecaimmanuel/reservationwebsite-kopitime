<?php
    include('front/nav.php');
?>


<!-- CAtegories Section Starts Here -->
<section
    style="background: linear-gradient(rgba(0,0,0,0.5),#4b1f0e), url(../coffeepics/coffee-footer.webp); background-size: cover; background-repeat: no-repeat; background-position: center; padding: 7% 0; text-align: center; margin-bottom: 8rem;">
</section>

<section id="main-body">
    <div class="container">
        <h3 class="title text-center"> <span>C</span>OFFEE <span>C</span>ATEGORIES</h3>
        <hr>
        <div class="row main-content">

            <?php
                $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";

                $res = mysqli_query($conn, $sql);

                $num_rows = mysqli_num_rows($res);

                if($num_rows > 0){
                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];

                        ?>
            <div class="col-md-4 col-sm-6 col-lg-3 main-card">
                <div class="card menu-card">
                    <?php
                        if($image_name == ""){
                            //Category image not available
                         echo "<div class='fst-italic title'>Category image not Available</div>";

                        } else {
                            //Category available
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
                    echo "<div class='fst-italic title'>Category not Available</div>";
                }
            ?>

        </div>
    </div>
</section>
<!-- Categories Section Ends Here -->


<!-- social Section Starts Here -->


<?php
    include('front/footer.php');
?>