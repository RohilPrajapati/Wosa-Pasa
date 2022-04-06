<link rel="stylesheet" href="assets/css/main.css">
<?php
    
    require_once 'auth_user.php';
    require_once 'config/dbconfig.php';
    require_once 'config/utility.php';
    if($_POST){
        $quantity = $_REQUEST['qty'];
        $product_id = $_REQUEST['product_id'];
        $user_id = $_REQUEST['user_id'];
        $q_cart = "SELECT * from carts where product_id = '$product_id' and user_id = '$user_id'";
        $result = mysqli_query($conn, $q_cart);
        if(mysqli_num_rows($result)==0){
            $q_insert_cart = "INSERT INTO carts (product_id,user_id,quantity) values ('$product_id','$user_id','$quantity');";
            if(mysqli_query($conn,$q_insert_cart)){
                echo "
                <div class='server_success'>
                    Product added to cart
                </div>
            ";
                header("refresh:1;url=detailview.php?p_id=".$product_id);
            }
        }else{
            $cart_item = mysqli_fetch_assoc($result);
            if($cart_item['quantity'] != $quantity){
                $cart_id = $cart_item['cart_id'];
                $q_update_cart = "UPDATE carts set quantity = '$quantity' where cart_id = '$cart_id'";
                if(mysqli_query($conn,$q_update_cart)){
                    echo "
                    <div class='server_success'>
                        Product Quantity Update to cart
                    </div>
            ";
                header("refresh:2;url=detailview.php?p_id=".$product_id);
                }
            }else{
                header("refresh:0;url=detailview.php?p_id=".$product_id);
            }
        }
    }
?>