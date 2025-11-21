<?php

add_shortcode('materials', 'display_archive_material_product_links');

function display_archive_material_product_links() {
    global $post;

    $fields = array(
        'gold', 'rosegold', 'black', 'silver'
    );

    $has_any_material = false;

    ob_start();
    ?>
    <div class="material-group">
    <?php
    foreach ($fields as $field) {
        $product_id = get_post_meta($post->ID, '_material_' . $field, true);
        if ($product_id) {
            $has_any_material = true;

            if ($product_id === 'self') {
                echo '<div class="material-border active"><a class="material-link ' . esc_attr($field) . '" href="' . get_permalink($post->ID) . '" aria-label="' . ucfirst(str_replace('_', ' ', $field)) . ': ' . esc_html(get_the_title($post->ID)) . '"></a></div>';
            } else {
                $product = wc_get_product($product_id);
                if ($product) {
                    echo '<div class="material-border"><a class="material-link ' . esc_attr($field) . '" href="' . get_permalink($product_id) . '" aria-label="' . ucfirst(str_replace('_', ' ', $field)) . ': ' . esc_html($product->get_name()) . '"></a></div>';
                }
            }
        }
    }
    ?>
    </div>

    <?php

    $output = ob_get_clean();
    if ($has_any_material) {
        echo $output;
    }
}

?>