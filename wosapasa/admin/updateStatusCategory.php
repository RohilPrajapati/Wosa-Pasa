<?php
    require_once 'checkadmin.php';
    require_once '../config/dbconfig.php'; 
    require_once '../config/utility.php';
    if(isset($_GET['id'])){
        $c_id = $_REQUEST['id'];
        $q_category = "SELECT * from categories where c_id = '$c_id'";
        $result = mysqli_query($conn,$q_category);
        $category = mysqli_fetch_assoc($result);
        if($category['status']==1){
            $q_update = "UPDATE categories SET status = 0 WHERE c_id = '$c_id'";
        }else{
            $q_update = "UPDATE categories SET status = 1 WHERE c_id = '$c_id'";
        }
        $result = mysqli_query($conn,$q_update);
        $conn->close();
        header("refresh:0;url=/admin/category.php");
    }else{
        echo "Invalid URL";
    }
?>