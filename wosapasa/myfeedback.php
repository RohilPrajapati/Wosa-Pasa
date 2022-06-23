<?php 
    require_once 'config/dbconfig.php';
    require_once 'config/utility.php';
    require_once './auth_user.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $page = 'profile';
        require_once 'assets/component/head.php'; 
        session_start();
        $id = $_SESSION['id'];
        $user = fetch_user($id,$conn);
        $q_feedback = "SELECT * from feedbacks where user_id =". $user['user_id'];
        $result = mysqli_query($conn,$q_feedback);
    ?>
    <title><?= $user['username'] ?></title>
</head>
<body>
    <?php require_once 'assets/component/topnav.php'; ?>
    <div class="container">
        <div class="profile_row">
            <div class="col_6">
                <div class="feedback_content">
                    <h1>My Feedback</h1>
                    <div class="feedback_card_action">
                        <a href="feedback.php" class="btn feedback_btn">Add New Feedback</a>
                    </div>
                    <?php 
                    if(mysqli_num_rows($result)!=0){
                    while($feedback = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="feedback_card">
                        <h3><?= $feedback['title'] ?></h3>
                        <p><?= $feedback['message'] ?></p>
                        <div class="feedback_card_action">
                            <a class="primary_btn feedback_btn" href="/updatefeedback.php?id=<?= $feedback['fb_id'] ?>">Update</a>
                            <a class="danger_btn feedback_btn" href="/deletefeedback.php?id=<?= $feedback['fb_id'] ?>" onclick="return confirm('Confirm you want to delete Feedback ?')">Delete</a>
                        </div>
                    </div>
                    <?php
                    }
                }else{
                    echo "No Result Found";
                }
                    ?>
                </div>
            </div>
            <?php
                require_once 'assets/component/sidebar_profile.php'
            ?>
        </div>
    </div>
</body>
</html>