<link rel="stylesheet" href="/assets/css/main.css">
<?php
require_once 'auth_user.php';
require_once 'config/dbconfig.php';
require_once 'config/utility.php';
if ($_POST) {
    $name = addslashes($_REQUEST['name']);
    $delivery_address = addslashes($_REQUEST['delivery_address']);
    $phone_no = addslashes($_REQUEST['phone_no']);
    $stock = addslashes($_REQUEST['stock']);
    $qty = addslashes($_REQUEST['qty']);
    $total = addslashes($_REQUEST['total']);
    $product_id = addslashes($_REQUEST['product_id']);
    $payment_method = addslashes($_REQUEST['payment_method']);
    date_default_timezone_set("Asia/Kathmandu");
    $date = date("Y/m/d");
    $payment_uid = "WP" . date("Ymdhis");
    $q_insert_partial_payment = "INSERT INTO payments (total_amt,payment_uid,payment_date,delivery_address,phone_no,payment_method,payment_by,user_id) values('$total','$payment_uid','$date','$delivery_address','$phone_no','$payment_method','$name','$user_id')";
    if (mysqli_query($conn, $q_insert_partial_payment)) {
        $q_payment = "SELECT * from payments order by payment_id desc limit 1";
        $result = mysqli_query($conn, $q_payment);
        $payment = mysqli_fetch_assoc($result);
        // before adding the product i have to check stock and reduct the stock after the order is placed  !! and send response according ly
        $q_product = "select * from products where product_id = '$product_id'";
        $result = mysqli_query($conn, $q_product);
        $product = mysqli_fetch_assoc($result);

        if ($product['number_of_stock'] >= $qty) {
            $q_insert_order_item = "INSERT INTO orders (quantity,price,product_id,payment_id,user_id) values ('$qty','" . $product['price'] . "','$product_id','" . $payment['payment_id'] . "','" . $_SESSION['id'] . "')";
            if (mysqli_query($conn, $q_insert_order_item)) {
                $stock = $product['number_of_stock'] - $qty;
                $q_update_product = "UPDATE products SET number_of_stock = '$stock' where product_id = '$product_id'";
                if (mysqli_query($conn, $q_update_product)) {
                    if ($payment_method == 'esewa') {
                        pay_esewa($total, $payment_uid);
                        order_mail($conn,$payment_uid,$user['email']);
                    } else {
                        echo "<div class='server_success'>Order Have been placed</div>";
                        order_mail($conn,$payment_uid,$user['email']);
                        header("refresh:4;url=myorder.php");
                    }
                } else {
                    echo "<div class='server_error'>Fail  to update the stock</div>";
                }
            } else {
                echo "<div class='server_error'>Failed to Placed Order</div>";
            }
        } else {
            echo "<div class='server_error'>Out of stock fail to place order</div>";
        }
    } else {
        echo "<div class='server_error'>fail to insert</div>";
        echo $conn->error;
    }
}
