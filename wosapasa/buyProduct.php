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
        if (isset($_POST['quickBuy']) && $_POST['quickBuy']==1) {
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
                

                <form action="insert_order_payment.php" id="orderForm" method="post" class="order_form" onsubmit="event.preventDefault(); validateOrderForm();">
                    <h1>Order Form</h1>
                    <div class="order_input_row">
                        <label for="" class="delivery_label">Name <span class="error">*</span> :</label>
                        <input type="text" name="name" class="inputBox_order" id="name" placeholder="Name of Customer" value="<?= $user['username'] ?>">
                    </div>
                    <div class="error" id="nameError"></div>
                    
                    <div class="order_input_row">
                        <label for="" class="delivery_label">Address <span class="error">*</span> :</label>
                        <input type="text" id="address" name="delivery_address" class="inputBox_order" placeholder="Delivery Address">
                    </div>
                    <div class="error" id="addressError"></div>
                    
                    <div class="order_input_row">
                        <label for="" class="delivery_label"> Phone Number<span class="error">*</span> :</label>
                        <input type="text" id="phone_no" name="phone_no" class="inputBox_order" placeholder="Phone number"><br>
                    </div>
                    <div class="error" id="phoneError"></div>

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
                                        <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
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
                        <img class="payment_logo" name="payment_method" type="image" src="assets/image/esewa-img.png" alt="e-Sewa Logo" value="esewa">
                        <input class="radio_btn_order" type="radio" name= "payment_method" value="Cash" checked="checked">
                        <label for="CashInDelivery" class="payment_method_txt" >Cash in Delivery</label>
                    </div>
                    <div class="order_div">
                            <span class="total_price">Total Amount = Rs. <?= $total ?> </span>
                            <span><a href="/detailview.php/?p_id=<?= $p_id ?>" class="danger_btn link_btn">Cancel</a>
                            <input type="submit" class="buy_btn order_btn" value="Buy">
                            </span>
                        </div>
                </form>
        <?php
            }
        }else if(isset($_REQUEST['cart_status']) && $_REQUEST['cart_status']==1){
            $q_select_item = "SELECT * from carts inner join products on carts.product_id = products.product_id where user_id =".$_SESSION['id'];
            $result = mysqli_query($conn, $q_select_item);
            // echo $conn->error;
            if (mysqli_num_rows($result) == 0) {
                die("Invalide Request.");
            } else {
                $i = 1;
                $total = 0;
        ?>
                <form action="/cart_order_payment.php" id="orderForm" method="post" class="order_form" onsubmit="event.preventDefault(); validateOrderForm();">
                    <h1>Order Form</h1>
                    <div class="order_input_row">
                        <label for="" class="delivery_label">Name <span class="error">*</span> :</label>
                        <input type="text" name="name" class="inputBox_order" id="name" placeholder="Name of Customer" value="<?= $user['username'] ?>">    
                    </div>
                    <div class="error" id="nameError"></div>
                    
                    <div class="order_input_row">
                        <label for="" class="delivery_label">Address <span class="error">*</span> :</label>
                        <input type="text" id="address" name="delivery_address" class="inputBox_order" placeholder="Delivery Address">
                    </div>
                    <div class="error" id="addressError"></div>
                    
                    <div class="order_input_row">
                        <label for="" class="delivery_label"> Phone Number<span class="error">*</span> :</label>
                        <input type="text" id="phone_no" name="phone_no" class="inputBox_order" placeholder="Phone number"><br>
                    </div>
                    <div class="error" id="phoneError"></div>

                    <input type="hidden" name="stock" value="<?= $_POST['stock'] ?>">
                    <div class="order_items">
                        <h3>Order-item-list</h3>
                        <?php while ($product = mysqli_fetch_assoc($result)) { ?>
                                <!-- <pre>
                                    <?php print_r($product); ?>
                                </pre> -->
                            <div class="order_item">
                                <img class="order_item_img" src="assets/image/upload/<?= $product['image'] ?>" alt="">
                                <div class="order_item_text">
                                    <h3 class="order_item_title"><?= $product['title'] ?></h3>
                                    <p class="order_item_desc"><?= $product['description'] ?></p>
                                    <div>
                                        <label for="" class="order_label">Stock :</label>
                                        <?= $product['number_of_stock'] ?>
                                    </div>
                                    <div class="order_div">
                                        <div>
                                            <label for="">Quantity :</label>
                                            <?= $product['quantity'] ?>
                                            <!-- <input name="qty" type="hidden" value="<?= $product['quantity'] ?>"> -->
                                        </div>
                                        <span class="offer-price"> Rs. <?= $product['price'] ?></span>
                                        <!-- <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>"> -->
                                    </div>
                                </div>
                            </div>

                        <?php
                            $total = $total + ($product['quantity'] * $product['price']);
                        }
                        ?>
                        <input type="hidden" name="total" value="<?= $total ?>">
                        
                    </div>
                    <div class="order_row">
                        <span class="">Payment Method :</span>
                        <input class="radio_btn_order" type="radio" name= "payment_method" value="esewa">
                        <img class="payment_logo" name="payment_method" type="image" src="assets/image/esewa-img.png" alt="e-Sewa Logo" value="esewa">
                        <input class="radio_btn_order" type="radio" name= "payment_method" value="Cash" checked="checked">
                        <label for="CashInDelivery" class="payment_method_txt" >Cash in Delivery</label>
                    </div>
                    <div class="order_div">
                            <span class="total_price">Total Amount = Rs. <?= $total ?> </span>
                            <span><a href="/cart.php" class="danger_btn link_btn">Cancel</a>
                            <input type="submit" class="buy_btn order_btn" value="Buy">
                            </span>
                        </div>
                </form>
        <?php
            }
        }
        else {
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