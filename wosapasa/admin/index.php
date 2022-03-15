<?php
session_start();
if($_SESSION['id']){
    header("location:/admin/dashboard.php");
}else{
    header("location:/admin/login.php");
}

?>