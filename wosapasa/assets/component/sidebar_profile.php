<div class="col_4 profile_side_panel">
<?php if($user['is_admin']==1){
    ?>
        <a href="/admin/dashboard.php" class="side_panel_link">
            <div class="side_panel_item">
                Admin Dashboard
            </div>
        </a>
    <?php 
        }
    ?>
    <a href="/account/profile.php" class="side_panel_link">
        <div class="side_panel_item">
            My Profile
        </div>
    </a>
    <a href="/myfeedback.php" class="side_panel_link">
        <div class="side_panel_item">
            My Feedback
        </div>
    </a>
    <a href="/myorder.php" class="side_panel_link">
        <div class="side_panel_item">
            My Order
        </div>
    </a>
    <a href="/account/logout.php" class="side_panel_link">
        <div class="side_panel_item danger_btn">
            Logout
        </div>
    </a>
</div>