<?php 
    require_once '../config/dbconfig.php'; 
    require_once 'checkadmin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'head.php' ?>
    <title>User</title>
</head>
<body>
    <div class="main_container">
        <?php 
        $page_title='user';
        require_once 'admin_nav.php'; ?>
        <div class="container">
            <input type="button" onclick="window.location.href='addAdminUser.php'" value="Add Admin User" class="btn">
            
            <?php 
                        if (!isset ($_GET['page']) ) {  
                            $page = 1;  
                        } else {  
                            $page = $_GET['page'];  
                        }  

                        $results_per_page =10;

                        $page_first_result = ($page-1) * $results_per_page; 
                        $i = $page_first_result+1;

                        $q_fetch_msg = "SELECT * FROM users";
                        $result = mysqli_query($conn, $q_fetch_msg);  
                        $number_of_result = mysqli_num_rows($result); 
                         

                        $number_of_page = ceil ($number_of_result / $results_per_page);
                        if($page >$number_of_page){
                            echo "
                                <div class='server_error'>
                                    Invalid Page number !
                                </div>
                            ";
                        }else{
                        
                        
                         
                        $q_paginated_fetch = "SELECT * FROM users LIMIT ".$page_first_result . ',' . $results_per_page;  
                        $result = mysqli_query($conn, $q_paginated_fetch); 
                        ?>
                <h1 class="header">User list</h1>
                <table>
                    <tr>
                        <th>Serial Number</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Is Admin</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        // print_r($msg)
                        while($user = mysqli_fetch_array($result)) 
                        { 
                        ?> 
                        <tr>
                            <td><?php echo $i ?></td> 
                            <td><?php echo $user['username']; ?></td> 
                            <td><?php echo $user['email']; ?></td> 
                            <td><?php if($user['is_admin']){echo "True";}else{echo "False";} ?></td>
                            <td><?php if($user['status']){echo "True";}else{echo "False";} ?></td>
                            <td>
                                <?php
                                    if($user['is_admin']){
                                ?>
                                    <a class="danger_btn" href="updateAdminUser.php/?id=<?= $user['user_id'] ?> " onclick="return confirm('Are you sure u want to remove admin ?')">Remove Admin</a>
                                <?php
                                    }else{
                                        ?>
                                        <a class="primary_btn" href="updateAdminUser.php/?id=<?= $user['user_id'] ?>" onclick="return confirm('Are you sure u want to make user admin ?');">Make Admin</a>
                                        <?php
                                    }
                                ?>
                                <?php
                                    if($user['status']){
                                ?>
                                    <a class="danger_btn" href="updateStatusUser.php/?id=<?= $user['user_id']  ?>" onclick="return confirm('Are you sure u want to disable user ?')">Disable</a>
                                <?php
                                    }else{
                                        ?>
                                        <a class="success_btn" href="updateStatusUser.php/?id=<?= $user['user_id'] ?>" onclick="return confirm('Are you sure u want to enable user ?')">Enable</a>
                                        <?php
                                    }
                                ?>
                            </td>
                        </tr> 
                    <?php 
                        $i++;   
                        }
                    
                        $conn->close(); 
                    ?> 
            </table>
            <?php
            $page_num = 1;

            if($number_of_result > $results_per_page ){
                while($page_num<=$number_of_page){
                    echo "<a class='pagination_btn' href = 'users.php?page=$page_num'>$page_num</a>"; 
                    $page_num++; 
                }
            }

        }

        ?>
        </div>
    </div>
</body>
</html>