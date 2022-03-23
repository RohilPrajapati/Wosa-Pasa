<?php 
    require_once (__DIR__.'\..\..\config\dbconfig.php');
    require_once (__DIR__.'\..\..\config\utility.php');
    // require_once '/../../config/dbconfig.php';
    // require_once '/../../config/utility.php';
    if(!isset($page)){
        $page = 'home';
    }
    session_start();
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        $user = fetch_user($id,$conn);
    }
?>
<div class="topnav">
    <a href="../../index.php"><img class="nav_logo" src ="/assets/image/design_wosa_pasa.png" alt="logo"></a>
    <i  id="nav_icon" class="fa-solid fa-bars fa-lg" onclick="nav_toggler()"></i>
    <ul class="nav_menu" id="nav_menu">
        <li class="nav_item <?php if($page == 'home'){echo 'active';} ?>"><a class="nav_link" href="/">Home</a></li>
        <li class="nav_item nav_item <?php if($page == 'cart'){echo 'active';} ?>"><a class="nav_link" href="">Cart</a></li>
        <?php if(isset($_SESSION['id'])){?>
        <li class="nav_item nav_profile <?php if($page == 'profile'){echo 'active';} ?>"><a class="nav_link" href="/account/profile.php"><?= $user['username'] ?></a>
        <ul class="sub_menu">
                <li class="sub_nav_item"><a class="nav_link" href="/account/logout.php">Logout</a></li>
            </ul>
        </li>
        
        <?php }else{?>
                <li class="nav_item <?php if($page == 'login'){echo 'active';} ?>"><a class="nav_link" href="/account/login.php">Login</a></li>
                <li class="nav_item <?php if($page == 'signup'){echo 'active';} ?>"><a class="nav_link" href="/account/signup.php">Sign-up</a></li>
        <?php } ?>
    </ul>
</div>