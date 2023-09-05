<?php 
    include('layout/nav.php')
?>

<!-- Main Content Section Starts  -->
<div class="main-content" style="height: 85vh;">

    <div class="container pt-5">
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

                <?php
                $sql = "SELECT * FROM tbl_category";

                $results = $conn->query($sql);

                $count = mysqli_num_rows($results);
                ?>
                <h1><?php echo $count; ?></h1>
                Available Categories
            </div>
            <div class="col-3 text-center categories">
                <?php
                $sql1 = "SELECT * FROM tbl_coffee";

                $res1 = $conn->query($sql1);

                $count1 = mysqli_num_rows($res1);
                ?>
                <h1><?php echo $count1 ?></h1>
                Available Coffees
            </div>
            <div class="col-3 text-center categories">
                <?php
                $sql2 = "SELECT * FROM tbl_order";

                $res2 = $conn->query($sql2);

                $count2 = mysqli_num_rows($res2);
                ?>
                <h1><?php echo $count2; ?></h1>
                Total Orders
            </div>
            <div class="col-3 text-center categories">

                <?php 
                //use aggregate function in sql
                    $sql3 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

                    $res3 = $conn->query($sql3);

                    $row = $res3->fetch_assoc();

                    //Get the total revenue
                    $total_revenue = $row['Total'];
                ?>
                <h1>₱<?php echo $total_revenue; ?></h1>
                Revenue Generated
            </div>
        </div>
    </div>

</div>
<!-- Main Content Section Ends  -->


<?php 
    include('layout/footer.php')
?>