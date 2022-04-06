<?php
    require_once 'config/dbconfig.php';
    require_once 'config/utility.php';
    if(isset($_GET['id'])){
        $id= $_REQUEST['id'];
        $q_product = "SELECT * from products where c_id = $id and active_status=1";
        $result = mysqli_query($conn,$q_product);
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'assets/component/head.php' ?>
    <title>Category</title>
</head>
<body>
    <?php require_once 'assets/component/topnav.php' ?>
    <?php
     if(mysqli_num_rows($result)!=0){?>
        <div class="container">
        <div class="product_cards">
        <?php while($product = mysqli_fetch_assoc($result)){ ?>
            <div class="card">
                <a href="/detailview.php?p_id=<?= $product['product_id'] ?>">
                    <img class="card-image" src="assets/image/upload/<?= $product['image'] ?>" alt="Image of product">
                    <div class="cardText">
                        <div class="cardTitle">
                            <?= $product['title'] ?>
                        </div>
                        <div class="card-price">
                            <p class="offer-price">Rs <?= $product['price'] ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div><?php
     }else{
        echo "
            <div class='server_error'>
                No Product Found !!
            </div>
        ";
    }
    ?>

</body>
</html>
<?php
    $conn->close();
    }else{
        echo "
            <div class='server_error'>
                Invlid request
            </div>
        ";
    }
?>