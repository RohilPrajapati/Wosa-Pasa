<?php
    require_once 'auth_user.php';
    require_once 'config/dbconfig.php';
    require_once './auth_user.php';
    $user_id = $_SESSION['id'];
    $q_cart = "SELECT * from carts where user_id = '$user_id'";
    if(mysqli_query($conn,$q_cart)){
        $q_delete_cart_item = "DELETE from carts where user_id='$user_id'";
        if(mysqli_query($conn,$q_delete_cart_item)){
        echo "
            <div class='server_success'>
                Deleted cart all items
            </div>
        ";
            header("refresh:1;url=cart.php");
        }else{
            echo "
            <div class='server_error'>
                Fail to delete cart all items.
            </div>
            ";
        }
    }else{
        echo "
            <div class='server_error'>
                Request Fail.
            </div>
            ";
    }
?>