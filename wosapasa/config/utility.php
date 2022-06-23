<?php
require_once "dbconfig.php";
function redirectAlertMessage($msg, $url)
{
    echo "
            <script>
                alert('$msg');;
            </script>
        ";
    header('refresh:0;url= ' . $url);
}

function fetch_user($id, $conn)
{
    $q_user = "SELECT * from users  where user_id ='$id'";
    $result = mysqli_query($conn, $q_user);
    if (mysqli_num_rows($result) != 0) {
        $user = mysqli_fetch_assoc($result);
        return $user;
    } else {
        die("User not found");
    }
}
// function isAdmin(){
//     if(!isset($_SESSION['id'])){
//         echo "Unauthorized request !!";
//         echo "login first to access page";
//         echo "<a href='/account/login.php'>Go back to login</a>";
//     }
// }
// function isAuthenticated(){
//     if(!isset($_SESSION['admin'])){
//         echo "Unauthorized request !!";
//         echo "<a href='/account/login.php'>Go back to login</a>";
//     }
// }
function send_mail($to, $title_msg, $msg)
{
    $to = $to;
    $title = $title_msg;
    $message = $msg;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From:royalprajapati@gmail.com";
    if (mail($to, $title, $message, $headers)) {
        echo "Message sent successfully...";
    } else {
        echo "Message could not be sent...";
    }
}

function pay_esewa($amt, $pid)
{
    $url = "https://uat.esewa.com.np/epay/main";
    $data = [
        'amt' => $amt,
        'pdc' => 0,
        'psc' => 0,
        'txAmt' => 0,
        'tAmt' => $amt,
        'pid' => $pid,
        'scd' => 'EPAYTEST',
        'su' => 'http://127.0.0.1:80/payment/esewaSuccess.php?q=su',
        'fu' => 'http://127.0.0.1:80/payment/esewaFail.php?q=fu'
    ];
?>
    <form id="myForm" action="<?= $url ?>" method="post">
        <?php
        foreach ($data as $name => $value) {
            echo '<input type="hidden" name="' . htmlentities($name) . '" value="' . htmlentities($value) . '">';
        }
        ?>
    </form>
    <script type="text/javascript">
        document.getElementById('myForm').submit();
    </script>
<?php
}
?>
<?php
function order_mail($conn,$p_uid,$email){
    $q_payment = "SELECT * from payments where payment_uid = '$p_uid'";
    $result = mysqli_query($conn,$q_payment);
    $payment = mysqli_fetch_assoc($result);
    $q_order = "SELECT orders.quantity,orders.price as order_price, products.title,products.image, products.description, payments.total_amt  FROM orders inner join products on orders.product_id = products.product_id inner join payments on orders.payment_id = payments.payment_id where payments.payment_id = " .$payment['payment_id'];
    $result = mysqli_query($conn,$q_order);
    $msg = "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <style>
        * {
            margin: 0px;
        }
        .logo{
            height: 80px;
            width: auto;
            display: block;
            margin: 10px auto;
        }
        .title{
            text-align:center ;
        }
        .sub_head{
            text-align: center;
        }
        .container{
            box-sizing: border-box;
            width: 80%;
            margin: auto;
        }
        .items_order{
            display: flex;
            justify-content: space-between;
        }
        .items_info{
            width: 30%;
        }
        .item_text{
            width: 70%;
        }
        .img{
            height: 120px;
            width: 120px;
        }
    </style>
    </head>";
    $html = "
    <body>
    <div class='container'>
        <img class='logo' src='https://lh3.googleusercontent.com/pw/AM-JKLV2ei5S7E0LRc5ds27u4EdHlZdJCbiMOgQdBThWpQ0ehbIKzdRRn74GaKHrkbqlxYKDMAnypZxVfDGKwXOAykobqxynOLOzqA9Xi68Mk-2zk-6-G0ZN3PnMGCT6EZmJlRuz8gTHzROF4STegcGh-Pxb=w1317-h270-no?authuser=0' alt='logo'>
        <h2 class='sub_head'>Thank you for your order!</h2>
        <h3>ITEMS ORDERED</h3><hr/>
    ";
    $msg = $msg.$html;

            while($product = mysqli_fetch_assoc($result)){
                $text_product = "
        <div class='items_order'>
            <div class='item_info'>
                <img class='img' src='https://raw.githubusercontent.com/RohilPrajapati/test1/main/upload/".$product['image']."' alt='item_1' >
            </div>
            <div class='item_text'>
                <h1>". $product['title']."</h1>
                <p>Price:". $product['order_price'] ."</p>
                <p>Quantity :".$product['quantity'] ."</p>
            </div>
        </div>";
                $msg = $msg.$text_product;
            }
        
        $msg = $msg."
        <hr>
        <div class='item_total'>
            Total: ".$payment['total_amt'] ."
        </div>
    </div>
        
</body>
</html>
    ";
    send_mail($email,"Order Have Been Placed",$msg);
}

?>
