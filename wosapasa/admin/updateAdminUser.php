<?php
    require_once 'checkadmin.php';
    require_once '../config/dbconfig.php'; 
    require_once '../config/utility.php'; 
    if(isset($_REQUEST['id'])){
        $id= $_REQUEST['id'];
        $user = fetch_user($id,$conn);
        if($user['is_admin']==1){
            $q_update = "UPDATE users SET is_admin = 0 WHERE user_id = '$id'";
            $title = "You have been remove from Admin.";
            $msg = "Sorry, you are not admin anymore<br>
            from <br>
            Wosa: Pasa:
            
            ";
            send_mail($user['email'],$title,$msg);
        }else{
            $title = "You have been promoted to Admin.";
            $msg = "Sorry, you are admin in Wosa: Pasa:<br>
            From<br>
            Wosa: Pasa:
            ";
            send_mail($user['email'],$title,$msg);
            $q_update = "UPDATE users SET is_admin = 1 WHERE user_id = '$id'";
        }
        $result = mysqli_query($conn,$q_update);
        $conn->close();
        header("refresh:0;url=/admin/users.php");
    }
?>