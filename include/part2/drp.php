<?php
//don't repeat products




//upsell and related
add_filter( 'woocommerce_related_products', 'custom_related_products_with_upsell', 10, 3 );

function custom_related_products_with_upsell( $related_posts, $product_id, $args ) {
    // Get the current product
    $product = wc_get_product( $product_id );

    // Get upsell products
    $upsell_ids = $product->get_upsell_ids();

    // Merge related products and upsell products
    $merged_ids = array_merge( $related_posts, $upsell_ids );

    // Remove duplicates
    $merged_ids = array_unique( $merged_ids );

    // Ensure the current product ID is not included
    if ( ( $key = array_search( $product_id, $merged_ids ) ) !== false ) {
        unset( $merged_ids[$key] );
    }

    // Get final array of product IDs
    $final_related_posts = array_slice( $merged_ids, 0/*, $args['posts_per_page'] */);

    return $final_related_posts;
}


?>