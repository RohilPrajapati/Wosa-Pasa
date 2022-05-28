<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../assets/component/head.php" ?>
    <title>Payment Successfull</title>
</head>
<body>
    

<?php
require_once "../config/dbconfig.php";
require_once "../config/utility.php";
if ($_GET && isset($_REQUEST["refId"])) {
    //Fetch record with respect to payment request id
    $sql = "Select * from payments where total_amt = "
        . $_REQUEST['amt'] . " AND payment_uid = '" . $_REQUEST['oid']
        . "' AND payment_status = 0";

    $result = mysqli_query($conn, $sql);
    $purchaseData = mysqli_fetch_assoc($result);

    if ($purchaseData) {
        $url = "https://uat.esewa.com.np/epay/transrec";
        $data = [
            'amt' => $purchaseData["total_amt"],
            'rid' => $_REQUEST["refId"],
            'pid' => $purchaseData["payment_uid"],
            'scd' => 'EPAYTEST'
        ];
        // print_r($data); exit;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        if (strpos($response, "Success") !== false) {
            //Need to update the database with the transaction reference id
            $sql = "Update payments set transaction_id = '" 
            . $_REQUEST['refId']."', payment_status = 1 
            where payment_uid = '" .$purchaseData["payment_uid"]."'" ;
            if(mysqli_query($conn, $sql)) {
                echo "<div class='trasaction_success'>Transaction completed successfully</div>";
                echo "Order have been placed";
                header("refresh:3;url=/myorder.php");
            } else {
                echo "<div class='trasaction_fail'>Some problem occurred while saving the request in our end. Please contact the administrator.</div>";
            }
        } else {
            echo "<div class='trasaction_fail'>Error occurred while performing the transaction. Please contact the administrator.</div>";
        }
    } else {
        echo "<div class='trasaction_fail'>Invalid request.</h2></div>";
        exit;
    }
}
?>
<!-- <div class="trasaction_success">
    Hello
</div> -->

</body>
</html>