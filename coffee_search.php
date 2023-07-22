<?php
    include('front/nav.php');
?>

<!-- fOOD sEARCH Section Starts Here -->
<section
    style="background: linear-gradient(rgba(0,0,0,0.5),#4b1f0e), url(coffeepics/coffee-footer.webp); background-size: cover; background-repeat: no-repeat; background-position: center; padding: 7% 0; text-align: center; margin-bottom: 8rem;">

    <div class="container">
        <div class="row">
            <form action="coffee_search.php" method="POST" class="d-flex justify-content-center">
                <input type="search" name="search" placeholder=" Search for coffee..." style="width: 50%; ">
                <input type="submit" name="submit" value="Search" class="button">
            </form>
        </div>
    </div>
</section>
<!-- coffee menu starts-here  -->
<div class="container my-5" id="main-body">
    <h3 class="title text-center"> <span>C</span>OFFEE <span>M</span>ENU</h3>
    <hr>
    <div class="row">
        <div class="col-md-5 shadow m-5 p-3" style="border-radius: 15px; display: flex;">
            <img src="coffeepics/darkMochaFrappuccino.jpg" class="b-0 me-3" width="150px" style="border-radius: 15px;">
            <div>
                <h5>Frappuccino</h5>
                <p>Price:</p>
                <p>Details:</p>
                <a href="#" class="btn btn-success">Order</a>
            </div>
        </div>

        <div class="col-md-5 shadow m-5 p-3" style="border-radius: 15px; display: flex;">
            <img src="coffeepics/darkMochaFrappuccino.jpg" class="b-0 me-3" width="150px" style="border-radius: 15px;">
            <div>
                <h5>Frappuccino</h5>
                <p>Price:</p>
                <p>Details:</p>
                <a href="#" class="btn btn-success">Order</a>
            </div>
        </div>

        <div class="col-md-5 shadow m-5 p-3" style="border-radius: 15px; display: flex;">
            <img src="coffeepics/darkMochaFrappuccino.jpg" class="b-0 me-3" width="150px" style="border-radius: 15px;">
            <div>
                <h5>Frappuccino</h5>
                <p>Price:</p>
                <p>Details:</p>
                <a href="#" class="btn btn-success">Order</a>
            </div>
        </div>

        <div class="col-md-5 shadow m-5 p-3" style="border-radius: 15px; display: flex;">
            <img src="coffeepics/darkMochaFrappuccino.jpg" class="b-0 me-3" width="150px" style="border-radius: 15px;">
            <div>
                <h5>Frappuccino</h5>
                <p>Price:</p>
                <p>Details:</p>
                <a href="#" class="btn btn-success">Order</a>
            </div>
        </div>

        <div class="col-md-5 shadow m-5 p-3" style="border-radius: 15px; display: flex;">
            <img src="coffeepics/darkMochaFrappuccino.jpg" class="b-0 me-3" width="150px" style="border-radius: 15px;">
            <div>
                <h5>Frappuccino</h5>
                <p>Price:</p>
                <p>Details:</p>
                <a href="#" class="btn btn-success">Order</a>
            </div>
        </div>

        <div class="col-md-5 shadow m-5 p-3" style="border-radius: 15px; display: flex;">
            <img src="coffeepics/darkMochaFrappuccino.jpg" class="b-0 me-3" width="150px" style="border-radius: 15px;">
            <div>
                <h5>Frappuccino</h5>
                <p>Price:</p>
                <p>Details:</p>
                <a href="#" class="btn btn-success">Order</a>
            </div>
        </div>
    </div>
</div>
<!-- coffee menu ends-here  -->



<?php
    include('front/footer.php');
?>