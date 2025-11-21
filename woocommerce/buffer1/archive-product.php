<?php
defined( 'ABSPATH' ) || exit;
get_header( 'shop' );
?>

<!-- after header before shop -->
<div class="container">


<!--
<div class="woocommerce-before-main-content">
<?php //woocommerce_breadcrumb(); ?>
</div>
-->

<header class="woocommerce-products-header">
    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
        <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
    <?php endif; ?>

    <?php
    do_action( 'woocommerce_archive_description' );
    ?>
</header>


<!--addition-->
<?php
echo do_shortcode("[catthirddesc]") ; 
?>


<!--addition-->
<div class="products_container">

<?php

if ( woocommerce_product_loop() ) {

?>

    <div class="woocommerce-before-shop-loop">
        <?php
        //woocommerce_result_count();
        //woocommerce_catalog_ordering();
        ?>
    </div>
<!--addition-->
<div class="product-catalog content">
<?php

	//woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	//woocommerce_product_loop_end();

?>
<!--addition-->
</div>

    <div class="woocommerce-after-shop-loop">
        <?php
        woocommerce_pagination();
        ?>
    </div>

<?php
//addition
do_shortcode('[afterca]');
//addition
} else {
?>

    <div class="woocommerce-no-products-found">
        <?php
        wc_get_template( 'loop/no-products-found.php' );
        ?>
    </div>
<!--addition-->
</div>

<?php
}
?>
<div class="woocommerce-after-main-content">
    <?php
    /**
     * Hook: woocommerce_after_main_content.
     *
     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
     */
    woocommerce_output_content_wrapper_end();
    ?>
</div>


<!-- after header before shop -->
</div>
<?php
//get_sidebar();
get_footer( 'shop' );
