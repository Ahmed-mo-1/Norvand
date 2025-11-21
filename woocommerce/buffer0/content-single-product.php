<?php
defined( 'ABSPATH' ) || exit;
global $product;
if ( post_password_required() ) { echo get_the_password_form(); return; }
?>

<!-- start prooo -->
<div class="container-product-data">
<?php
//imgs
include_once get_theme_file_path('woocommerce/product-page/1.images.php');
//data
include_once get_theme_file_path('woocommerce/product-page/2.data.php');
?>
<!-- end prooo -->
</div>

<?php
//warrenty banner
include_once get_theme_file_path('woocommerce/product-page/3.warrenty.php');
//handmade banner
include_once get_theme_file_path('woocommerce/product-page/4.handmade.php');
//related products
include_once get_theme_file_path('woocommerce/product-page/5.related_products.php');

//faq
include_once get_theme_file_path('woocommerce/product-page/6.faq.php');
//bestsellers
include_once get_theme_file_path('woocommerce/product-page/7.bestsellers.php');
//reviews
do_shortcode('[reviews]');
//instaslide
do_shortcode('[insta_slide]');
//happiness
include_once get_theme_file_path('woocommerce/product-page/8.happiness.php');
?>

<style>
.swiper .selected-color {display : none}
.swiper .woocommerce-loop-product__title {font-size : 20px}
</style>


