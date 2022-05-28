<?php
require_once '../auth_user.php';
require_once '../config/dbconfig.php';
require_once '../config/utility.php';
if (isset($_GET['amt']) and isset($_GET['pid'])) {
    $amt = $_GET['amt'];
    $p_id = $_GET['pid'];
    $q_payment = "select * from payments where payment_uid = '$p_id'";
    $result = mysqli_query($conn, $q_payment);
    $payment = mysqli_fetch_assoc($result);
    if ($payment['payment_method'] == 'Cash') {
        $q_update = "UPDATE payments set payment_method = 'esewa' where payment_uid = '$p_id'";
        if (mysqli_query($conn, $q_update)) {
            pay_esewa($amt, $p_id);
        }
    } else {
        pay_esewa($amt, $p_id);
    }
}
