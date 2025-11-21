<?php
defined( 'ABSPATH' ) || exit;
global $product;
if ( empty( $product ) || ! $product->is_visible() ) { return; }
?>

<!-- li to div -->
<div <?php wc_product_class( '', $product ); ?>>

<?php
//before
echo "<div class='imgcontainer'>";
//before
echo '<a href="' . get_the_permalink() . '">';
echo woocommerce_get_product_thumbnail();
echo '</a>';

//after
echo apply_filters(
	'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
	sprintf(
		'<a href="%s" data-quantity="%s" class="%s cartico" %s aria-label="add-to-cart">
        <img src="%s/wp-content/themes/liteswift/assets/svgs/cart-add.svg" alt="addtocart">
		</a>',
		//esc_url( $product->add_to_cart_url() ),
		esc_url( get_permalink( $product->get_id() ) ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args['class'] ) ? $args['class'] : '/*button*/' ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( home_url() ),
		esc_html( $product->add_to_cart_text() ),

	),
	$product,
);

echo "</div>";   
//after

echo '<h2 class="woocommerce-loop-product__title">' . get_the_title() . '</h2>';

//addition
	echo the_excerpt();
//addition

echo woocommerce_template_loop_price();
echo woocommerce_template_loop_rating();

//echo woocommerce_template_loop_add_to_cart();
?>
<!-- li to div -->
</div>

<!-- adding -->
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