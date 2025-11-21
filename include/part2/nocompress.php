<?php

function my_theme_enqueue_styles() {
    wp_enqueue_style( 'elementor-frontend', ELEMENTOR_ASSETS_URL . 'css/frontend.min.css', array(), ELEMENTOR_VERSION );
    wp_enqueue_script( 'elementor-frontend', ELEMENTOR_ASSETS_URL . 'js/frontend.min.js', array(), ELEMENTOR_VERSION, true );
}
//add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

?>

<?php
/*
function disable_image_sizes( $sizes ) {
    return [];
}
add_filter( 'intermediate_image_sizes', 'disable_image_sizes' );
*/
?>
<?php

function disable_other_image_sizes( $sizes ) {
    $keep = array( 'thumbnail', 'full' );
    return array_intersect( $sizes, $keep );
}
add_filter( 'intermediate_image_sizes', 'disable_other_image_sizes' );

?>