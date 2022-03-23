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
?>