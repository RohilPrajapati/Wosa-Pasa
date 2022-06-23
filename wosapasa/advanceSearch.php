<?php
require_once 'config/dbconfig.php';
if ((isset($_GET['query']) or isset($_GET['q'])) and isset($_GET['min_price']) and isset($_GET['max_price'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php require_once 'assets/component/head.php' ?>
        <title>Search</title>
        <style>
            #slider-range{
                width: 300px;
            }
        </style>
    </head>

    <body>
        <?php
        require_once 'assets/component/topnav.php';
        ?>
        <div class="container">
            <?php require_once 'assets/component/filter.php';
            $query = $_GET['query'];
            $min = $_GET['min_price'];
            $max = $_GET['max_price'];

            // if($min>$max){
            //     $temp = $max;
            //     $max = $min;
            //     $min = $temp;
            // }
            // echo $min;
            // echo $max;
            
            $q_search = "SELECT  product_id, title, image, price from products where (title like '%$query%' or gender like '%$query%' or keyword like '%$query%') and price >= '$min' and price <= '$max' and active_status=1 order by rand()";
            $result = mysqli_query($conn, $q_search);
            if (mysqli_num_rows($result) == 0) {
                echo "
            <div class='server_error'>
                No Search Result Found
            </div>";
            } else {
                
            ?>
                <div class="product_cards">
                    <?php while ($product = mysqli_fetch_assoc($result)) { ?>
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
            <?php } ?>
        </div>
        
    </body>

    </html>
<?php
} else {
    echo "
    <div class='server_error'>
        Please write any thing in search box first !
        <a href='/index.php'>Home Page</php>
    </div>";
}

?>