<?php

// Add custom product data tab
add_filter('woocommerce_product_data_tabs', 'add_second_material_product_data_tab');
function add_second_material_product_data_tab($tabs) {
    $tabs['second_material_tab'] = array(
        'label'    => __('Second Material', 'woocommerce'),
        'target'   => 'second_material_product_data',
        'class'    => array('show_if_simple', 'show_if_variable'),
    );
    return $tabs;
}

// Add custom fields to the tab
add_action('woocommerce_product_data_panels', 'add_second_material_field');
function add_second_material_field() {
    global $post;

    echo '<div id="second_material_product_data" class="panel woocommerce_options_panel">';
    echo '<div class="options_group">';

    $products = wc_get_products(array('status' => 'publish','limit' => -1));
    $options = array('' => __('None', 'woocommerce'), 'self' => __('Self', 'woocommerce'));
    foreach ($products as $product) {
        $options[$product->get_id()] = $product->get_name();
    }

    $fields = array(
        'white_stone', 'lightblue_stone', 'red_stone', 'green_stone',
        'black_stone', 'purple_stone', 'blue_stone', 'lightgreen_stone',
        'pink_stone', 'cyan_stone', 'gray_stone', 'brown_stone', 'coffee_stone'
    );

    foreach ($fields as $field) {
        woocommerce_wp_select(array(
            'id'          => '_second_material_' . $field,
            'label'       => ucfirst($field),
            'description' => __('Select a product for ' . $field, 'woocommerce'),
            'options'     => $options
        ));
    }

    echo '</div>';
    echo '</div>';
}

?>