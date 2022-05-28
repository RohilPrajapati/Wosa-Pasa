<link rel="stylesheet" href="assets/css/main.css">
<?php
    require_once 'config/dbconfig.php';
    require_once './auth_user.php';
    if($_GET['id']){
        $q_delete_feedback = "DELETE from feedbacks where fb_id = ".$_GET['id'];
        if(mysqli_query($conn,$q_delete_feedback)){
            echo "
                <div class='server_success'>
                    Feedback has been deleted
                </div>
            ";
            header("refresh:3;url=myfeedback.php");
        }else{
            echo "
                <div class='server_success'>
                    Feedback delete failed
                </div>
            ";
            header("refresh:3;url=myfeedback.php");
        }
    }
?>