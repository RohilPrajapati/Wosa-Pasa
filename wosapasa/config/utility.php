<?php
    require_once "dbconfig.php";
    function redirectAlertMessage($msg,$url){
        echo "
            <script>
                alert('$msg');;
            </script>
        ";
        header('refresh:0;url= '.$url);
    }

    function fetch_user($id,$conn){
        $q_user = "SELECT * from users  where user_id ='$id'";
        $result = mysqli_query($conn,$q_user);
        if(mysqli_num_rows($result)!=0){
            $user = mysqli_fetch_assoc($result);
            return $user;
        }else{
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
    function send_mail($to,$title_msg,$msg){
        $to = $to;
		$title = $title_msg;
		$message = $msg;
		$headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From:royalprajapati@gmail.com";
        if(mail($to,$title,$message,$headers)) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
    }

    function pay_esewa($amt,$pid){
        $url = "https://uat.esewa.com.np/epay/main";
        $data =[
            'amt'=> $amt,
            'pdc'=> 0,
            'psc'=> 0,
            'txAmt'=> 0,
            'tAmt'=> $amt,
            'pid'=>$pid,
            'scd'=> 'EPAYTEST',
            'su'=>'http://127.0.0.1:80/payment/esewaSuccess.php?q=su',
            'fu'=>'http://127.0.0.1:80/payment/esewaFail.php?q=fu'
        ];
    ?>
        <form id="myForm" action="<?= $url ?>" method="post">
        <?php
            foreach ($data as $name => $value) {
                echo '<input type="hidden" name="'.htmlentities($name).'" value="'.htmlentities($value).'">';
            }
        ?>
        </form>
        <script type="text/javascript">
            document.getElementById('myForm').submit();
        </script>
        <?php
    }
?>