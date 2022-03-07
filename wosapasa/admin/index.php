<?php
session_start();
if($_SESSION['id']){
    echo "you are login";
}else{
    header("location:/admin/login.php");
}

?>