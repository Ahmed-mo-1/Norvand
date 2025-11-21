<?php
defined( 'ABSPATH' ) || exit;
global $product;
if ( empty( $product ) || ! $product->is_visible() ) { return; }
?>

<li <?php wc_product_class( '', $product ); ?>>

<?php
echo '<a href="' . get_the_permalink() . '">';
echo woocommerce_get_product_thumbnail();
echo '</a>';

echo '<h2 class="woocommerce-loop-product__title">' . get_the_title() . '</h2>';

echo woocommerce_template_loop_price();
echo woocommerce_template_loop_rating();

echo woocommerce_template_loop_add_to_cart();
?>

</li>