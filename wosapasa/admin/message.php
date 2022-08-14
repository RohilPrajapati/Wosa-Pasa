<?php
require_once 'checkadmin.php';
require_once '../config/dbconfig.php';
require_once '../config/utility.php';
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
        $page_title = 'feedback';
        require_once 'admin_nav.php';
        ?>
        <div class="container">
            <h1 class="header">Messages </h1>
            <?php
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

            $results_per_page = 10;

            $page_first_result = ($page - 1) * $results_per_page;
            $i = $page_first_result + 1;
            $q_feedback = "SELECT * from feedbacks inner join users on feedbacks.user_id = users.user_id order by fb_id desc";
            // $q_feedback = "SELECT * from products inner join categories on products.c_id = categories.c_id where active_status = 1";
            // echo $conn->error;
            $result = mysqli_query($conn, $q_feedback);
            $number_of_result = mysqli_num_rows($result);
            $i = $page_first_result + 1;
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
                $q_pag_feedback = "SELECT * from feedbacks inner join users on feedbacks.user_id = users.user_id order by fb_id desc LIMIT " . $page_first_result . ',' . $results_per_page;
                // $result = mysqli_query($conn, $q_pag_feedback);
                $result = mysqli_query($conn, $q_pag_feedback);
                if ($number_of_result != 0) {

                    while ($feedback = mysqli_fetch_assoc($result)) {
            ?>
                        <div class="feedback_card">
                            <h3><?= $feedback['title'] ?></h3>
                            <p><?= $feedback['message'] ?></p>
                            <div class="left_align">
                                - <?= $feedback['username'] ?>
                            </div>
                        </div>
            <?php
                    }
                } else {
                    echo "<br>";
                    echo "No Product Found";
                }
            }
            ?>
            <div class="pagination_btns">
                <?php
                $page_num = 1;

                if ($number_of_result > $results_per_page) {
                    // while($page_num<=$number_of_page){
                    //     echo "<a class='pagination_btn' href = 'product.php?page=$page_num'>$page_num</a>"; 
                    //     $page_num++; 
                    // }
                    // echo "<br>";
                    if ($page > 1 && $page < $number_of_page) {
                        $pre_page = $page - 1;
                        echo "<a class='pagination_btn' href = 'message.php?page=$pre_page'><i class='fa-solid fa-angle-left'></i></a>";
                        echo "<a class='pagination_btn' href = '#'>$page</a>";
                        $next_page = $page + 1;
                        echo "<a class='pagination_btn' href = 'message.php?page=$next_page'><i class='fa-solid fa-angle-right'></i></a>";
                    }
                    if ($page == 1) {
                        $next_page = $page + 1;
                        echo "<a class='pagination_btn' href = '#'>$page</a>";
                        echo "<a class='pagination_btn' href = 'message.php?page=$next_page'><i class='fa-solid fa-angle-right'></i></a>";
                    }
                    if ($page == $number_of_page) {
                        $pre_page = $page - 1;
                        echo "<a class='pagination_btn' href = 'message.php?page=$pre_page'><i class='fa-solid fa-angle-left'></i></a>";
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
</body>

</html>