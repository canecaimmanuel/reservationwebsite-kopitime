<?php 
    include('layout/nav.php')
?>

<!-- Main Content Section Starts  -->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-between">
                <h1 class="title">Dashboard</h1>
                <?php 
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                ?>
            </div>

            <div class="col-3 text-center categories">
                <h1>5</h1>
                Categories
            </div>
            <div class="col-3 text-center categories">
                <h1>5</h1>
                Categories
            </div>
            <div class="col-3 text-center categories">
                <h1>5</h1>
                Categories
            </div>
            <div class="col-3 text-center categories">
                <h1>5</h1>
                Categories
            </div>
        </div>
    </div>

</div>
<!-- Main Content Section Ends  -->


<?php 
    include('layout/footer.php')
?>