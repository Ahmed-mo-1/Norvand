<?php
defined( 'ABSPATH' ) || exit;
global $product;

$custom_classes = 'product item';

$attributes = $product->get_attributes();

foreach ( $attributes as $attribute_name => $attribute ) {

if ( $attribute->is_taxonomy() ) {

$taxonomy = $attribute->get_taxonomy();
$terms = wp_get_post_terms( $product->get_id(), $taxonomy, array( 'fields' => 'names' ) );

foreach ( $terms as $term ) {
// Sanitize term to create a valid class name
$class_name = 'attribute-' . sanitize_title( $term );
$custom_classes .= ' ' . $class_name;
}

} 
else {
$options = $attribute->get_options();

foreach ( $options as $option ) {
$class_name = 'attribute-' . sanitize_title( $option );
$custom_classes .= ' ' . $class_name;
}

}

}


?>