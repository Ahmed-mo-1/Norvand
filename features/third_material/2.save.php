<?php

//save

add_action('woocommerce_process_product_meta', 'save_third_material_product_data_fields');
function save_third_material_product_data_fields($post_id) {
    $fields = array(
        'fabric_blue', 'fabric_gold', 'fabric_gray', 'fabric_light_blue',
        'fabric_oliver', 'fabric_pink', 'fabric_red', 'fabric_rosegold',
        'fabric_white', 'fabric_black', 'fabric_white_black', 'marble_pink_brown', 'marble_white_black'
    );

    foreach ($fields as $field) {
        $product = isset($_POST['_third_material_' . $field]) ? sanitize_text_field($_POST['_third_material_' . $field]) : '';
        update_post_meta($post_id, '_third_material_' . $field, $product);
    }
}

?>