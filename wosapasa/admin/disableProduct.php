<?php 
    require_once 'checkadmin.php';
    require_once "../config/dbconfig.php";
    require_once "../config/utility.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'head.php' ?>
    <title>DashBoard</title>
</head>
<body>
    <div class="main_container">
        <?php 
        $page_title='product';
        require_once 'admin_nav.php'; ?>
        <div class="container">
            <input type="button" onclick="window.location.href='addProduct.php'" value="Add Product" class="btn">
            <input type="button" onclick="window.location.href='product.php'" value="Product List" class="btn">
            <?php 
                    if (!isset ($_GET['page']) ) {  
                        $page = 1;  
                    } else {  
                        $page = $_GET['page'];  
                    }

                    $results_per_page =10;

                    $page_first_result = ($page-1) * $results_per_page; 
                    $i = $page_first_result+1;
                    $q_product_category = "Select * from products inner join categories on products.c_id = categories.c_id where active_status = 0";
                    $result = mysqli_query($conn,$q_product_category);
                    $number_of_result = mysqli_num_rows($result);
                    $i = $page_first_result+1;
                    $number_of_page = ceil ($number_of_result / $results_per_page);
                    if($page==1 && $number_of_page==0){
                        echo "
                            <div class='server_error'>
                                No data in Table 
                            </div>
                        ";
                    }
                    else if($page >$number_of_page){
                        echo "
                            <div class='server_error'>
                                Invalid Page number 
                            </div>
                        ";
                    }else{
                        $q_pag_product_category = "Select * from products inner join categories on products.c_id = categories.c_id where active_status = 0 LIMIT ".$page_first_result . ',' . $results_per_page;
                        $result = mysqli_query($conn, $q_pag_product_category);
                        if($number_of_result!=0){
                ?>
            <h1 class="header">Disable Product List</h1>
            <table>
                <tr>
                    <th>Serial Number</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Gender</th>
                    <th>category Name</th>
                    <th>Stocks</th>
                    <th>Action</th>
                </tr>
                <?php 
                    while($product = mysqli_fetch_assoc($result)){
                        ?>                        
                <tr>
                    <td><?= $i ?></td>
                    <td><img src="/assets/image/upload/<?= $product['image']?>" alt="<?= $product['image']?>"></td>
                    <td><?= $product['title'] ?></td>
                    <td>Rs <?= $product['price']?></td>
                    <td><?= $product['gender']?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['number_of_stock']?></td>
                    <td>
                        <a class="primary_btn" href="updateProduct.php?id=<?= $product['product_id'] ?>">Update</a>
                        <a class="success_btn" href="disableEnableProduct.php?id=<?= $product['product_id'] ?>">Enable</a>
                    </td>
                </tr>
                <?php
                    $i++;
                        }
                    
                ?>
            </table>
            <?php
                }else{
                    echo "<br>";
                    echo "No Product Found";
                }
            }
                $page_num = 1;

                if($number_of_result > $results_per_page ){
                    // while($page_num<=$number_of_page){
                    //     echo "<a class='pagination_btn' href = 'product.php?page=$page_num'>$page_num</a>"; 
                    //     $page_num++; 
                    // }
                    // echo "<br>";
                    if($page>1 && $page <$number_of_page){
                        $pre_page = $page-1;
                        echo "<a class='pagination_btn' href = 'disableProduct.php?page=$pre_page'>$pre_page</a>";
                        echo "<a class='pagination_btn' href = 'disableProduct.php?page=$page'>$page</a>";
                        $next_page = $page+1;
                        echo "<a class='pagination_btn' href = 'disableProduct.php?page=$next_page'>$next_page</a>";
                    }
                    if($page == 1){
                        $next_page = $page+1;
                        echo "<a class='pagination_btn' href = 'disableProduct.php?page=$page'>$page</a>";
                        echo "<a class='pagination_btn' href = 'disableProduct.php?page=$next_page'>$next_page</a>";
                    }
                    if($page == $number_of_page){
                        $pre_page = $page-1;
                        echo "<a class='pagination_btn' href = 'disableProduct.php?page=$pre_page'>$pre_page</a>";
                        echo "<a class='pagination_btn' href = 'disableProduct.php?page=$page'>$page</a>";
                    }
                    // $next_page = $page+1;
                    // $pre_page = $page-1;
                    // echo "<a class='pagination_btn' href = 'product.php?page=$next_page'>$next_page</a>"; 
                    // echo "<a class='pagination_btn' href = 'product.php?page=$pre_page'>$pre_page</a>"; 

                }
                
            ?>


        </div>
    </div>
</body>
</html>