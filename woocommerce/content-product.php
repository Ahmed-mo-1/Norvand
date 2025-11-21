<?php
defined( 'ABSPATH' ) || exit;
global $product;
if ( empty( $product ) || ! $product->is_visible() ) { return; }
?>

<!-- li to div -->
<div <?php wc_product_class( '', $product ); ?>>
<?php
include get_theme_file_path('woocommerce/archive-page/product-card/1.thumbnails.php');
include get_theme_file_path('woocommerce/archive-page/product-card/2.title.php');
include get_theme_file_path('woocommerce/archive-page/product-card/3.excerpt.php');
include get_theme_file_path('woocommerce/archive-page/product-card/4.price.php');
?>
</div>
<!-- li to div -->