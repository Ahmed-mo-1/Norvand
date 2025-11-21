<?php

function custom_dynamic_attribute_description_shortcode( $atts ) {
    global $product;

    // Ensure product is set and is a valid WooCommerce product
    if ( ! $product || ! is_a( $product, 'WC_Product' ) ) {
        return '';
    }

    $atts = shortcode_atts(
        array(
            'attribute' => '',  // Attribute slug, e.g., 'color'
        ),
        $atts,
        'attr_desc'
    );

    if ( ! $atts['attribute'] ) {
        return 'Attribute not specified.';
    }

    // Get the attribute's taxonomy name
    $taxonomy = 'pa_' . sanitize_text_field( $atts['attribute'] );

    // Get the terms associated with this product for the specified attribute
    $terms = wc_get_product_terms( $product->get_id(), $taxonomy, array( 'fields' => 'all' ) );

    if ( is_wp_error( $terms ) || empty( $terms ) ) {
        //return 'No terms found for this attribute.';
    }

    // Prepare the description output, using an array to avoid duplicates
    $descriptions = array();
    $output = array();
    foreach ( $terms as $term ) {
        if ( ! empty( $term->description ) && ! in_array( $term->description, $descriptions ) ) {
            $descriptions[] = $term->description;
            $output[] = wp_kses_post( $term->description );
        }
    }

    // Return descriptions as a single string
    if ( ! empty( $output ) ) {
        return implode( '<br>', $output );
    } else {
        //return 'No descriptions available for this attribute.';
    }
}

// Register the shortcode
add_shortcode( 'attr_desc', 'custom_dynamic_attribute_description_shortcode' );

// allow html syntax
foreach ( array( 'pre_term_description' ) as $filter ) { 
    remove_filter( $filter, 'wp_filter_kses' ); 
} 
foreach ( array( 'term_description' ) as $filter ) { 
    remove_filter( $filter, 'wp_kses_data' ); 
} 

?>