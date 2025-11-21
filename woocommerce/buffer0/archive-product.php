<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

?>

<div class="woocommerce-before-main-content">
    <?php woocommerce_breadcrumb(); ?>
</div>


<header class="woocommerce-products-header">
    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
        <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
    <?php endif; ?>

    <?php
    do_action( 'woocommerce_archive_description' );
    ?>
</header>

<?php

if ( woocommerce_product_loop() ) {

?>

    <div class="woocommerce-before-shop-loop">
        <?php
        woocommerce_result_count();
        woocommerce_catalog_ordering();
        ?>
    </div>

<?php

	woocommerce_product_loop_start();

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

	woocommerce_product_loop_end();

?>

    <div class="woocommerce-after-shop-loop">
        <?php
        woocommerce_pagination();
        ?>
    </div>

<?php

} else {
?>

    <div class="woocommerce-no-products-found">
        <?php
        wc_get_template( 'loop/no-products-found.php' );
        ?>
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
<?php
get_sidebar();

get_footer( 'shop' );
