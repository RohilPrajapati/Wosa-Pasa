<?php
    require "dbconfig.php";
    function redirectAlertMessage($msg,$url){
        echo "
            <script>
                alert('$msg');;
            </script>
        ";
        header('refresh:0;url= '.$url);
    }
?>