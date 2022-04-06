<div class="admin_nav">
    <h1>Wosa: Pasa:</h1>
    <ul class="admin_nav_menu">
        <a href="dashboard.php" class="admin_nav_link">
            <div class="admin_nav_item  <?php if ($page_title == 'dashboard') {
                                                            echo 'active';
                                                        } ?>">
                <i class="fa-brands fa-dashcube"></i>
                <li>Dashboard</li>
            </div>
        </a>
        <a href="profile.php" class="admin_nav_link ">
            <div class="admin_nav_item <?php if ($page_title == 'profile') {
                                                        echo 'active';
                                                    } ?>">
                <i class="fa-solid fa-user"></i>
                <li>Profile</li>
            </div>
        </a>
        <a href="category.php" class="admin_nav_link ">
            <div class="admin_nav_item <?php if ($page_title == 'category') {
                                                            echo 'active';
                                                        } ?>">
                <i class="fa-solid fa-file-lines"></i>
                <li>Category</li>
            </div>
        </a>
        <a href="product.php" class="admin_nav_link ">
            <div class="admin_nav_item <?php if ($page_title == 'product') {
                                                        echo 'active';
                                                    } ?>">
                <i class="fa-solid fa-shirt"></i>
                <li>Product</li>
            </div>
        </a>
        <a href="users.php" class="admin_nav_link ">
            <div class="admin_nav_item <?php if ($page_title == 'user') {
                                                        echo 'active';
                                                    } ?>">
                <i class="fa-solid fa-users"></i>
                <li>User</li>
            </div>
        </a>
        <a href="order.php" class="admin_nav_link ">
            <div class="admin_nav_item <?php if ($page_title == 'order') {
                                                        echo 'active';
                                                    } ?>">
                <i class="fa-solid fa-bag-shopping"></i>
                <li>Order</li>
            </div>
        </a>
        <a href="message.php" class="admin_nav_link ">
            <div class="admin_nav_item <?php if ($page_title == 'feedback') {
                                                        echo 'active';
                                                    } ?>">
                <i class="fa-solid fa-message "></i>
                <li>Feedback Message</li>
            </div>
        </a>
        <a href="logout.php" class="admin_nav_link">
            <div class="admin_nav_item">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <li class="bottom_item">Logout</li>

            </div>
        </a>
    </ul>
</div>