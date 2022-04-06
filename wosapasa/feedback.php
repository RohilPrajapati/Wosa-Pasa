<?php 
    if($_POST){
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'assets/component/head.php' ?>
    <title>Feedback</title>
</head>
<body>
    <?php require_once 'assets/component/topnav.php' ?>
    <div class="container">
        <h1 class="header">Feedback</h1>
        <form action="" method="post" class="feedback_form" >
            <input class="feedback_input" type="text" placeholder="Title/Issue"><br>
            <textarea class="feedback_textarea" id="" placeholder = "Describe Message"></textarea><br>
            <input class="btn" type="submit" value="Send Feedback">
            <input class="btn" type="button" value="Cancel" onclick="window.location.href='/index.php'">
        </form>
    </div>
</body>
</html>