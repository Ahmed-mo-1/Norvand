<?php
function trends() { 
?>

<style>
.swiper .selected-color {display : none}
</style>

<div class="swiper">
<div class="swiper-wrapper">
<?php

$args = array(
'post_type' => 'product',
'meta_key' => 'total_sales',
'orderby' => 'meta_value_num',
'posts_per_page' => 10 ,
);

$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); 
global $product; ?>


<div class="swiper-slide">
<?php wc_get_template_part('content', 'product'); ?>
<a style="color : black ; text-decoration : none" href="<?php the_permalink(); ?>" id="id-<?php the_id(); ?>" title="<?php the_title(); ?>">

<?php if (has_post_thumbnail( $loop->post->ID )) 
        echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); 
        else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="product placeholder Image" width="65px" height="115px" loading = "lazy"/>'; ?>

<h3><?php the_title(); echo '<br>';
echo $product->get_short_description().$product->get_price().''.get_woocommerce_currency_symbol(); ?></h3>
</a>
</div>

<?php endwhile; ?>
<?php wp_reset_query(); ?>
</div></div>


<?php
}

add_shortcode( 'trends', 'trends' );
?>