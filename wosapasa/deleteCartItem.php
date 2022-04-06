<?php
    require_once 'auth_user.php';
    require_once 'config/dbconfig.php';
    if(isset($_GET['cart_id'])){
        $cart_id = $_REQUEST['cart_id'];
        $user_id = $_SESSION['id'];
        $q_cart = "SELECT * from carts where cart_id = '$cart_id' and user_id = '$user_id'";
        if(mysqli_query($conn,$q_cart)){
            $q_delete_cart_item = "DELETE from carts where cart_id='$cart_id'";
            if(mysqli_query($conn,$q_delete_cart_item)){
            echo "
                <div class='server_success'>
                    Deleted Cart Item
                </div>
            ";
                header("refresh:1;url=cart.php");
            }else{
                echo "
                <div class='server_error'>
                    Fail to Delete cart Item.
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
    }
?>