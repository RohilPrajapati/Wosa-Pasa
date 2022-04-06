<?php
    require_once '../config/dbconfig.php';
    require_once '../config/utility.php';
    require_once 'checkadmin.php';
    if($_POST){
        $isupload = 1;
        $name = addslashes($_REQUEST['p_name']);
        $p_desc = $_REQUEST['p_desc'];
        $p_desc = addslashes($p_desc);
        $price = $_REQUEST['price'];

        $stock = $_REQUEST['num_stock'];
        $keyword = $_REQUEST['keyword'];
        $gender = $_REQUEST['gender'];


        $c_id = $_REQUEST['category'];

        // uploading path
        $upload_path = "../assets/image/upload/";
        // get the time and date
        date_default_timezone_set("Asia/Kathmandu");

        // get the extension of uploaded file
        $ext = pathinfo(($_FILES["image"]["name"]), PATHINFO_EXTENSION);

        //checking if product name with same price exist or not

        $q_product = "SELECT * from products where title= '$name' and price = '$price'";

        $result = mysqli_query($conn,$q_product);
        if(mysqli_num_rows($result)!=0){
            $isupload = 0;
        }

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
        if($ext != "jpg" && $ext != "png" && $ext != "jpeg"
        && $ext != "gif" ) {
            echo "
                <div class='server_error'>
                    Sorry, only JPG, JPEG, PNG & GIF files are allowed.
                </div>
            ";
            header("refresh:4;url=product.php");
            $isupload = 0;  
        }
        

        // adding custom name to file with ext
        $image = "WP" . date("Ymdhis").".".$ext;
        $tmp_name = $_FILES['image']['tmp_name'];
        // upload the file to /assets/image/upload/..filename..
        
        // echo $image;
        
        if(isset($_REQUEST['status'])){
            $p_status = $_REQUEST['status'];
        }else{
            $p_status = 0;
        }
        // echo $p_status;
        if($isupload == 1){
            if (move_uploaded_file($tmp_name, $upload_path.$image)) {
                // echo 'Uploaded!';
                $q_insert_product = "INSERT INTO products (title,description,image,c_id,price,gender,number_of_stock,keyword,active_status) values ('$name','$p_desc','$image','$c_id','$price','$gender','$stock','$keyword','$p_status')";
                if(mysqli_query($conn,$q_insert_product)){
                    echo "
                    <div class='server_success'>
                    Product is Added !
                    </div>
                    ";
                    header("refresh:4;url=addProduct.php");
                }
            }
        }
    }
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
        require_once 'admin_nav.php'?>
        <div class="container">
            <h1 class="header">Add Product</h1>
            <form id="addProductForm" action="" method="post" enctype="multipart/form-data" onsubmit="event.preventDefault(); validateAddProduct()">
                <input class="input_lg" id="name" type="text" name="p_name" placeholder="Title/Name"><br>
                <div class="error" id="p_name_error"></div><br>

                <textarea class="product_insert_descpt" name="p_desc" id="desc" placeholder="Description"></textarea><br>
                <div class="error" id="p_desc_error"></div><br>

                <input class="input_sm" min=0 type="number" id="price" name="price" placeholder ="Price"><br>
                <div class="error" id="p_price_error"></div><br>

                <input class="input_sm" min=1 type="number" id="num_stock" name="num_stock" placeholder ="Number of Stock"><br>
                <div class="error" id="p_num_stock_error"></div><br>

                <label for="">Gender : </label>
                <div class="error" id="p_num_stock_error"></div><br>
                
                <select class="input_file" name="gender" id="gender">
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
                    <input class="input_file" name="image" type="file" id="image"><br>
                    <div class="error" id="p_image_error"></div><br>
                <input type="text" class="input_lg" name="keyword" placeholder="Keyword [seperate the value with , ]"><br>
                <label for="status">Status: </label>
                <input type="radio" name="status" value="1" checked> On
                <input type="radio" name="status" value="0"> Off<br>
                <input class="btn" type="submit" value="Add Product ">
                <a class="btn" href="product.php">Back</a>
            </form>
        </div>
    </div>
</body>
</html>