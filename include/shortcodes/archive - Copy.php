<?php
function archive() { 
?>

<?php
defined( 'ABSPATH' ) || exit;
get_header( 'shop' );
?>

<div class="container">

<div id="startpro">
<?php do_action( 'woocommerce_shop_loop_header' ); ?>
</div>

<?php
do_action( 'woocommerce_before_shop_loop' );
echo do_shortcode("[catthirddesc]") ; 
?>

<div class="" style="border-bottom : 1px solid #cccccc ; display : flex ; justify-content : end">


<?php
include_once get_theme_file_path('include/shortcodes/archive_page/filter.php') ;
?>

</div>


<!--<div class="swiper">-->
<div class="products_container">

<?php
if ( have_posts() ) :
?>

<div class="sort-button-container" style="display : none">
    <button id="sort-by-date">Sort by Date</button>
    <button id="sort-by-price">Sort by Price</button>
</div>

<div class="product-catalog content">

<style>
.woocommerce div.product {
    margin-bottom: 0;
    position: relative;
    width: 100%;
    height: max-content;
}
</style>


<?php
include_once get_theme_file_path('include/shortcodes/archive_page/style1.php') ;
?>

<?php


$count = 0;
while ( have_posts() ) { the_post();


//include_once get_theme_file_path('include/shortcodes/archive_page/banner1.php') ;



$count++; 

if($count == 8){ echo do_shortcode('[category_meta thumbs="2"]'); }

if($count == 16){ echo do_shortcode('[category_meta thumbs="3"]'); }

if($count == 24){ echo do_shortcode('[category_meta thumbs="4"]'); }


defined( 'ABSPATH' ) || exit;
global $product;


if ( empty( $product ) || ! $product->is_visible() ) {
return;
}

?>





<?php

$custom_classes = 'product item';

$attributes = $product->get_attributes();

foreach ( $attributes as $attribute_name => $attribute ) {

if ( $attribute->is_taxonomy() ) {

$taxonomy = $attribute->get_taxonomy();
$terms = wp_get_post_terms( $product->get_id(), $taxonomy, array( 'fields' => 'names' ) );

foreach ( $terms as $term ) {
// Sanitize term to create a valid class name
$class_name = 'attribute-' . sanitize_title( $term );
$custom_classes .= ' ' . $class_name;
}

} 
else {
$options = $attribute->get_options();

foreach ( $options as $option ) {
$class_name = 'attribute-' . sanitize_title( $option );
$custom_classes .= ' ' . $class_name;
}

}

}




//date
$product_date = get_the_date('Y-m-d', $product->get_id());
$product_price = $product->get_price();
?>






<div <?php wc_product_class($custom_classes, $product); ?> data-date="<?php echo esc_attr($product_date); ?>" data-price="<?php echo esc_attr($product_price); ?>">
	<?php // echo __('p1', 'MVLS'); 
	do_action( 'woocommerce_before_shop_loop_item' );
	do_action( 'woocommerce_before_shop_loop_item_title' );
	//do_action( 'woocommerce_shop_loop_item_title' );
	//$title = esc_html(get_the_title());
	echo __(get_the_title(), 'MVLS');
	//echo sprintf(__('%s', 'MVLS'), $title);
	//echo __('get_the_title()', 'MVLS') . '<br>';
	echo the_excerpt();
	//	echo $product->the_excerpt();
	do_action( 'woocommerce_after_shop_loop_item_title' );
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
</div>
<?php }; ?>

</div>




<?php
//include_once get_theme_file_path('include/shortcodes/archive_page/pagination.php') ;
?>

<?php
else : wc_get_template( 'loop/no-products-found.php' );
endif;
?>

</div>


<?php
do_action( 'woocommerce_after_shop_loop' );
?>
</div>

<?php get_footer( 'shop' ); ?>

<?php }
add_shortcode( 'archive', 'archive' );
?>