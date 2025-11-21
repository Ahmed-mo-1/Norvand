<div class="products_container">

<?php if ( woocommerce_product_loop() ) { ?>

<div class="product-catalog content">

<?php 

if ( wc_get_loop_prop( 'total' ) ) { while ( have_posts() ) {
the_post();
//do_action( 'woocommerce_shop_loop' );
wc_get_template_part( 'content', 'product' );
}}

?>

</div>

<div class=""><?php woocommerce_pagination(); ?></div>
<!-- dynamic pagination -->

<?php } else { wc_get_template( 'loop/no-products-found.php' ); } ?>

</div>