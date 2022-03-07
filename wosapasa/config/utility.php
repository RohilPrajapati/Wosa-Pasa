<?php
    require "dbconfig.php";
    function redirectAlertMessage($msg,$url){
        echo "
            <script>
                alert('$msg');;
            </script>
        ";
        header('refresh:0;url= '.$url);
    }
    // function isAdmin(){
    //     if(!isset($_SESSION['id'])){
    //         echo "Unauthorized request !!";
    //         echo "login first to access page";
    //         echo "<a href='/account/login.php'>Go back to login</a>";
    //     }
    // }
    // function isAuthenticated(){
    //     if(!isset($_SESSION['admin'])){
    //         echo "Unauthorized request !!";
    //         echo "<a href='/account/login.php'>Go back to login</a>";
    //     }
    // }
?>