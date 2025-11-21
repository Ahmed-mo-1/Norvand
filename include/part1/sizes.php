<?php

// thumbnail

add_filter( 'subcategory_archive_thumbnail_size', function( $size ) {
return 'full';
} );

add_filter( 'woocommerce_gallery_thumbnail_size', function( $size ) {
return 'full';
} );

add_filter( 'woocommerce_gallery_image_size', function( $size ) {
return 'full';
} );

add_filter( 'single_product_archive_thumbnail_size', function( $size ) {
return 'full';
} );





add_filter( 'woocommerce_get_image_size_thumbnail', function( $size ) {
	return array(
		'width'  => 2000,
		'height' => 2000,
		'crop'   => 1,
	);
} );




?>