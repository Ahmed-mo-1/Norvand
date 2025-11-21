<!-- product thumbnail container -->
<div class='imgcontainer'>
<?php

echo '<a href="' . get_the_permalink() . '" aria-label="' . get_the_title() . '">';

//echo woocommerce_get_product_thumbnail();

if ( has_post_thumbnail() ) { echo get_the_post_thumbnail( get_the_ID(), 'thumbnail' ); }
else { echo wc_placeholder_img( 'thumbnail' ); }

echo '</a>';

//after
echo apply_filters(
	'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
	sprintf(
		'<a href="%s" data-quantity="%s" class="%s cartico" aria-label="add-%s-to-cart" %s>
        <img src="%s/assets/svgs/cart-add.svg" alt="addtocart">
		</a>',
		//esc_url( $product->add_to_cart_url() ),
		esc_url( get_permalink( $product->get_id() ) ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args['class'] ) ? $args['class'] : '/*button*/' ),
		esc_html( $product->get_name() ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( get_template_directory_uri() ),
		esc_html( $product->add_to_cart_text() ),

	),
	$product,
);

?>
</div>