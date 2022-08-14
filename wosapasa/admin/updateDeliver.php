<?php
    require_once 'checkadmin.php';
    require_once '../config/dbconfig.php';
    require_once '../config/utility.php';
if(isset($_GET['id'])){
    $pay_id = $_REQUEST['id'];
    $q_payment = "SELECT * from payments where payment_id = '$pay_id'";
    $result = mysqli_query($conn,$q_payment);
    $payment = mysqli_fetch_assoc($result);
    if($payment['delivery_status']==0){
        // echo "working";
        $q_update = "UPDATE payments SET delivery_status = 1, payment_status = 1 WHERE payment_id = '$pay_id'";
        $result = mysqli_query($conn,$q_update);
        // echo $conn->error;
        header("refresh:0;url=/admin/order.php");
    }else{
        $q_update = "UPDATE payments SET delivery_status = 0 WHERE payment_id = '$pay_id'";
        $result = mysqli_query($conn,$q_update);
        header("refresh:0;url=/admin/orderHistory.php");
    }
    $conn->close();
}else{
    echo "Invalid URL";
}
