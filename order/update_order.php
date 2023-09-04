<?php 
    include('../admin/layout/nav.php')
?>


<div class="main-content">
    <div class="container">
        <div class="row">
            <h1 class="title mb-4">Update Order</h1>


            <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $sql ="SELECT * FROM tbl_order WHERE id=$id";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count == 1){
                    $row = mysqli_fetch_assoc($res);

                    $coffee = $row['coffee'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $status = $row['status'];

                } else {
                    header('location:'.$url.'order/manage_order.php'); 
                }
            } else {
                header('location:'.$url.'order/manage_order.php');
            }
        ?>

            <form action="" method="POST">
                <table class="tbl_admin mt-4">
                    <tr>
                        <td>Coffee Name:</td>
                        <td><b><?php echo $coffee; ?></b></td>
                    </tr>

                    <tr>
                        <td>Price:</td>
                        <td>
                            <b>₱ <?php echo $price; ?></b>
                        </td>
                    </tr>

                    <tr>
                        <td>Quantity:</td>
                        <td>
                            <input type="number" name="qty" value="<?php echo $qty; ?>" class="form-control">
                        </td>
                    </tr>

                    <tr>
                        <td>Status:</td>
                        <td>
                            <select name="status">
                                <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered
                                </option>
                                <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On
                                    Develivery</option>
                                <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered
                                </option>
                                <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled
                                </option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td clospan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="price" value="<?php echo $price; ?>">
                            <input class="btn btn-outline-success mt-3" type="submit" name="submit"
                                value="Update Order">
                        </td>
                    </tr>
                </table>
                <a href="<?php echo $url; ?>order/manage_order.php" class="btn btn-danger ms-1">Back</a>
            </form>

            <?php
            if(isset($_POST['submit'])){
                // echo "clicked";
                $id = $_POST["id"];
                $price = $_POST["price"];
                $qty = $_POST["qty"];
                $total = $price * $qty;
                $status = $_POST["status"];
            }

            // try {
            $sql2 = " UPDATE tbl_order SET qty = $qty, total = $total, status = '$status' WHERE id = $id ";
            
            $result = mysqli_query($conn, $sql2);
            
            // } catch (mysqli_sql_exception $e){
            //     var_dump($e);
            //     exit;
            // }
            
            if($result == true){
                $_SESSION['update'] = "<div class='title fst-italic'>Order updated successfully</div>";
                echo "<script> window.location.href='manage_order.php'</script>";

            }else{
                $_SESSION['update'] = "<div class='title fst-italic'>Failed to update order</div>";
                header('location:'.$url.'order/manage_order.php');
            }
            ?>


        </div>
    </div>
</div>


<?php 
    include('../admin/layout/footer.php')
?>