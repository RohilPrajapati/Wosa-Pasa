<?php require_once '../config/dbconfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'head.php' ?>
    <title>DashBoard</title>
</head>
<body>
    <div class="main_container">
        <?php require_once 'admin_nav.php'; ?>
        <div class="container">
            <input type="button" onclick="window.location.href='addUser.php'" value="Add Admin User" class="btn">
            <h1 class="header">User list</h1>
                <table>
                    <tr>
                        <th>Serial Number</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Is Admin</th>
                    </tr>
                    <?php 
                        $q_fetch_msg = "SELECT * FROM users";
                        $result = mysqli_query($conn,$q_fetch_msg);
                        $i = 1;
                        ;
                        // print_r($msg)
                        while($user = mysqli_fetch_array($result)) 
                        { 
                        ?> 
                        <tr>
                            <td><?php echo $i ?></td> 
                            <td><?php echo $user['username']; ?></td> 
                            <td><?php echo $user['email']; ?></td> 
                            <td><?php if($user['is_admin']){echo "True";}else{echo "False";} ?></td> 
                        </tr> 
                    <?php 
                        $i++;   
                        } 
                        $conn.close();
                    ?> 
            </table>
        </div>
    </div>
</body>
</html>