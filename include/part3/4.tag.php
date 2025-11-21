<div id="tag" style="display : none">

    <?php 
$posttags = get_the_terms( get_the_ID(), 'product_tag' );
foreach($posttags as $product_tag) {
echo $product_tag->description;}
echo do_shortcode("[pro_tags]");
?>
</div>