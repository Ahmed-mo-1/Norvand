<?php
function trends() { 
?>

<div class="swiper">
<div class="swiper-wrapper" role="list">
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
</div>

<?php endwhile; ?>
<?php wp_reset_query(); ?>
</div></div>


<?php
}
add_shortcode( 'trends', 'trends' );
?>