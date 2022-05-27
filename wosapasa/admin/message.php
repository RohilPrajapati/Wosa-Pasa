<?php 
    require_once 'checkadmin.php';
    require_once '../config/dbconfig.php';
    require_once '../config/utility.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'head.php' ?>
    <title>DashBoard</title>
</head>
<body>
    <div class="main_container">
        <?php 
            $page_title = 'feedback';
            require_once 'admin_nav.php'; 
        ?>
        <div class="container">
            <h1 class="header">Messages </h1>
            <?php 
                $q_feeback = "SELECT * from feedbacks inner join users on feedbacks.user_id = users.user_id order by fb_id desc";
                $result = mysqli_query($conn,$q_feeback);
                while($feedback = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="feedback_card">
                        <h3><?= $feedback['title'] ?></h3>
                        <p><?= $feedback['message'] ?></p>
                        <div class="left_align">
                            - <?= $feedback['username'] ?>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</body>
</html>