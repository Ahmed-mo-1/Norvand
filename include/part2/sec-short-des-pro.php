<?php

// Adding meta boxes for third, fourth descriptions, and images
add_action('add_meta_boxes', 'sec_short_des2');

function sec_short_des2() {
    add_meta_box(
        'custom_product_meta_box_short2',
        'Product short description2',
        'bbloomer_add_custom_content_meta_box_short2',
        'product',
        'normal',
        'default'
    );

}


function bbloomer_add_custom_content_meta_box_short2($post) {
    $short_desc2 = get_post_meta($post->ID, '_short_desc2', true) ? get_post_meta($post->ID, '_short_desc2', true) : '';   
    wp_editor($short_desc2, '_short_desc2');
}


// Save the third, fourth descriptions, and images
add_action('save_post_product', 'bbloomer_save_custom_content_meta_box22', 10, 1);

function bbloomer_save_custom_content_meta_box22($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['_short_desc2'])) {
        update_post_meta($post_id, '_short_desc2', $_POST['_short_desc2']);
    }
}

// Optional: Add shortcodes for third, fourth descriptions, and images if needed
add_shortcode('pro_short_desc2', 'bbloomer_short_desc2_shortcode');

function bbloomer_short_desc2_shortcode() {
    global $product;
    $short_desc2 = get_post_meta($product->get_id(), '_short_desc2', true) ? get_post_meta($product->get_id(), '_short_desc2', true) : '';
    return $short_desc2 ? '<!--<div class="short-description2">-->' . $short_desc2 . '<!--</div>-->' : '';
}


?>
