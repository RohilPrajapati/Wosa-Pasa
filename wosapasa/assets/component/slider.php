

<?php 
    $q_price = "SELECT min(price) min, max(price) max from products";
    $result = mysqli_query($conn,$q_price);
    $price = mysqli_fetch_assoc($result);?>
    <input type="hidden" id="min" value="<?= $price['min'] ?>">
    <input type="hidden" id="max" value="<?= $price['max'] ?>">
<p>
    <label for="amount">Price range:</label>
    <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
</p>

<div id="slider-range"></div>
<input type="hidden" name ="query" id="a_search_input">

<script>
    // console.log($('#min').val());
    // console.log($('#max').val());
    
    $(function() {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: $('#max').val(),
            values: [$('#min').val(),$('#max').val()],
            change: function(event, ui) {
                $("#amount").val("₹" + ui.values[0] + " - ₹" + ui.values[1]);
                // window.location.href = "http://127.0.0.1/advanceSearch.php?query=""&min_price=" + ui.values[0] + "&max_price=" + ui.values[1];
            }
        });
        $( "#amount" ).val( "₹" + $( "#slider-range" ).slider( "values", 0 ) +" - ₹" + $( "#slider-range" ).slider( "values", 1 ) );
    });
</script>