<?php 
    require_once 'config/utility.php';
    require_once 'config/dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= require_once 'assets/component/head.php'; ?>
    
    <title>Wosa: Pasa:</title>
</head>
<body>
    <?= include_once 'assets/component/topnav.php';?>
    <div class="container">
        <div class="row">
            <div class="side_category">
                <ul>
                    <?php
                        $q_fetch_category = "select * from categories where status = 1 limit 11";
                        $result = mysqli_query($conn,$q_fetch_category);
                        while ($category = mysqli_fetch_assoc($result)){
                    ?>
                    <li><a href="#"><?= $category['name'] ?></a></li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
            <div class="carousel">
                <div class="carousel_images">
                    <div class="carousel_slide carousel_hidden_img">
                        <img class="carousel_img" src="/assets/image/design_wosa_pasa.png" alt="">
                    </div>
                    <div class="carousel_slide carousel_hidden_img">
                        <img class="carousel_img" src="/assets/image/commingsoon.jpg" alt="">
                    </div>
                </div>
                <button class="carousel_prev" id="prev"><</button>
                <button class="carousel_next" id="next">></button>
            </div>
        </div>
        <div class="product_cards">
            
            <div class="card">
                <a href="/detailview.php">
                    <img class="card-image" src="assets/image/shirt.jpg" alt="Image of product">
                    <div class="cardText">
                        <div class="cardTitle">
                            Plain Blue shirt ajdlfjalsf asdfjaskflsa salfdkaslk;
                        </div>
                        <div class="card_info_action">
                            <p class="offer-price">Rs 999</p>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="card">
                <img class="card-image" src="assets/image/shirt.jpg" alt="Image of product">
                <div class="cardText">
                    <div class="cardTitle">
                        Plain Blue shirt
                    </div>
                    <div class="card-price">
                        <p class="offer-price">Rs 999</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <img class="card-image" src="assets/image/shirt.jpg" alt="Image of product">
                <div class="cardText">
                    <div class="cardTitle">
                        Plain Blue shirt
                    </div>
                    <div class="card-price">
                        <p class="offer-price">Rs 999</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <img class="card-image" src="assets/image/shirt.jpg" alt="Image of product">
                <div class="cardText">
                    <div class="cardTitle">
                        Plain Blue shirt
                    </div>
                    <div class="card-price">
                        <p class="offer-price">Rs 999</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <img class="card-image" src="assets/image/shirt.jpg" alt="Image of product">
                <div class="cardText">
                    <div class="cardTitle">
                        Plain Blue shirt
                    </div>
                    <div class="card-price">
                        <p class="offer-price">Rs 999</p>
                    </div>
                </div>
            </div>
            

        </div>

    </div>
    <?php require_once 'assets/component/footer.php'; ?>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/carousel.js"></script>
</body>
</html>



