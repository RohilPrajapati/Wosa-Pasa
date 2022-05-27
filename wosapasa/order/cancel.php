<link rel="stylesheet" href="../assets/css/main.css">
<?php
    require_once '../auth_user.php';
    require_once '../config/dbconfig.php';
    require_once '../config/utility.php';
    if(isset($_GET['pid'])){
        $pid = $_GET['pid'];
        $q_update = "UPDATE payments set cancel_status = 1 where payment_id = '$pid'";
        if(mysqli_query($conn,$q_update)){
            echo "<div class='server_success'>Order have been successfully Cancel</div>";
            header("refresh:3;url=/myorder.php");
        }else{
            echo "<div class='server_error'>Order has not been Cancel</div>";
            header("refresh:3;url=/myorder.php");
        }
    }
?>