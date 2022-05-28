<?php
require_once "../config/dbconfig.php";
require_once "../config/utility.php";
require_once 'checkadmin.php';

    $q_data = "select count(payment_id) total_order,
                (select count(product_id) total_product from products where active_status=1) as total_product,
                (select sum(total_amt) sale_amt from payments where delivery_status=1) as sale_amt,
                (select sum(number_of_stock) total_price from products where active_status=1) as total_stock,
                (select count(c_id) total_category from categories where status=1) as total_category
            from payments where delivery_status = 0 and cancel_status=0;";
    $result = mysqli_query($conn,$q_data);
    $data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'head.php' ?>
    <title>DashBoard</title>
</head>

<body>
    <div class="main_container">
        <?php 
        $page_title='dashboard';
        require_once 'admin_nav.php'; ?>
        <div class="container">
            <div class="dashboard_cards">
                <div class="dashhboard_card lightblue_card">
                    <h1 class="d_card_number"><?php if(isset($data['total_product'])){
                        echo $data['total_product'];
                    }else{
                        echo 0;
                    } ?></h1>
                    <p class="d_card_title">Number of Product</p>
                </div>
                <div class="dashhboard_card pink_card">
                    <h1 class="d_card_number"><?php if(isset($data['total_stock'])){
                        echo $data['total_stock'];
                    }else{
                        echo 0;
                    } ?></h1>
                    <p class="d_card_title">Number of Stocks</p>
                </div>
                <div class="dashhboard_card purple_card">
                    <h1 class="d_card_number"><?php if(isset($data['total_category'])){
                        echo $data['total_category'];
                    }else{
                        echo 0;
                    } ?></h1>
                    <p class="d_card_title">Number of Category</p>
                </div>
                <div class="dashhboard_card blue_card">
                    <h1 class="d_card_number"><?php if(isset($data['total_order'])){
                        echo $data['total_order'];
                    }else{
                        echo 0;
                    } ?></h1>
                    <p class="d_card_title">Pending Order</p>
                </div>
                <div class="dashhboard_card green_card">
                    <h1 class="d_card_number">Rs. <?php if(isset($data['sale_amt'])){
                        echo $data['sale_amt'];
                    }else{
                        echo 0;
                    } ?></h1>
                    <p class="d_card_title">Total Sales(Rs)</p>
                </div>
            </div>

        </div>
    </div>
</body>

</html>