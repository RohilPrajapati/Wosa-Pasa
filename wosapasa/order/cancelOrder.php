<?php 
    require_once '../config/dbconfig.php';
    require_once '../config/utility.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $page = 'profile';
        require_once '../assets/component/head.php'; 
        session_start();
        $id = $_SESSION['id'];
        $user = fetch_user($id,$conn);
        // $q_feedback = "SELECT * from payments inner join orders on payments.payment_id = orders.payment_id inner join products on orders.product_id = products.product_id where payments.user_id =". $user['user_id']. " and delivery_status = 0";
        $q_feedback = "SELECT * from payments where payments.user_id =". $user['user_id']. " and cancel_status = 1";
        $result = mysqli_query($conn,$q_feedback);
    ?>
    <title><?= $user['username'] ?></title>
</head>
<body>
    <?php require_once '../assets/component/topnav.php'; ?>
    <div class="container">
        <div class="profile_row">
            <div class="col_6">
                <div class="feedback_content">
                    <h1>Cancel Order</h1>
                    <div class="feedback_card_action">
                        <a href="/myorder.php" class="btn feedback_btn">Current Order</a>
                        <a href="/order/orderHistory.php" class="btn feedback_btn">Order History</a>
                        <a href="/order/cancelOrder.php" class="btn feedback_btn">Cancelled Order</a>
                    </div>
                    <?php 
                    if(mysqli_num_rows($result)!=0){
                    while($payment = mysqli_fetch_assoc($result)){
                    ?>
                    <!-- <pre>
                        <?php print_r($payment); ?>
                    </pre> -->
                    
                    <div class="feedback_card">
                        <p class="morder_date">Order Date : <?= $payment['payment_date'] ?></p>
                        <h3>Payment Unique Id : <?= $payment['payment_uid'] ?></h3>
                        <p>Delivery Address : <?= $payment['delivery_address'] ?></p>
                        <p>Phone Number : <?= $payment['phone_no'] ?></p>
                        <p>Payment Method : <?= $payment['payment_method'] ?></p>
                        <p>Payment Status : <?php if($payment['payment_status']==1){echo "Paid";}else{echo "Unpaid";} ?></p>
                        <h1>Order Items</h1>
                        <?php
                            $q_order = "SELECT * from orders inner join products on orders.product_id = products.product_id where payment_id = ".$payment['payment_id'];
                            $r_order_prod = mysqli_query($conn,$q_order);
                            while ($order = mysqli_fetch_assoc($r_order_prod)){
                        ?>
                        <a href="/detailview.php?p_id=<?= $order['product_id'] ?>" class="disable_link">
                            <div class = "product_list">
                                <img class="myorder_prod_img" src="../assets/image/upload/<?= $order['image'] ?>">
                                <div class="morder_prod_content">
                                    <h2 class="morder_prod_title">
                                        <?= $order['title'] ?>
                                    </h2>
                                    <p>
                                        <?= $order['description'] ?>
                                    </p>
                                    <span class="offer-price">Rs. <?= $order['price'] ?></span>
                                </div>
                            </div>
                        </a>
                        <?php
                            
                            }
                        ?>
                        <div class="feedback_card_action">
                            <span class="offer-price">Total : Rs. <?= $payment['total_amt'] ?></span><br>
                        </div>
                    </div>
                    <?php
                    }
                }else{
                    echo "No Result Found";
                }
                    ?>
                </div>
            </div>
            <?php
                require_once '../assets/component/sidebar_profile.php'
            ?>
        </div>
    </div>
</body>
</html>