<link rel="stylesheet" href="/assets/css/main.css">
<?php
require_once 'auth_user.php';
require_once 'config/dbconfig.php';
require_once 'config/utility.php';
if ($_POST) {
    $name = addslashes($_REQUEST['name']);
    $delivery_address = addslashes($_REQUEST['delivery_address']);
    $phone_no = addslashes($_REQUEST['phone_no']);
    $total = addslashes($_REQUEST['total']);
    $payment_method = addslashes($_REQUEST['payment_method']);
    date_default_timezone_set("Asia/Kathmandu");
    $date = date("Y/m/d");
    $payment_uid = "WP" . date("Ymdhis");
    $q_insert_partial_payment = "INSERT INTO payments (total_amt,payment_uid,payment_date,delivery_address,phone_no,payment_method,payment_by,user_id) values('$total','$payment_uid','$date','$delivery_address','$phone_no','$payment_method','$name','$user_id')";
    if (mysqli_query($conn, $q_insert_partial_payment)) {
        $q_payment = "SELECT * from payments order by payment_id desc limit 1";
        $result = mysqli_query($conn, $q_payment);
        $payment = mysqli_fetch_assoc($result);
        $q_cart = "select * from carts where user_id = '$user_id'";
        $result = mysqli_query($conn, $q_cart);
        $order_status = 1;
        while ($cart = mysqli_fetch_assoc($result)) {
            $q_product = "SELECT * FROM products where product_id =" . $cart['product_id'];
            $r_product = mysqli_query($conn, $q_product);
            $product = mysqli_fetch_assoc($r_product);
            $q_insert_order_item = "INSERT INTO orders (quantity,price,product_id,payment_id,user_id) values ('" . $cart['quantity'] . "','" . $product['price'] . "','" . $cart['product_id'] . "','" . $payment['payment_id'] . "','" . $_SESSION['id'] . "')";
            if ($product['number_of_stock'] > $qty) {
                if (mysqli_query($conn, $q_insert_order_item)) {
                    $stock = $product['number_of_stock'] - $qty;
                    $q_update_product = "UPDATE products SET number_of_stock = '$stock' where product_id = '$product_id'";
                    if (mysqli_query($conn, $q_update_product)) {
                    } else {
                        $order_status = 0;
                    }
                } else {
                    $order_status = 0;
                }
            } else {
                $order_status = 0;
            }
        }
        if ($order_status == 1) {
            $q_delete_cart = "DELETE FROM carts WHERE user_id = '$user_id';";
            if (mysqli_query($conn, $q_delete_cart)) {
                if ($payment_method == 'esewa') {
                    pay_esewa($total, $payment_uid);
                    order_mail($conn,$payment_uid,$user['email']);
                } else {
                    echo "<div class='server_success'>Order Have been placed</div>";
                    order_mail($conn,$payment_uid,$user['email']);
                    header("refresh:3;url=/myorder.php");
                }
            }
        } else {
            $q_cancel_order = "DELETE FROM orders WHERE payment_id  = '" . $payment['payment_id'] . "';";
            if (mysqli_query($conn, $q_cancel_order)) {
                $q_delete_payment = "DELETE FROM payments WHERE payment_id  = '" . $payment['payment_id'] . "';";
                if (mysqli_query($conn, $q_delete_payment)) {
                    echo "Order is not placed ! Please Try again";
                }
            }
        }
    }
}
?>