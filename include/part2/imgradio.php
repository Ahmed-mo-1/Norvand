<?php

// Add a custom product tab
add_filter('woocommerce_product_data_tabs', 'custom_product_data_tab');
function custom_product_data_tab($tabs) {
    $tabs['custom_images'] = array(
        'label'    => __('radio', 'woocommerce'),
        'target'   => 'custom_product_data',
        'class'    => array('show_if_simple', 'show_if_variable'),
        'priority' => 21,
    );
    return $tabs;
}

// Add custom fields to the custom tab
add_action('woocommerce_product_data_panels', 'custom_product_data_fields');
function custom_product_data_fields() {
    global $woocommerce, $post;

    echo '<div id="custom_product_data" class="panel woocommerce_options_panel">';
    echo '<div class="options_group">';

    for ($i = 1; $i <= 5; $i++) {
        woocommerce_wp_text_input(array(
            'id'          => 'custom_image_' . $i,
            'label'       => __('Custom Image ', 'woocommerce') . $i,
            'desc_tip'    => 'true',
            'description' => __('Enter the URL or upload an image.', 'woocommerce'),
        ));
    }

    echo '</div>';
    echo '</div>';
}

// Save the custom fields
add_action('woocommerce_process_product_meta', 'save_custom_product_data_fields');
function save_custom_product_data_fields($post_id) {
    for ($i = 1; $i <= 5; $i++) {
        $custom_image = isset($_POST['custom_image_' . $i]) ? $_POST['custom_image_' . $i] : '';
        if (!empty($custom_image)) {
            update_post_meta($post_id, 'custom_image_' . $i, esc_url($custom_image));
        }
    }
}


add_action('woocommerce_before_add_to_cart_button', 'display_custom_images_on_product_page');
function display_custom_images_on_product_page() {
    global $post;
    echo '<div class="swiper2" style="width:100% ;overflow : hidden"><div class="swiper-wrapper">';
    for ($i = 1; $i <= 5; $i++) {
        $custom_image = get_post_meta($post->ID, 'custom_image_' . $i, true);
        if (!empty($custom_image)) {
            echo '<label class="swiper-slide">';
            echo '<input class = "radio_btn" type="radio" name="custom_image" value="' . esc_url($custom_image) . '">';
            echo '<img src="' . esc_url($custom_image) . '" alt="' . __('Custom Image ', 'woocommerce') . $i . '" style="width: 100%; height: 100%;">';
            echo '</label>';
        }
    }


echo '</div></div><!--<span id="unchecked"> Uncheck Radio </span>-->
   <style>
.swiper-slide input[type="radio" i] {display: none}
.swiper-slide input[type="radio" i] ~ img {transition : 0.5s}
.swiper-slide input[type="radio" i]:checked ~ img {border: 4px solid black ;transform : scale(0.9) ; transition : 0.5s}
</style><br>

<!--<script>
document.getElementById("unchecked").onclick = function(){let radios = document.querySelectorAll(".radio_btn");
for(let i=0 ; i < radios.length ; i++){radios[i].checked = false}}
</script>-->';
//document.getElementById("unchecked").onclick = function() {
//    let radios = document.querySelectorAll(".radio_btn");
 //   radios.forEach(function(radio) {
 //       radio.checked = false;
 //   });
//};

}



add_filter('woocommerce_add_cart_item_data', 'add_custom_image_to_cart_item_data', 10, 2);
function add_custom_image_to_cart_item_data($cart_item_data, $product_id) {
    if (isset($_POST['custom_image'])) {
        $cart_item_data['custom_image'] = sanitize_text_field($_POST['custom_image']);
    }
    return $cart_item_data;
}

add_action('woocommerce_checkout_create_order_line_item', 'add_custom_image_to_order_items', 10, 4);
function add_custom_image_to_order_items($item, $cart_item_key, $values, $order) {
    if (isset($values['custom_image'])) {
        $item->add_meta_data(__('Custom Image', 'woocommerce'), $values['custom_image']);
    }
}

add_action('woocommerce_order_item_meta_end', 'display_custom_image_in_order_details', 10, 4);
function display_custom_image_in_order_details($item_id, $item, $order, $plain_text) {
    $custom_image = wc_get_order_item_meta($item_id, __('Custom Image', 'woocommerce'), true);
    if ($custom_image) {
        echo '<p><strong>' . __('اضافة', 'woocommerce') . ':</strong><br><img src="' . esc_url($custom_image) . '" alt="" style="width: 100px; height: 100px;"></p>';
    }
}


// Display the custom image in the cart and checkout
add_filter('woocommerce_get_item_data', 'display_custom_image_in_cart', 10, 2);
function display_custom_image_in_cart($item_data, $cart_item) {
    if (isset($cart_item['custom_image'])) {
        $item_data[] = array(
            'key'   => __('اضافة', 'woocommerce'),
            'value' => '<img src="' . esc_url($cart_item['custom_image']) . '" alt="" style="width: 50px; height: 50px;">',
        );
    }
    return $item_data;
}



?>