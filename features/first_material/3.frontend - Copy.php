<?php

//display 
add_action( 'woocommerce_single_product_summary', 'display_custom_product_links', 25 );
add_shortcode( 'colort', 'display_custom_product_links' );

function display_custom_product_links() {
    global $post;

    $fields = array('gold', 'rosegold', 'black', 'silver');
?>
<div class="material-group">
<?php
    foreach ($fields as $field) {
        $product_id = get_post_meta($post->ID, '_material_' . $field, true);
        if ($product_id) {

 if ($product_id === 'self') {
//' . get_permalink($post->ID) . ' to make link instead of #
                echo '<div class="material-border active"><a class="material-link ' . esc_attr($field) . ' " href="#" aria-label="' . ucfirst($field) . ': ' . esc_html(get_the_title($post->ID)) . '"></a></div>';
            


}else{
            $product = wc_get_product($product_id);
            if ($product) {
                echo '<div class="material-border "><a class="material-link ' . esc_attr($field) . '" href="' . get_permalink($product_id) . '" aria-label="' . ucfirst($field) . ': ' . esc_html($product->get_name()) . '"></a></div>';
            }
}




        }
    }
?>
</div>
<?php

}

?>