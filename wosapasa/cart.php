<?php
require_once 'config/dbconfig.php';
require_once 'config/utility.php';
require_once './auth_user.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'assets/component/head.php' ?>
    <title>Cart</title>
</head>

<body>
    <?php
    $page = "cart";
    require_once 'assets/component/topnav.php'
    ?>
    <div class="container">
        <h1>Cart Item</h1>
        <?php
        $id = $_SESSION['id'];
        $q_cart = "SELECT * from carts inner join products on carts.product_id = products.product_id where user_id = '$id'";
        $result = mysqli_query($conn, $q_cart);
        $total = 0;
        if (mysqli_num_rows($result) == 0) {
        ?>
            <h2 class="sever_msg">No Item in Cart</h2>
        <?php
        } else { ?>

            <div class="carts">
                <?php
                while ($cart_product = mysqli_fetch_assoc($result)) {
                ?>

                    <div class="cart">
                        <img class="cart_img" src="assets/image/upload/<?= $cart_product['image'] ?>" alt="">
                        <div class="cart_text">
                            <h3 class="cart_product_title"><?= $cart_product['title'] ?></h3>
                            <p><?= $cart_product['description'] ?></p>
                            <div class="cart_price">
                                <span>Quantity: <?= $cart_product['quantity'] ?></span>
                                <span class="offer-price"> Rs. <?= $cart_product['price'] ?></span>
                            </div>
                        </div>
                        <div class="cart_action">
                            <a href="detailview.php?p_id=<?= $cart_product['product_id'] ?>" class="cart_btn primary_btn">View Product</a>
                            <a href="deleteCartItem.php?cart_id=<?= $cart_product['cart_id'] ?>" class="cart_btn danger_btn">Remove</a>
                        </div>
                    </div>
                    <?php $total = $total + ($cart_product['price'] * $cart_product['quantity']) ?>

                <?php
                }
                ?>
            </div>
            <div class="cart_all_action">
                <span class="offer-price">
                    Total Amount : <?= $total ?>
                </span>
                <a href="/removeAllCart.php" class="danger_btn cart_all_action_btn">Remove All</a>
                <form action="buyProduct.php" class="cart_buy_form" method="POST">
                    <input type="hidden" name="cart_status" value ="1">
                    <input type="submit" class="buy_btn cart_form_btn" value="Buy All">
                </form>
            </div>
        <?php
        }
        ?>

    </div>
</body>

</html>