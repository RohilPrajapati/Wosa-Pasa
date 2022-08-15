<?php 
    require_once 'checkadmin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'head.php' ?>
    <title>Order</title>
</head>
<body>
    <div class="main_container">
        <?php 
        $page_title='order';
        require_once 'admin_nav.php'; ?>
        <div class="container">
            <input type="button" onclick="window.location.href='orderHistory.php'" value="Order History" class="btn">
            <h1 class="header">Pending Order</h1>
            <?php
                $q_order = "SELECT * FROM payments inner join users on payments.user_id = users.user_id where delivery_status = 0 and cancel_status = 0";
                $result = mysqli_query($conn,$q_order);
                while($payment= mysqli_fetch_assoc($result)){
                    ?>
                    <div class="payment_card">
                        <!-- <pre>
                            <?php print_r($payment); ?>
                        </pre> -->
                        <span>Order Date : <?= $payment['payment_date'] ?></span>     
                        <h2>Payment Uid : <?= $payment['payment_uid'] ?></h2>
                        <span>Username : <?= $payment['username'] ?></span><br>
                        <span>Delivery Address : <?= $payment['delivery_address'] ?></span><br>  
                        <span>Phone Number : <?= $payment['phone_no'] ?></span><br>
                        <span>Payment Status : <?php if($payment['payment_status']){echo "Paid";}else{ echo "Unpaid";} ?></span><br>
                        <span>Payment Method : <?= $payment['payment_method'] ?></span><br>
                    <?php
                            $q_order = "SELECT * from orders inner join products on orders.product_id = products.product_id where payment_id = ".$payment['payment_id'];
                            $r_order_prod = mysqli_query($conn,$q_order);
                            while ($order = mysqli_fetch_assoc($r_order_prod)){
                        ?>
                        <a href="/detailview.php?p_id=<?= $order['product_id'] ?>" class="disable_link">
                            <div class = "product_list">
                                <img class="order_prod_img" src="../assets/image/upload/<?= $order['image'] ?>">
                                <div class="morder_prod_content">
                                    <h2 class="morder_prod_title">
                                        <?= $order['title'] ?>
                                    </h2>
                                    <p>
                                        <?= $order['description'] ?>
                                    </p>
                                    <!-- <span class="offer-price">Rs. <?= $order['price'] ?></span> -->
                                    
                                </div>
                            </div>
                        </a>
                        
                        <?php
                            
                            }
                        ?>
                        <div class="offer_price">Rs. <?= $payment['total_amt'] ?></div>
                        <div class="action_btn">
                            <a href="updateDeliver.php?id=<?= $payment['payment_id'] ?>" class="primary_btn"  onclick="return confirm('Confirm the delivery ?')" >Deliver</a>
                            <!-- <a href="updateDeliver.php?id=<?= $payment['payment_id'] ?>" class="primary_btn">Deliver</a> -->
                        </div>
                        </div>
                        <?php
                }
            ?>
        </div>
    </div>
</body>
</html>