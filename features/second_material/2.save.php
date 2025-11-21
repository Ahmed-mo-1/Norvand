<?php

//save

add_action('woocommerce_process_product_meta', 'save_second_material_product_data_fields');
function save_second_material_product_data_fields($post_id) {
    $fields = array(
        'white_stone', 'lightblue_stone', 'red_stone', 'green_stone',
        'black_stone', 'purple_stone', 'blue_stone', 'lightgreen_stone',
        'pink_stone', 'cyan_stone', 'gray_stone', 'brown_stone', 'coffee_stone'
    );

    foreach ($fields as $field) {
        $product = isset($_POST['_second_material_' . $field]) ? sanitize_text_field($_POST['_second_material_' . $field]) : '';
        update_post_meta($post_id, '_second_material_' . $field, $product);
    }
}

?>