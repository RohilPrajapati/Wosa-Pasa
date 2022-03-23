<link rel="stylesheet" href="/assets/css/main.css">
<?php
    include '../config/utility.php';
    session_start();    
    if(isset($_SESSION['id'])){
        session_unset();
        session_destroy();
        echo "
            <div class='server_success'>
                logout success full
            </div>
        ";
        header("refresh:3;url=../index.php");
    }
    else{
        echo "You are not login!";
    }
?>