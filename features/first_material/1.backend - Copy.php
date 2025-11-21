<?php


add_filter('woocommerce_product_data_tabs', 'add_material_product_data_tab');
function add_material_product_data_tab($tabs) {
    $tabs['material_tab'] = array(
        'label'    => __('First Material', 'woocommerce'),
        'target'   => 'material_product_data',
        'class'    => array('show_if_simple', 'show_if_variable'),
    );
    return $tabs;
}


//color
add_action('woocommerce_product_data_panels', 'add_first_material_field');
function add_first_material_field() {
    global $post;

    echo '<div id="material_product_data" class="panel woocommerce_options_panel">';
    echo '<div class="options_group">';

    $products = wc_get_products(array('status' => 'publish','limit' => -1));
    $options = array('' => __('None', 'woocommerce'), 'self' => __('Self', 'woocommerce'));
    foreach ($products as $product) {
        $options[$product->get_id()] = $product->get_name();
    }

    $fields = array('gold', 'rosegold', 'black', 'silver');
    foreach ($fields as $field) {
        woocommerce_wp_select(array(
            'id'          => '_material_' . $field,
            'label'       => ucfirst($field),
            'description' => __('Select a product for ' . $field, 'woocommerce'),
            'options'     => $options
        ));
    }

    echo '</div>';
    echo '</div>';
}

?>