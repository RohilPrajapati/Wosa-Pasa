<?php 
    require_once 'checkadmin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'head.php' ?>
    <title>DashBoard</title>
</head>
<body>
    <div class="main_container">
        <?php require_once 'admin_nav.php'; ?>
        <div class="container">
            <input type="button" onclick="window.location.href='addProduct.php'" value="Add Product" class="btn">
            <input type="button" onclick="window.location.href='#'" value="Disable Product List" class="btn">
            <h1 class="header">Product List</h1>
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
                <tr>
                    <td>1</td>
                    <td><img src="/assets/image/shirt.jpg" alt=""></td>
                    <td>Blue Plain Shirt</td>
                    <td>1200</td>
                    <td>All</td>
                    <td>Shirt</td>
                    <td>10</td>
                    <td>
                        <a class="primary_btn" href="#">Update</a>
                        <a class="danger_btn" href="#">Disable</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><img src="/assets/image/shirt.jpg" alt=""></td>
                    <td>Blue Plain Shirt</td>
                    <td>1200</td>
                    <td>All</td>
                    <td>Shirt</td>
                    <td>5</td>
                    <td>
                        <a class="primary_btn" href="#">Update</a>
                        <a class="danger_btn" href="#">Disable</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><img src="/assets/image/shirt.jpg" alt=""></td>
                    <td>Blue Plain Shirt</td>
                    <td>1200</td>
                    <td>All</td>
                    <td>Shirt</td>
                    <td>6</td>
                    <td>
                        <a class="primary_btn" href="#">Update</a>
                        <a class="danger_btn" href="#">Disable</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>