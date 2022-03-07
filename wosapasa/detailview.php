<!DOCTYPE html>
<html lang="en">
<head>
    <?= require_once 'assets/component/head.php'; ?>
    <title>Product Name</title>
</head>
<body>
    <?php 
        require_once 'assets/component/topnav.php';
    ?>
    <div class="container">
        <div class="detail_row">
            <div class="product_img_col">
                <img class="detail_product_img" src="/assets/image/commingsoon.jpg" alt="">
            </div>
            <div class="p_detail_text_col">
                <h1>Product title</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, debitis quam beatae quidem dolore nobis veritatis. Odio officia, fuga necessitatibus voluptatum natus laborum provident. Sit laborum maiores blanditiis. Non mollitia incidunt ipsa voluptas animi nulla ea maxime libero cum nisi?</p>
                <button>-</button>
                <input class="qty_input" type="text" readonly value=0>
                <button>+</button>
                <input class="detailview_btn" type="submit" value="Add to Cart">
                <input class="detailview_btn buy_btn" type="submit" value="Buy Now">
            </div>
        </div>
        <div class="product_desc">
            <h1>Product Desciption</h1>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, nobis iusto! Officia praesentium provident beatae expedita excepturi dolore laborum, dicta voluptas fugiat tempora voluptatum fuga officiis repudiandae fugit quidem neque. Labore expedita nulla doloribus autem animi, repellendus blanditiis optio ab aliquam nam reprehenderit nobis alias nostrum quae quo necessitatibus inventore laudantium sint hic repellat minus deserunt officia tenetur rerum. Quod dolore nostrum ducimus perferendis, atque expedita, optio fuga esse, dicta labore aperiam? Ducimus aspernatur cupiditate praesentium, aut doloribus illo est odio tenetur consequuntur consectetur inventore dolorum. Accusamus eum corrupti laborum, nam atque, dolorem vero similique molestiae ex fuga ab necessitatibus?
        </div>
        <div>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
</body>
</html>