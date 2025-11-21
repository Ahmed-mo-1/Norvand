
<?php
/*
// Disable default image sizes
function disable_default_image_sizes( $sizes ) {
    unset( $sizes['thumbnail']);
    unset( $sizes['medium']);
    unset( $sizes['medium_large']);
    unset( $sizes['large']);
    unset( $sizes['1536x1536']);
    unset( $sizes['2048x2048']);
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'disable_default_image_sizes');

// Disable additional image sizes set by themes/plugins
function remove_additional_image_sizes() {
    remove_image_size('woocommerce_thumbnail');
    remove_image_size('woocommerce_single');
    remove_image_size('woocommerce_gallery_thumbnail');
}
add_action('init', 'remove_additional_image_sizes');

function disable_image_sizes( $sizes ) {
    return [];
}
add_filter( 'intermediate_image_sizes', 'disable_image_sizes' );
*/

/*
// Change the size of medium_large images
function custom_medium_large_image_size() {
    // Set the size dimensions
    update_option('medium_large_size_w', 2000); // Set the width
    update_option('medium_large_size_h', 2000); // Set the height
}
add_action('after_setup_theme', 'custom_medium_large_image_size');


//include_once 'include/part1/sizes.php';

//add_action( 'after_setup_theme', 'custom_woocommerce_image_dimensions', 1 );

function custom_woocommerce_image_dimensions() {
    // Image sizes
    $catalog = array(
        'width'  => '1000',   // px
        'height' => '1000',   // px
        'crop'   => 1        // true
    );

    $single = array(
        'width'  => '2000',   // px
        'height' => '2000',   // px
        'crop'   => 1        // true
    );

    $thumbnail = array(
        'width'  => '1000',   // px
        'height' => '1000',   // px
        'crop'   => 1        // true
    );

    // Updating image sizes
    update_option( 'woocommerce_thumbnail_image_width', $catalog['width'] );
    update_option( 'woocommerce_thumbnail_cropping', 'yes' );
    update_option( 'woocommerce_thumbnail_cropping_width', $catalog['width'] );
    update_option( 'woocommerce_thumbnail_cropping_height', $catalog['height'] );

    update_option( 'woocommerce_single_image_width', $single['width'] );
    update_option( 'woocommerce_single_cropping', 'yes' );
    update_option( 'woocommerce_single_cropping_width', $single['width'] );
    update_option( 'woocommerce_single_cropping_height', $single['height'] );

    update_option( 'woocommerce_gallery_thumbnail_image_width', $thumbnail['width'] );
    update_option( 'woocommerce_gallery_thumbnail_cropping', 'yes' );
    update_option( 'woocommerce_gallery_thumbnail_cropping_width', $thumbnail['width'] );
    update_option( 'woocommerce_gallery_thumbnail_cropping_height', $thumbnail['height'] );
}


// Disable WordPress image compression
add_filter( 'jpeg_quality', function( $arg ) {
    return 100; // Set the quality to 100 (maximum)
});

// Bypass WooCommerce image sizes
add_filter('woocommerce_get_image_size_gallery_thumbnail', 'custom_woocommerce_image_size');
add_filter('woocommerce_get_image_size_single', 'custom_woocommerce_image_size');
add_filter('woocommerce_get_image_size_thumbnail', 'custom_woocommerce_image_size');

function custom_woocommerce_image_size($size) {
    return array(
        'width'  => 0,
        'height' => 0,
        'crop'   => 0,
    );
}

// Disable responsive images
add_filter( 'wp_calculate_image_srcset', '__return_false' );

*/
//maintaniance

?>






<?php

/*
// Change the size of medium_large images
function custom_medium_large_image_size() {
    // Set the size dimensions
    update_option('medium_large_size_w', 1900); // Set the width
    update_option('medium_large_size_h', 1900); // Set the height
    update_option('large_size_w', 1500); // Set the width
    update_option('large_size_h', 1500); // Set the height
}
add_action('after_setup_theme', 'custom_medium_large_image_size');

// Disable default image sizes
function disable_default_image_sizes( $sizes ) {
    unset( $sizes['thumbnail']);
    //unset( $sizes['medium']);
    //unset( $sizes['medium_large']);
    //unset( $sizes['large']);
    unset( $sizes['1536x1536']);
    unset( $sizes['2048x2048']);
    unset( $sizes['wc_order_status_icon']);
    
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'disable_default_image_sizes');

// Disable additional image sizes set by themes/plugins
function remove_additional_image_sizes() {
    remove_image_size('woocommerce_thumbnail');
    remove_image_size('woocommerce_single');
    remove_image_size('woocommerce_gallery_thumbnail');
}
add_action('init', 'remove_additional_image_sizes');




// Disable responsive images
add_filter( 'wp_calculate_image_srcset', '__return_false' );

// Disable WordPress image compression
add_filter( 'jpeg_quality', function( $arg ) {
    return 100; // Set the quality to 100 (maximum)
});


include_once 'include/part1/sizes.php';


//add_action( 'after_setup_theme', 'custom_woocommerce_image_dimensions', 1 );

function custom_woocommerce_image_dimensions() {
    // Image sizes
    $catalog = array(
        'width'  => '1500',   // px
        'height' => '1500',   // px
        'crop'   => 1        // true
    );

    $single = array(
        'width'  => '1500',   // px
        'height' => '1500',   // px
        'crop'   => 1        // true
    );

    $thumbnail = array(
        'width'  => '1500',   // px
        'height' => '1500',   // px
        'crop'   => 1        // true
    );

    // Updating image sizes
    update_option( 'woocommerce_thumbnail_image_width', $catalog['width'] );
    update_option( 'woocommerce_thumbnail_cropping', 'yes' );
    update_option( 'woocommerce_thumbnail_cropping_width', $catalog['width'] );
    update_option( 'woocommerce_thumbnail_cropping_height', $catalog['height'] );

    update_option( 'woocommerce_single_image_width', $single['width'] );
    update_option( 'woocommerce_single_cropping', 'yes' );
    update_option( 'woocommerce_single_cropping_width', $single['width'] );
    update_option( 'woocommerce_single_cropping_height', $single['height'] );

    update_option( 'woocommerce_gallery_thumbnail_image_width', $thumbnail['width'] );
    update_option( 'woocommerce_gallery_thumbnail_cropping', 'yes' );
    update_option( 'woocommerce_gallery_thumbnail_cropping_width', $thumbnail['width'] );
    update_option( 'woocommerce_gallery_thumbnail_cropping_height', $thumbnail['height'] );
}




// Bypass WooCommerce image sizes
add_filter('woocommerce_get_image_size_gallery_thumbnail', 'custom_woocommerce_image_size');
add_filter('woocommerce_get_image_size_single', 'custom_woocommerce_image_size');
add_filter('woocommerce_get_image_size_thumbnail', 'custom_woocommerce_image_size');

function custom_woocommerce_image_size($size) {
    return array(
        'width'  => 1500,
        'height' => 1500,
        'crop'   => 1,
    );
}






// WooCommerce uses srcset by default, but ensure it's enabled
add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');

*/

?>

