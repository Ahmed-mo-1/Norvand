<?php

function woocommerce_support(){

add_theme_support("post-thumbnails");

add_theme_support("woocommerce");
// array("thumbnails_image_width" => 150,"single_image_width" => 200,"product_grid" => array())
// );

add_theme_support("woocommerce");
    
add_theme_support("custom-logo");

//add_theme_support( 'wc-product-gallery-zoom' );
//add_theme_support( 'wc-product-gallery-lightbox' );
//add_theme_support( 'wc-product-gallery-slider' );


//add_theme_support("wc-product-gallery-slider");

add_action('after_setup_theme', function() {
    add_theme_support('elementor');
});

}

add_action("after_setup_theme" , "woocommerce_support");

add_action("woocommerce_shop_loop_item_title", "the_excerpt")

?>