<?php
require_once 'auth_user.php';
require_once 'config/dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once 'assets/component/head.php';
    ?>
    <title>Product Buy Form</title>
</head>

<body>
    <?php
    require_once 'assets/component/topnav.php';
    ?>
    <div class="container">

        <?php
        if (isset($_POST['quickBuy'])) {
            $p_id = $_POST['product_id'];
            $q_select_item = "SELECT * from products where product_id ='$p_id'";

            $result = mysqli_query($conn, $q_select_item);
            // echo $conn->error;
            if (mysqli_num_rows($result) == 0) {
                die("Invalide Request.");
            } else {
                $i = 1;
                $total = 0;
        ?>

                <form action="" method="post" class="order_form">
                    <h1>Order Form</h1>
                    <div class="order_input_row">
                        <label for="" class="delivery_label">Name <span class="error">*</span> :</label>
                        <input type="text" class="inputBox_order" placeholder="Name of Customer">
                    </div>

                    <div class="order_input_row">
                        <label for="" class="delivery_label">Address <span class="error">*</span> :</label>
                        <input type="text" class="inputBox_order" placeholder="Delivery Address">
                    </div>

                    <div class="order_input_row">
                        <label for="" class="delivery_label"> Phone Number<span class="error">*</span> :</label>
                        <input type="text" class="inputBox_order" placeholder="Phone number"><br>
                    </div>

                    <input type="hidden" name="stock" value="<?= $_POST['stock'] ?>">
                    <div class="order_items">
                        <h3>Order-item-list</h3>
                        <?php while ($product = mysqli_fetch_assoc($result)) { ?>
                            <div class="order_item">
                                <img class="order_item_img" src="assets/image/upload/<?= $product['image'] ?>" alt="">
                                <div class="order_item_text">
                                    <h3 class="order_item_title"><?= $product['title'] ?></h3>
                                    <p class="order_item_desc"><?= $product['description'] ?></p>
                                    <div>
                                        <label for="" class="order_label">Stock :</label>
                                        <?= $_POST['stock'] ?>
                                    </div>
                                    <div class="order_div">
                                        <div>
                                            <label for="">Quantity :</label>
                                            <?= $_POST['qty'] ?>
                                            <input name="qty" type="hidden" value="<?= $_POST['qty'] ?>">
                                        </div>
                                        <span class="offer-price"> Rs. <?= $product['price'] ?></span>
                                    </div>
                                </div>
                            </div>

                        <?php
                            $total = $total + ($_POST['qty'] * $product['price']);
                        }
                        ?>
                        <input type="hidden" name="total" value="<?= $total ?>">
                        
                    </div>
                    <div class="order_row">
                        <span class="">Payment Method :</span>
                        <input class="radio_btn_order" type="radio" name= "payment_method" value="esewa">
                        <input class="payment_logo" name="payment Method" type="image" src="assets/image/esewa-img.png" alt="e-Sewa Logo" value="esewa">
                        <input class="radio_btn_order" type="radio" name= "payment_method" value="esewa">
                        <label for="CashInDelivery" class="payment_method_txt">Cash in Delivery</label>
                    </div>
                    <div class="order_div">
                            <span class="total_price">Total Amount = Rs. <?= $total ?> </span>
                            <input type="submit" class="buy_btn order_btn" Value="Buy">
                        </div>
                </form>
        <?php
            }
        } else {
            echo "
            <div class='server_error'>
            Invalid Request
            </div>
            ";
        }
        ?>
    </div>
</body>

</html>