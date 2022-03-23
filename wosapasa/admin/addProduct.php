<?php
    require_once '../config/dbconfig.php';
    require_once '../config/utility.php';
    require_once 'checkadmin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'head.php' ?>
    <title>Add Product</title>
</head>
<body>
    <div class="main_container">
        <?php require_once 'admin_nav.php'?>
        <div class="container">
            <h1 class="header">Add Product</h1>
            <form action="" method="post">
                <input class="input_lg" type="text" placeholder="Title/Name"><br>
                <textarea class="product_insert_descpt" name="" id="" placeholder="Description"></textarea><br>
                <input class="input_sm" min=0 type="number" placeholder ="Price"><br>
                <input class="input_sm" min=1 type="number" placeholder ="Number of Stock"><br>
                <label for="">Gender : </label>
                <select class="input_file" name="gender_type" id="">
                    <option>Male</option>
                    <option>Female</option>
                    <option selected>All</option>
                </select><br>
                <label for="">Category : </label>
                <select class="input_file" name="category" required id="">
                        <?php
                            $q_fetch_category = "select * from categories where status =  1";
                            $result = mysqli_query($conn,$q_fetch_category);
                            while($category = mysqli_fetch_assoc($result)){
                        ?>
                    <option value="<?= $category['c_id'] ?>"><?= $category['name']?></option>
                        <?php
                            }
                        ?>
                    </select><br>
                    
                <label for="">Photo of Product : </label>
                <input class="input_file" type="file"><br>
                <input class="btn" type="submit" value="Add Product ">
                <a class="btn" href="product.php">Back</a>
            </form>
        </div>
    </div>
</body>
</html>