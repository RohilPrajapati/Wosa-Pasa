<?php
    include "../config/dbconfig.php";
    include "../config/utility.php";
    // echo $conn;
    if($_POST){
        $username = $_REQUEST['username'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $h_password = password_hash($password,PASSWORD_DEFAULT);
        // echo $h_password;
        $q_select = "SELECT * FROM user where email='$email'";
        $users = mysqli_query($conn,$q_select);
        if (mysqli_num_rows($users) == 0){
            $q_insert = "INSERT INTO users (username, email, password) VALUES ('$username','$email', '$h_password')";
            if ($result = mysqli_query($conn,$q_insert)){
                echo "User is registered";
            }
            else{
                redirectAlertMessage('Error while inserting:'.$conn->error,'signup.html');
            }
        }else{
            redirectAlertMessage('Email Already Exist !','signup.html');
        }
    }
?>