<?php
require_once '../config/dbconfig.php';
require_once '../config/utility.php';
require_once 'checkadmin.php';
if (isset($_POST['update'])) {
    $name = $_REQUEST['p_name'];
    $name = addslashes($name);
    $p_desc = $_REQUEST['p_desc'];
    $p_desc = addslashes($p_desc);
    $price = $_REQUEST['price'];

    $stock = $_REQUEST['num_stock'];
    $keyword = $_REQUEST['keyword'];

    $gender = $_REQUEST['gender'];


    $c_id = $_REQUEST['category'];

    if (isset($_REQUEST['status'])) {
        $p_status = $_REQUEST['status'];
    } else {
        $p_status = 0;
    }
    // echo $_FILES['image']['tmp_name'];
    if ($_FILES['image']['tmp_name'] == '') {
        if ($_GET['id']) {
            $id = $_REQUEST['id'];
            $q_update = "UPDATE products SET title = '$name', description = '$p_desc' , c_id = '$c_id', price ='$price' , gender = '$gender', number_of_stock = '$stock', active_status = '$p_status', keyword = '$keyword' WHERE product_id= '$id' ;";
            if (mysqli_query($conn, $q_update)) {
                echo "
                    <div class='server_success'>
                        Product has been updated !
                    </div>
                ";
                header("refresh:3;url=product.php");
            } else {
                echo "
                    <div class='server_error'>
                        Product has not been updated !
                    </div>
                ";
                header("refresh:3;url=updateProduct.php");
            }
        }
    } else {
        $isupload = 1;
        // uploading path
        $upload_path = "../assets/image/upload/";
        // get the time and date
        date_default_timezone_set("Asia/Kathmandu");

        // get the extension of uploaded file
        $ext = pathinfo(($_FILES["image"]["name"]), PATHINFO_EXTENSION);

        // checking file size is 
        // print_r($_FILES['image']);
        if ($_FILES["image"]["size"] > 500000) {
            echo "
                    <div class='server_error'>
                        File is too large.
                    </div>
                ";
            header("refresh:4;url=addProduct.php");
            $isupload = 0;
        }

        // Allow certain file formats
        if (
            $ext != "jpg" && $ext != "png" && $ext != "jpeg"
            && $ext != "gif"
        ) {
            echo "
                    <div class='server_error'>
                        Sorry, only JPG, JPEG, PNG & GIF files are allowed.
                    </div>
                ";
            header("refresh:4;url=product.php");
            $isupload = 0;
        }


        // adding custom name to file with ext
        $image = "WP" . date("Ymdhis") . "." . $ext;
        $tmp_name = $_FILES['image']['tmp_name'];
        // upload the file to /assets/image/upload/..filename..
        // echo $p_status;
        if ($isupload == 1) {

            if (move_uploaded_file($tmp_name, $upload_path . $image)) {
                // echo 'Uploaded!';
                if ($_GET['id']) {
                    $id = $_REQUEST['id'];
                    $q_select = "SELECT image from products where product_id = '$id'";
                    $result = mysqli_query($conn,$q_select);
                    $product = mysqli_fetch_assoc($result);
                    $file = "../assets/image/upload/".$product['image'];
                    unlink($file);
                        
                    $q_update = "UPDATE products SET title = '$name', description = '$p_desc',image = '$image' , c_id = '$c_id', price ='$price' , gender = '$gender', number_of_stock = '$stock', active_status = '$p_status',keyword = '$keyword' WHERE product_id= '$id';";
                    if (mysqli_query($conn, $q_update)) {
                        echo "
                            <div class='server_success'>
                                Product has been updated !
                            </div>
                        ";
                        header("refresh:3;url=product.php");
                    } else {
                        echo "
                        <div class='server_error'>
                        Product has not been updated !
                        </div>
                        ";
                        header("refresh:3;url=updateProduct.php");
                    }
                }
            }
        }
    }
}




if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $q_product = "select * from products where product_id = '$id'";
    $result = mysqli_query($conn, $q_product);
    $product = mysqli_fetch_assoc($result);

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php require_once 'head.php' ?>
        <title>Add Product</title>
    </head>

    <body>
        <div class="main_container">
            <?php 
            $page_title='product';
            require_once 'admin_nav.php' ?>
            <div class="container">
                <h1 class="header">Update Product</h1>
                <form id="addProductForm" action="" method="post" enctype="multipart/form-data" onsubmit="event.preventDefault(); validateUpdateProduct()">
                    <input class="input_lg" id="name" type="text" name="p_name" placeholder="Title/Name" value="<?= $product['title'] ?>" <br>
                    <div class="error" id="p_name_error"></div><br>

                    <textarea class="product_insert_descpt" name="p_desc" id="desc" placeholder="Description"><?= $product['description'] ?></textarea><br>
                    <div class="error" id="p_desc_error"></div><br>

                    <input class="input_sm" min=0 type="number" id="price" name="price" placeholder="Price" value="<?= $product['price'] ?>"><br>
                    <div class="error" id="p_price_error"></div><br>

                    <input class="input_sm" min=1 type="number" id="num_stock" name="num_stock" placeholder="Number of Stock" value="<?= $product['number_of_stock'] ?>"><br>
                    <div class="error" id="p_num_stock_error"></div><br>

                    <label for="">Gender : </label>
                    <div class="error" id="p_num_stock_error"></div><br>

                    <select class="input_file" name="gender" id="gender">
                        <option <?php if ($product['gender'] == 'Male') {
                                    echo "selected";
                                } ?>>Male</option>
                        <option <?php if ($product['gender'] == 'Female') {
                                    echo "selected";
                                } ?>>Female</option>
                        <option <?php if ($product['gender'] == 'All') {
                                    echo "selected";
                                } ?>>All</option>
                    </select><br>
                    <label for="">Category : </label>
                    <select class="input_file" name="category" required id="">
                        <?php
                        $q_fetch_category = "select * from categories where status =  1";
                        $result = mysqli_query($conn, $q_fetch_category);
                        while ($category = mysqli_fetch_assoc($result)) {
                            if ($product['c_id'] == $category['c_id']) {
                        ?>
                                <option value="<?= $category['c_id'] ?>" selected><?= $category['name'] ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="<?= $category['c_id'] ?>"><?= $category['name'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select><br>

                    <label for="">Photo of Product : </label>
                    <input class="input_file" name="image" type="file" id="image"><br>
                    <input type="text" class="input_lg" name="keyword" placeholder="Keyword [seperate the value with , ]" value="<?= $product['keyword'] ?>"><br>
                    <label for="status">Status: </label>
                    <input type="radio" name="status" value="1" <?php if ($product['active_status'] == 1) {
                                                                    echo "checked";
                                                                } ?>> On
                    <input type="radio" name="status" value="0" <?php if ($product['active_status'] == 0) {
                                                                    echo "checked";
                                                                } ?>> Off<br>
                    <input type="hidden" name="update" value="1">
                    <input class="btn" type="submit" value="Update Product ">
                    <a class="btn" href="product.php">Back</a>
                </form>
            </div>
        </div>
    </body>

    </html>

<?php
}
?>