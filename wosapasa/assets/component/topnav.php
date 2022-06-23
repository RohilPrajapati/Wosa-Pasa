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
        <form action="/search.php" id="seachForm" class="search" onsubmit="event.preventDefault(); searchValidation()">
            <input type="text" id="search_input" name ="q" class="searchBox" placeholder="Search" 
                value="<?php if(isset($_GET['q'])){ echo $_GET['q']; }else if(isset($_GET['query'])){ echo $_GET['query'];}
                    ?>"
            >
            <input class="searchIcon" style="font-family: FontAwesome" value="&#xf002;" type="submit">
        </form>
        <li class="nav_item <?php if($page == 'home'){echo 'active';} ?>"><a class="nav_link" href="/">Home</a></li>
        <?php if(isset($_SESSION['id'])){?>
            <li class="nav_item nav_item <?php if($page == 'cart'){echo 'active';} ?>"><a class="nav_link" href="/cart.php">Cart</a></li>
            <li onclick="profileToggler();" class="nav_item nav_profile <?php if($page == 'profile'){echo 'active';} ?>"><span class="nav_link"><?= $user['username'] ?></span>
        <ul class="sub_menu" id="sub_menu">
                <li class="sub_nav_item"><a class="nav_link" href="/account/profile.php">Profile</a></li>
                <li class="sub_nav_item"><a class="nav_link" href="/myorder.php">My Order</a></li>
                <li class="sub_nav_item"><a class="nav_link" href="/myfeedback.php">My Feedback</a></li>
                <li class="sub_nav_item"><a class="nav_link" href="/account/logout.php">Logout</a></li>
            </ul>
        </li>
        <ul class="mb_view_menu">
                <li class="sub_nav_item"><a class="nav_link" href="/categorylist.php">Category List</a></li>
                <li class="sub_nav_item"><a class="nav_link" href="/account/profile.php">Profile</a></li>
                <li class="sub_nav_item"><a class="nav_link" href="/myorder.php">My Order</a></li>
                <li class="sub_nav_item"><a class="nav_link" href="/myfeedback.php">My Feedback</a></li>
                <li class="sub_nav_item"><a class="nav_link" href="/account/logout.php">Logout</a></li>
            </ul>
        </li>
        
        <?php }else{?>
                <li class="nav_item <?php if($page == 'login'){echo 'active';} ?>"><a class="nav_link" href="/account/login.php">Login</a></li>
                <li class="nav_item <?php if($page == 'signup'){echo 'active';} ?>"><a class="nav_link" href="/account/signup.php">Sign-up</a></li>
        <?php } ?>
    </ul>
</div>