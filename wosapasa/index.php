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
                    <li><a href="#">Men's Clothing</a></li>
                    <li><a href="#">Women's Clothing</a></li>
                    <li><a href="#">Children clothing</a></li>
                    <li><a href="#">Jean</a></li>
                    <li><a href="#">T-shirt</a></li>
                    <li><a href="#">Shirt</a></li>
                    <li><a href="#">Pant</a></li>
                    <li><a href="#">Category 1</a></li>
                    <li><a href="#">Category 1</a></li>
                    <li><a href="#">Category 1</a></li>
                    <li><a href="#">Category 1</a></li>
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
    <script src="assets/js/main.js"></script>
    <script src="assets/js/carousel.js"></script>
</body>
</html>



