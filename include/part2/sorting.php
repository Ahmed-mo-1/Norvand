
<?php
function enqueue_custom_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-sorting', get_template_directory_uri() . '/js/custom-sorting.js', array('jquery'), time(), true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
?>
