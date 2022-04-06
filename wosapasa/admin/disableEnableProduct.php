<?php
    require_once "../config/dbconfig.php";
    require_once "../config/utility.php";
    require_once 'checkadmin.php';

    if(isset($_GET['id'])){
        $id = $_REQUEST['id'];
        // echo $id;
        $q_product = "SELECT * from products where product_id = '$id'";
        $result = mysqli_query($conn,$q_product);
        if(mysqli_num_rows($result)>0){
            $product = mysqli_fetch_assoc($result);
            if($product['active_status']==1){
                $q_update = "UPDATE products SET active_status = 0 WHERE product_id = '$id'";
                mysqli_query($conn,$q_update);
                header("refresh:0;url=product.php");
            }else{
                $q_update = "UPDATE products SET active_status = 1 WHERE product_id = '$id'";
                mysqli_query($conn,$q_update);
                header("refresh:0;url=disableProduct.php");
            }
            
        }else{
            echo "No record found";
        }
    }
    $conn->close();
