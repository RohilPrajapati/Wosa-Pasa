<?php
session_start();
require_once 'config/dbconfig.php';
require_once 'config/utility.php';
if (isset($_GET['p_id'])) {
    $id = $_REQUEST['p_id'];
    $q_product = "SELECT * from products inner join categories on products.c_id = categories.c_id where products.active_status = 1 and categories.status = 1 and product_id='$id'";
    $result = mysqli_query($conn, $q_product);
    if (mysqli_num_rows($result) != 0) {
        $product = mysqli_fetch_assoc($result);
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <?= require_once 'assets/component/head.php'; ?>
            <title><?= $product['title'] ?></title>
        </head>

        <body>
            <?php
            require_once 'assets/component/topnav.php';
            ?>
            <div class="container">
                <div class="detail_row">

                    <div class="product_img_col">
                        <img class="detail_product_img" src="/assets/image/upload/<?= $product['image'] ?>" alt="">
                    </div>
                    <div class="p_detail_text_col">
                        <h1><?= $product['title'] ?></h1>
                        <p><?= $product['description'] ?></p>
                        Stocks : <?= $product['number_of_stock'] ?><br>
                        <form class="detail_view_form" action="addCart.php" id="addCartForm" method="post" onsubmit="event.preventDefault(); addCartQtyValidation()">
                            <input type="hidden" name="stock" id="stock" value="<?= $product['number_of_stock'] ?>">
                            <span>Quantity :</span>
                            <button id="sub" class="qty_add_sub_btn" onclick="event.preventDefault(); subQty()">-</button>
                               <input id="qty" name="qty" class="qty_input" type="text" value="1" readonly>
                            <button id="add" class="qty_add_sub_btn" onclick=" event.preventDefault();   addQty()">+</button>
                            <span class="offer-price"> Rs. <?= $product['price'] ?></span><br>
                            <div id="qtyError" class="error"></div>
                            <div class="detail_view_action">
                                <?php
                                if ($_SESSION['id']) {
                                    $user_id = $_SESSION['id'];
                                    $id = $_GET['p_id']
                                ?>
                                    <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                    <input type="hidden" name="product_id" value="<?= $id ?>">
                                    <input type="hidden" name="quickBuy" value="1">
                                    <input class="detailview_btn" name="f_submit" type="submit" value="Add to Cart">
                                    <input class="detailview_btn buy_btn" name="f_submit" onclick="event.preventDefault(); buyProduct();" type="submit" value="Buy Now">
                                <?php
                                } else { ?>
                                    <input class="detailview_btn" name="f_submit" type="submit" value="Add to Cart">
                                    <input class="detailview_btn buy_btn" name="f_submit" onclick="event.preventDefault(); buyProduct();" type="submit" value="Buy Now">
                                <?php
                                } ?>
                        </form>

                    </div>
                </div>

            </div>
            <div class="product_desc">
                <h3 class="header">Description</h3>
                <ul>
                    <li>Gender : <?= $product['gender'] ?></li>
                    <li>category : <?= $product['name'] ?></li>
                </ul>
            </div>
            <div>
                <?php
                $c_id = $product['c_id'];
                $id = $product['product_id'];
                $q_related_product = "SELECT product_id,image, title ,price from products where c_id = '$c_id' and product_id <> '$id' ORDER BY RAND() limit 4";
                $related_p_result = mysqli_query($conn, $q_related_product);
                if (mysqli_num_rows($related_p_result) != 0) { ?>
                    <h3 class="header">Related Product</h3>
                    <div class="product_cards">
                        <?php
                        while ($related_product = mysqli_fetch_assoc($related_p_result)) { ?>
                            <div class="card">
                                <a href="/detailview.php?p_id=<?= $related_product['product_id'] ?>">
                                    <img class="card-image" src="assets/image/upload/<?= $related_product['image'] ?>" alt="Image of product">
                                    <div class="cardText">
                                        <div class="cardTitle">
                                            <?= $related_product['title'] ?>
                                        </div>
                                        <div class="card-price">
                                            <p class="offer-price">Rs <?= $related_product['price'] ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php
                        }
                        ?>


                    </div><?php
                        }
                            ?>
            </div>
            </div>
            <script src="assets/js/main.js"></script>
        </body>

        </html>

<?php
    } else {
        echo "
            <div class='server_error'>
                Product Not Found!!.
            </div>
        ";
    }
} else {
    echo "
            <div class='server_error'>
                Invalid request !!.
            </div>
        ";
}

?>