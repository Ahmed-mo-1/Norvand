<?php
defined( 'ABSPATH' ) || exit;
global $product;


do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

<?php
do_shortcode('[imggallery]');
//do_action( 'woocommerce_before_single_product_summary' );
?>

<div class="summary entry-summary">
<h1 class="product_title entry-title"><?php echo __(get_the_title(), 'MVLS'); ?></h1>
<?php
echo do_shortcode('[price]');
woocommerce_template_single_add_to_cart();




/*

    do_action( 'woocommerce_before_add_to_cart_form' );

        if ( $product && $product->is_purchasable() && $product->is_in_stock() ) {
            switch ( $product->get_type() ) {
                case 'simple':
                    wc_get_template( 'single-product/add-to-cart/simple.php' );
                    break;
                case 'variable':
                    wc_get_template( 'single-product/add-to-cart/variable.php' );
                    break;
                case 'grouped':
                    wc_get_template( 'single-product/add-to-cart/grouped.php' );
                    break;
                case 'external':
                    wc_get_template( 'single-product/add-to-cart/external.php' );
                    break;
                default:
                    wc_get_template( 'single-product/add-to-cart/simple.php' );
                    break;
            }
        }

    do_action( 'woocommerce_after_add_to_cart_form' );

*/


/*
    do_action( 'woocommerce_before_add_to_cart_form' );

    do_action( 'woocommerce_before_add_to_cart_button' );

    if ( $product->is_purchasable() && $product->is_in_stock() ) {
        if ( $product->is_type( 'simple' ) ) {
            wc_get_template( 'single-product/add-to-cart/simple.php' );
        } elseif ( $product->is_type( 'variable' ) ) {
            wc_get_template( 'single-product/add-to-cart/variable.php' );
        } elseif ( $product->is_type( 'grouped' ) ) {
            wc_get_template( 'single-product/add-to-cart/grouped.php' );
        } elseif ( $product->is_type( 'external' ) ) {
            wc_get_template( 'single-product/add-to-cart/external.php' );
        }
    }

    do_action( 'woocommerce_after_add_to_cart_button' );
    do_action( 'woocommerce_after_add_to_cart_form' );
*/

//do_action( 'woocommerce_single_product_summary' );
?>



</div>

<?php
//do_action( 'woocommerce_after_single_product_summary' );
do_shortcode('[packaging]');
do_shortcode('[packaging1]');
echo do_shortcode('[dynamic_products limit="10"]');

do_shortcode('[faq]');
echo '<h2 class="p20">الاكثر مبيعاً</h2>';
do_shortcode('[trends]');
echo '<div style="width : 150px ; margin : 0 auto 40px auto"><a href="https://norvandshop.com/shop/best-sellers/" class="button" style="">تسوق المزيد</a><br></div>';
//do_shortcode('[custom_products category="best-sellers"]');
do_shortcode('[insta_slide]');
?>
</div>
<?php //do_action( 'woocommerce_after_single_product' ); ?>
