<div class="search_filter">
    <div class="filter_toogler"><i class="fa-solid fa-filter"></i> Filter</div>
    <form id="ad_search" action="advanceSearch.php" onsubmit="event.preventDefault(); advance_search()" method="GET">
        <input type="hidden" name ="query" id="a_search_input">
        <label for="min_price">Minimum Price :</label>
        <input type="number" id="min_price" name="min_price" placeholder="Minimum Price" 
        value="<?php if($_GET['min_price']){echo $_GET['min_price'];}else{ echo 0;}?>" onclick="select()">
        <label for="min_price">Maximum Price :</label>
        <input type="number" id="max_price" name="max_price" placeholder="Maximum Price"
        value="<?php if($_GET['max_price']){echo $_GET['max_price'];}else{
            echo 10000;
        } ?>" onclick="select()">
        <input type="submit" value="search">
        <div id="as_price_error"></div>
    </form>
</div>