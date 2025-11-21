<?php
function archive() { 
?>

<?php
defined( 'ABSPATH' ) || exit;
get_header( 'shop' );
?>

<div class="container">

<?php do_action( 'woocommerce_shop_loop_header' ); ?>


<!--<div class="swiper">-->
<div class="products_container">

<?php
if ( have_posts() ) :
?>

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
while ( have_posts() ) { the_post();
?>

<div>
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