<div id="description" style="display : none">

<?php
global $post;
$heading = apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) );
?>

<?php if ( $heading ) : ?>
<h2 style="text-align : center"><?php echo esc_html( $heading ); ?></h2>
<?php endif; ?>

<?php
if(is_product()){
    the_content();
	echo do_shortcode('[attr_desc attribute="size" ]');
}
?>

</div>
