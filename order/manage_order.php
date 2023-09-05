<?php 
    include('../admin/layout/nav.php')
?>

<!-- Main Content Section Starts  -->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-between">
                <h1 class="title">Manage Order</h1>
                <div class='mt-2'>
                    <?php

                if(isset($_SESSION['update'])){
                    echo $_SESSION['update']; 
                    unset($_SESSION['update']); 
                }

                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete']; 
                    unset($_SESSION['delete']); 
                }
                ?>
                </div>

            </div>

            <form action="" method="POST">
                <table class="my-5 shadow col-md-12">
                    <tr class="bg-dark-subtle">
                        <th>S.N.</th>
                        <th class="px-4">Coffee</th>
                        <th>Price</th>
                        <th class="px-4">Qty</th>
                        <th class="px-3">Total</th>
                        <th class="text-center">Order Date</th>
                        <th>Status</th>
                        <th class="px-3">Customer Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th class="text-center">Action</th>
                    </tr>
                    <?php 
                    $sql = "SELECT * FROM tbl_order ORDER BY id DESC";

                    $res = mysqli_query($conn, $sql);

                    $num_rows = mysqli_num_rows($res);

                    $sn = 1;

                    if($num_rows > 0){
                        while($row = mysqli_fetch_assoc($res)){
                           $id =$row['id'];
                           $coffee =$row['coffee'];
                           $price = $row['price'];
                           $qty =$row['qty'];
                           $total =$row['total'];
                           $order_date = $row['order_date'];
                           $status = $row['status'];
                           $customer_name = $row['customer_name'];
                           $customer_contact = $row['customer_contact'];
                           $customer_email = $row['customer_email'];
                           $customer_address = $row['customer_address'];

                    ?>
                    <tr>
                        <td><?php echo $sn++; ?>.</td>
                        <td class="px-4"><?php echo $coffee; ?></td>
                        <td>₱<?php echo $price; ?></td>
                        <td class="text-center"><?php echo $qty; ?></td>
                        <td>₱<?php echo $total; ?></td>
                        <td class="text-center"><?php echo $order_date; ?></td>
                        <td class="px-3">
                            <?php
                         if($status == "Ordered"){
                            echo "<label>$status</label>";
                         } elseif($status == "On Delivery") {
                            echo "<label style='color: orange;'>$status</label>";
                         } elseif($status == "Delivered") {
                            echo "<label style='color: green;'>$status</label>";
                         } elseif($status == "Cancelled") {
                            echo "<label style='color: red;'>$status</label>";
                         }
                        ?>
                        </td>
                        <td><?php echo $customer_name; ?></td>
                        <td><?php echo $customer_contact; ?></td>
                        <td class="px-3"><?php echo $customer_email; ?></td>
                        <td class="px-3"><?php echo $customer_address; ?></td>
                        <td class="text-center d-flex p-4">
                            <a href=" <?php echo $url; ?>order/update_order.php?id=<?php echo $id; ?>"
                                class="btn btn-outline-success me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="<?php echo $url; ?>order/delete_order.php?id=<?php echo $id; ?>"
                                class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                ?>
                </table>

            </form>
        </div>
    </div>

</div>
</div>
</div>

</div>
<!-- Main Content Section Ends  -->

<?php 
    include('../admin/layout/footer.php')
?>