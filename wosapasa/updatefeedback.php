<?php 
    session_start();
    require_once './config/dbconfig.php';
    require_once './config/utility.php';
    require './auth_user.php';
    if($_POST){
        $title = $_REQUEST['title'];
        $msg = $_REQUEST['message'];
        $user_id = $_REQUEST['user_id'];
        $fb_id = $_REQUEST['fb_id'];
        // echo $title;
        // echo $msg;
        // echo $user_id;
        // die();

        $q_insert_feedback = "UPDATE feedbacks set title = '$title', message = '$msg' where fb_id = '$fb_id' and user_id = '$user_id'";
        if(mysqli_query($conn,$q_insert_feedback)){
            echo "<div class='server_success'>Feedback has been Updated</div>";
            header("refresh:2;url=myfeedback.php");
        }else{
            echo "<div class='server_success'>fail to submit the feedback</div>";
            header("refresh:2;url=myfeedback.php");
        }

    }
    else if(isset($_GET['id'])){
        $f_id = $_GET['id'];
        $q_feedback = "SELECT * from feedbacks where fb_id = '$f_id'";
        $result = mysqli_query($conn,$q_feedback);
        $feedback = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'assets/component/head.php' ?>
    <title>Update Feedback</title>
</head>
<body>
    <?php require_once 'assets/component/topnav.php' ?>
    <div class="container">
        <h1 class="header">Update Feedback</h1>
        <form action="" method="post" class="feedback_form" >
            <input name="user_id" type="hidden" value="<?= $_SESSION['id'] ?>"><br>
            <input name="fb_id" type="hidden" value="<?= $f_id ?>"><br>
            <input class="feedback_input" name="title" type="text" placeholder="Title/Issue" value="<?= $feedback['title'] ?>"><br>
            <textarea class="feedback_textarea" name="message" id="" placeholder = "Describe Message"><?= $feedback['message'] ?></textarea><br>
            <input class="btn" type="submit" value="Update Feedback">
            <input class="btn" type="button" value="Cancel" onclick="window.location.href='/myfeedback.php'">
        </form>
    </div>
</body>
</html>
<?php
    }else{
        echo "Invalide request";
    }
?>