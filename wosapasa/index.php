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
    <?= include_once 'assets/component/topnav.php'; ?>
    <div class="container">
        <div class="row">
            <div class="side_category">
                <ul>
                    <?php
                    $q_fetch_category = "select * from categories where status = 1 limit 11";
                    $result = mysqli_query($conn, $q_fetch_category);
                    while ($category = mysqli_fetch_assoc($result)) {
                    ?>
                        <li><a href="category.php?id=<?= $category['c_id'] ?>"><?= $category['name'] ?></a></li>
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
        <?php
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        $results_per_page = 16;

        $page_first_result = ($page - 1) * $results_per_page;

        $q_product = "SELECT * from products inner join categories on products.c_id = categories.c_id where active_status= 1 and status = 1";
        $result = mysqli_query($conn, $q_product);
        $number_of_result = mysqli_num_rows($result);
        $number_of_page = ceil($number_of_result / $results_per_page);

        if ($page == 1 && $number_of_page == 0) {
            echo "
                    <div class='server_error'>
                        No data in Table 
                    </div>
                ";
        } else if ($page > $number_of_page) {
            echo "
                    <div class='server_error'>
                        Invalid Page number 
                    </div>
                ";
        } else {
            $q_pag_product = "SELECT * from products inner join categories on products.c_id = categories.c_id where active_status = 1 and status=1 order by product_id desc LIMIT " . $page_first_result . ',' . $results_per_page;
            $result = mysqli_query($conn, $q_pag_product);
            if ($number_of_result != 0) {
        ?>
                <h2 class="card_header">Products</h2>
                <div class="product_cards">
                    <?php
                    while ($product = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="card">
                            <a href="/detailview.php?p_id=<?= $product['product_id'] ?>">
                                <img class="card-image" src="assets/image/upload/<?= $product['image'] ?>" alt="Image of product">
                                <div class="cardText">
                                    <div class="cardTitle">
                                        <?= $product['title'] ?>
                                    </div>
                                    <div class="card_info_action">
                                        <p class="offer-price">Rs <?= $product['price'] ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
        <?php
            } else {
                echo "<br>";
                echo "No Product Found";
            }
        }
        ?><div class="pagination_btns"><?php
                                        $page_num = 1;

                                        if ($number_of_result > $results_per_page) {
                                            // while($page_num<=$number_of_page){
                                            //     echo "<a class='pagination_btn' href = 'product.php?page=$page_num'>$page_num</a>"; 
                                            //     $page_num++; 
                                            // }
                                            // echo "<br>";
                                            if ($page > 1 && $page < $number_of_page) {
                                                $pre_page = $page - 1;
                                                echo "<a class='pagination_btn' href = 'index.php?page=$pre_page'><i class='fa-solid fa-angle-left'></i></a>";
                                                echo "<a class='pagination_btn' href = '#'>$page</a>";
                                                $next_page = $page + 1;
                                                echo "<a class='pagination_btn' href = 'index.php?page=$next_page'><i class='fa-solid fa-angle-right'></i></a>";
                                            }
                                            if ($page == 1) {
                                                $next_page = $page + 1;
                                                echo "<a class='pagination_btn' href = '#'>$page</a>";
                                                echo "<a class='pagination_btn' href = 'index.php?page=$next_page'><i class='fa-solid fa-angle-right'></i></a>";
                                            }
                                            if ($page == $number_of_page) {
                                                $pre_page = $page - 1;
                                                echo "<a class='pagination_btn' href = 'index.php?page=$pre_page'><i class='fa-solid fa-angle-left'></i></a>";
                                                echo "<a class='pagination_btn' href = '#'>$page</a>";
                                            }
                                            // $next_page = $page+1;
                                            // $pre_page = $page-1;
                                            // echo "<a class='pagination_btn' href = 'product.php?page=$next_page'>$next_page</a>"; 
                                            // echo "<a class='pagination_btn' href = 'product.php?page=$pre_page'>$pre_page</a>"; 

                                        }
                                        ?>
        </div>
    </div>
    <?php require_once 'assets/component/footer.php'; ?>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/carousel.js"></script>
</body>

</html>