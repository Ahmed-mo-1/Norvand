<?php

// Add custom product data tab
add_filter('woocommerce_product_data_tabs', 'add_third_material_product_data_tab');
function add_third_material_product_data_tab($tabs) {
    $tabs['third_material_tab'] = array(
        'label'    => __('third Material', 'woocommerce'),
        'target'   => 'third_material_product_data',
        'class'    => array('show_if_simple', 'show_if_variable'),
    );
    return $tabs;
}

// Add custom fields to the tab
add_action('woocommerce_product_data_panels', 'add_third_material_field');
function add_third_material_field() {
    global $post;

    echo '<div id="third_material_product_data" class="panel woocommerce_options_panel">';
    echo '<div class="options_group">';

    $products = wc_get_products(array('status' => 'publish','limit' => -1));
    $options = array('' => __('None', 'woocommerce'), 'self' => __('Self', 'woocommerce'));
    foreach ($products as $product) {
        $options[$product->get_id()] = $product->get_name();
    }

    $fields = array(
        'fabric_blue', 'fabric_gold', 'fabric_gray', 'fabric_light_blue',
        'fabric_oliver', 'fabric_pink', 'fabric_red', 'fabric_rosegold',
        'fabric_white', 'fabric_black', 'fabric_white_black', 'marble_pink_brown', 'marble_white_black'
    );

    foreach ($fields as $field) {
        woocommerce_wp_select(array(
            'id'          => '_third_material_' . $field,
            'label'       => ucfirst($field),
            'description' => __('Select a product for ' . $field, 'woocommerce'),
            'options'     => $options
        ));
    }

    echo '</div>';
    echo '</div>';
}

?>