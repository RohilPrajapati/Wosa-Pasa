<?php 
    session_start();
    require_once '../config/utility.php';
    require_once '../config/dbconfig.php';
    require_once 'checkadmin.php';
    $id = $_SESSION['id']; 
    $user = fetch_user($id,$conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'head.php' ?>
    <title><?=$user['username']?></title>
</head>
<body>
    <div class="main_container">
        <?php 
        $page_title='profile';
        require_once 'admin_nav.php'; ?>
        <div class="container">
            <div class="info">
                    <b>Username : </b>
                    <?= $user['username']; ?><br>
                    <b>E-mail : </b>   
                    <?= $user['email']; ?><br>
                <b>Role:</b> <?php if($user['is_admin']){echo "Admin";}else{"None";} ?>
            </div>
            
        </div>
    </div>
</body>
</html>
<?php
    $conn->close();
?>