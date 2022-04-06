<?php 
    require_once '../config/dbconfig.php';
    require_once '../config/utility.php';
    require_once 'checkadmin.php';
    if(isset($_POST['insert_status'])){
        $c_name = $_REQUEST['name'];
        $upper_name = strtoupper($c_name);
        $q_select_all = "SELECT * from categories where UPPER(name) = '$upper_name'";
        $result = mysqli_query($conn,$q_select_all);
        // echo $result;
        if(mysqli_num_rows($result)==0){
            $q_insert_category = "INSERT INTO categories (name) values ('$c_name');";
            if(mysqli_query($conn,$q_insert_category)){
                echo "
                    <h3 class='server_success'>
                        Category Added
                    </h3>
                ";
                header( "refresh:5;url={$_SERVER['REQUEST_URI']}", true, 303 );
            }else{
                echo "
                    <h3 class='server_error'>
                        Fail to Add category
                    </h3>
                ";
            }
        }else{
            echo "
                <h3 class='server_error'>
                    Category already exist !
                </h3>
            ";
            header("refresh:5;url=category.php");
        }
    }
    if(isset($_POST['update_status'])){
        $c_name = $_REQUEST['name'];
        $id = $_REQUEST['id'];
            $q_update_category = "UPDATE categories SET name = '$c_name' where c_id = '$id'";
            if(mysqli_query($conn,$q_update_category)){
                echo "
                    <h3 class='server_success'>
                        Category updated !
                    </h3>
                ";
                header("refresh:5;url=category.php");
            }else{
                echo "
                    <h3 class='server_error'>
                        Fail to update category
                    </h3>
                ";
                header("refresh:5;url=category.php");
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'head.php' ?>
    <title>Category</title>
</head>
<body>
    <div class="main_container">
        <?php 
        $page_title='category';
        require_once 'admin_nav.php'; ?>
        <div class="container">
                <?php if(isset($_GET['id'])){
                    $id= $_REQUEST['id'];
                    $q_category = "SELECT * from categories where c_id = '$id'";
                    $result = mysqli_query($conn,$q_category);
                    $category = mysqli_fetch_assoc($result);
                    ?>
                    <h1 class="header">Category Update</h1>
                    <form name="update_form" id="category_form" action="" method="POST" onsubmit="event.preventDefault(); categoryFormValidation()">
                        <input type="text" id="name" name="name" class="category_input" placeholder ="Category Name" value="<?= $category['name'] ?>">
                        <input type="hidden" name="update_status" value="1">
                        <input class="btn" name='update' type="submit" value="Update Category">
                        <a class='btn' href="category.php">Back</a>
                        <div class="error" id="c_name_error"></div>
                    </form>

                    <?php
                }else{?>
                    <h1 class="header">Category Insert</h1>
                    <form name="insert_form" id="category_form" action="" method="POST" onsubmit="event.preventDefault(); categoryFormValidation()">
                        <input type="text" id="name" name="name" class="category_input" placeholder ="Category Name">
                        <input type="hidden" name="insert_status" value="1">
                        <input class="btn" name='insert' type="submit" value="Add Category">

                        <div class="error" id="c_name_error"></div>
                    </form>
                    <?php
                }
                ?>
            <?php 
                        if (!isset ($_GET['page']) ) {  
                            $page = 1;  
                        } else {  
                            $page = $_GET['page'];  
                        }  
                        $results_per_page =10;
                        $page_first_result = ($page-1) * $results_per_page; 
                        $i = $page_first_result+1;

                        $q_fetch_msg = "SELECT * FROM categories";
                        $result = mysqli_query($conn, $q_fetch_msg);  
                        $number_of_result = mysqli_num_rows($result);  

                        $number_of_page = ceil ($number_of_result / $results_per_page); 
                        
                         
                        $q_paginated_fetch = "SELECT * FROM categories LIMIT ".$page_first_result . ',' . $results_per_page;  
                        $result = mysqli_query($conn, $q_paginated_fetch);
                        $number_of_page = ceil ($number_of_result / $results_per_page);

                        if($page >$number_of_page){
                            echo "
                                <div class='server_error'>
                                    Invalid Page number !
                                </div>
                            ";
                        }else{
            ?>
            <h1 class="header">Category list</h1>
                <table>
                    <tr>
                        <th>Serial Number</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                      <?php
                        // print_r($msg)
                        while($category = mysqli_fetch_array($result)) 
                        { 
                        ?> 
                        <tr>
                            <td><?php echo $i ?></td> 
                            <td><?php echo $category['name']; ?></td> 
                            <td>
                                <?php if($category['status']==1){
                                    echo "True";
                            }
                            else{
                                echo "False";
                            }?>
                            </td>
                            <td>
                                <?php $id = $category['c_id'] ?>
                                <a class="primary_btn" href="category.php?<?php if(isset($_GET['page'])){
                                            $page = $_GET['page'];
                                            echo "page=$page";
                                        } ?>&id=<?= $id ?>">Update</a>
                                <?php
                                    if($category['status']){
                                ?>
                                    <a class="danger_btn" href="updateStatusCategory.php/?id=<?= $category['c_id']  ?>" onclick="return confirm('Are you sure u want to disable category ?')">Disable</a>
                                <?php
                                    }else{
                                        ?>
                                        <a class="success_btn" href="updateStatusCategory.php/?id=<?= $category['c_id'] ?>" onclick="return confirm('Are you sure u want to enable category ?')">Enable</a>
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
                        }
                $page_num = 1;
                if($number_of_result > $results_per_page ){
                    while($page_num<=$number_of_page){
                        echo "<a class='pagination_btn' href = 'category.php?page=$page_num'>$page_num</a>"; 
                        $page_num++; 
                    }
                }
            ?>
        </div>
        
    </div>
</body>
</html>