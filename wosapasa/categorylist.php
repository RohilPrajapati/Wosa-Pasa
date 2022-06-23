<?php
    require_once 'config/dbconfig.php';
    require_once 'config/utility.php';
    $q_category = "SELECT * from categories where status=1";
    $result = mysqli_query($conn,$q_category);
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'assets/component/head.php' ?>
    <title>Category</title>
</head>
<body>
    <?php require_once 'assets/component/topnav.php' ?>
        <div class="container">
            <h1 class="header">Category List</h1>
        <div class="category_cards">
        <?php while($category = mysqli_fetch_assoc($result)){ ?>
            <a class="disable_link" href="/category.php?id=<?= $category['c_id'] ?>">
            <div class="category_card">
                <?= $category['name'] ?>
            </div>
            </a>
            <?php }
        ?>
        </div>
    </div>
   
</body>
</html>