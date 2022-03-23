<?php 
    require_once '../config/dbconfig.php';
    require_once '../config/utility.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $page = 'profile';
        require_once '../assets/component/head.php'; 
        session_start();
        $id = $_SESSION['id'];
        $user = fetch_user($id,$conn);
    ?>
    <title><?= $user['username'] ?></title>
</head>
<body>
    
    <?php require_once '../assets/component/topnav.php'; ?>
    <div class="container">
        <div class="profile_row">
            <div class="col_6">
                <h1>Hello <?= $user['username'] ?>, welcome to wosa: pasa: comming soon!</h1>
            </div>
            <div class="col_4 profile_side_panel">
            <?php if($user['is_admin']==1){
                ?>
                    <a href="/admin/dashboard.php" class="side_panel_link">
                        <div class="side_panel_item">
                            Admin Dashboard
                        </div>
                    </a>
                <?php 
                    }
                ?>
                <a href="#" class="side_panel_link">
                    <div class="side_panel_item">
                        My Feedbacks
                    </div>
                </a>
                <a href="/account/logout.php" class="side_panel_link">
                    <div class="side_panel_item">
                        Logout
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>