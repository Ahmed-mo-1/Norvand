<?php

//remove_action ('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
//remove_action("woocommerce_sidebar", "woocommerce_get_sidebar");
//remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
//remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0 );
//remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );



remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
add_filter('the_generator', '__return_null');
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 ); 
remove_action('wp_head', 'rsd_link');
remove_filter('wp_robots', 'wp_robots_max_image_preview_large');
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
function remove_wp_head_scripts() {
wp_dequeue_script('jquery');
wp_dequeue_script('jquery-core');
}
//add_action('wp_enqueue_scripts', 'remove_wp_head_scripts', 999);



function remove_default_wp_styles() {
wp_dequeue_style('wp-block-library');
wp_dequeue_style('wp-block-library-rtl');
wp_dequeue_style('wp-block-library-theme');
wp_dequeue_style('wp-block-library-editor');
}
add_action('wp_enqueue_scripts', 'remove_default_wp_styles', 999);

function remove_default_wp_scripts() {
wp_dequeue_script('wp-embed');
}
add_action('wp_enqueue_scripts', 'remove_default_wp_scripts', 999);

//add_action( 'wp', 'bbloomer_remove_default_sorting_storefront' );
  
function bbloomer_remove_default_sorting_storefront() {
   remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
   remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );
}
?>