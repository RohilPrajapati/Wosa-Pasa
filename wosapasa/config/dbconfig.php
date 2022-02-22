<?php
    $conn = mysqli_connect('localhost','root','prajapati','wosapasa');
    if($conn->connect_error){
        die("cant connect to db". $conn->connect_error);
    }
    else{
        // echo "success";
    }
?>