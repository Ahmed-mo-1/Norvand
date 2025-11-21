<?php

function disable_plugins_on_specific_pages() {
    // Array of pages where you want to disable plugins
    $pages_to_disable_plugins = array(
        'about-us',
        '/'
    );

    // Array of plugins to disable
    $plugins_to_disable = array(
        'woocommerce/woocommerce.php',
        //'another-plugin-folder/another-plugin-file.php'
            'liteswift-product-options/wpc-product-options.php',
            'liteswift-product-options/index.php',
    );

    // Check if the current page is in the array of pages to disable plugins
    if (is_page($pages_to_disable_plugins)) {
        global $wp_plugins;

        foreach ($plugins_to_disable as $plugin) {
            if (isset($wp_plugins[$plugin])) {
                unset($wp_plugins[$plugin]);
            }
        }
    }
}
add_action('plugins_loaded', 'disable_plugins_on_specific_pages');

function disable_plugins_on_home_page() {
    // Array of plugins to disable
    $plugins_to_disable = array(
        'woocommerce/woocommerce.php',
        //'another-plugin-folder/another-plugin-file.php',
            'liteswift-product-options/wpc-product-options.php',
            'liteswift-product-options/index.php',
    );

    // Check if the current page is the home page
    if (is_front_page()) {
        global $wp_plugins;

        foreach ($plugins_to_disable as $plugin) {
            if (isset($wp_plugins[$plugin])) {
                unset($wp_plugins[$plugin]);
            }
        }
    }
}
add_action('plugins_loaded', 'disable_plugins_on_home_page');



function disable_wp_blocks() {
    if (!is_admin()) {
    $wstyles = array(
        'wp-block-library',
        'wc-blocks-style',
        'wc-blocks-style-active-filters',
        'wc-blocks-style-add-to-cart-form',
        'wc-blocks-packages-style',
        'wc-blocks-style-all-products',
        'wc-blocks-style-all-reviews',
        'wc-blocks-style-attribute-filter',
        'wc-blocks-style-breadcrumbs',
        'wc-blocks-style-catalog-sorting',
        'wc-blocks-style-customer-account',
        'wc-blocks-style-featured-category',
        'wc-blocks-style-featured-product',
        'wc-blocks-style-mini-cart',
        'wc-blocks-style-price-filter',
        'wc-blocks-style-product-add-to-cart',
        'wc-blocks-style-product-button',
        'wc-blocks-style-product-categories',
        'wc-blocks-style-product-image',
        'wc-blocks-style-product-image-gallery',
        'wc-blocks-style-product-query',
        'wc-blocks-style-product-results-count',
        'wc-blocks-style-product-reviews',
        'wc-blocks-style-product-sale-badge',
        'wc-blocks-style-product-search',
        'wc-blocks-style-product-sku',
        'wc-blocks-style-product-stock-indicator',
        'wc-blocks-style-product-summary',
        'wc-blocks-style-product-title',
        'wc-blocks-style-rating-filter',
        'wc-blocks-style-reviews-by-category',
        'wc-blocks-style-reviews-by-product',
        'wc-blocks-style-product-details',
        'wc-blocks-style-single-product',
        'wc-blocks-style-stock-filter',
        'wc-blocks-style-cart',
        'wc-blocks-style-checkout',
        'wc-blocks-style-mini-cart-contents',
        'classic-theme-styles-inline'
    );

    foreach ( $wstyles as $wstyle ) {
        wp_deregister_style( $wstyle );
    }

    $wscripts = array(
        'wc-blocks-middleware',
        'wc-blocks-data-store'
    );

    foreach ( $wscripts as $wscript ) {
        wp_deregister_script( $wscript );  
    }
}}

add_action( 'init', 'disable_wp_blocks', 100 );



//woocommerce/includes/admin/class-wc-admin-assets.php

function dequeue_wc_blocks_rtl_css() {
    wp_dequeue_style('wc-blocks-style-rtl');
    wp_deregister_style('wc-blocks-style-rtl');
    wp_dequeue_style('product-options-datepicker');
    wp_dequeue_style('woocommerce-inline');
    wp_dequeue_style('classic-theme-styles');

    wp_dequeue_script('wpcpo-frontend');
    wp_dequeue_script('wp-color-picker');
    wp_dequeue_script('wpcdpk');


    wp_dequeue_style('global-styles');
    // Dequeue the frontend.css
    wp_dequeue_style('wpcpo-frontend');
    wp_dequeue_style('wpcdpk');
    // Dequeue the color-picker-rtl.min.css
    wp_dequeue_style('wp-color-picker-rtl');
    wp_dequeue_style('wp-color-picker');
}
add_action('wp_enqueue_scripts', 'dequeue_wc_blocks_rtl_css', 100);





?>