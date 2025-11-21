<?php

//save

add_action( 'woocommerce_process_product_meta', 'save_material_product_data_fields' );
function save_material_product_data_fields( $post_id ) {
    $fields = array('gold', 'rosegold', 'black', 'silver');
    foreach ( $fields as $field ) {
        $product = isset( $_POST['_material_' . $field] ) ? sanitize_text_field( $_POST['_material_' . $field] ) : '';
        update_post_meta( $post_id, '_material_' . $field, $product );
    }
}

?>