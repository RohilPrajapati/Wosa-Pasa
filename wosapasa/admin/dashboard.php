<?php
require_once "../config/dbconfig.php";
require_once "../config/utility.php";
require_once 'checkadmin.php'
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
                    <h1 class="d_card_number">11</h1>
                    <p class="d_card_title">Number of Product</p>
                </div>
                <div class="dashhboard_card pink_card">
                    <h1 class="d_card_number">11</h1>
                    <p class="d_card_title">Number of Stocks</p>
                </div>
                <div class="dashhboard_card purple_card">
                    <h1 class="d_card_number">11</h1>
                    <p class="d_card_title">Number of Category</p>
                </div>
                <div class="dashhboard_card blue_card">
                    <h1 class="d_card_number">11</h1>
                    <p class="d_card_title">Pending Order</p>
                </div>
                <div class="dashhboard_card green_card">
                    <h1 class="d_card_number">Rs. 110,000</h1>
                    <p class="d_card_title">Total Sales(Rs)</p>
                </div>
            </div>

        </div>
    </div>
</body>

</html>