<?php

if (is_product()) {
global $post;
$terms = get_the_terms($post->ID, 'product_cat');
        
if ($terms && !is_wp_error($terms)) {
$category_slugs = array();
foreach ($terms as $term) { $category_slugs[] = $term->slug; }
$category_slug = $category_slugs[0];
}

}

if (empty($category_slug)) { return 'No category found'; }

$args = array(
'post_type' => 'product',
'posts_per_page' => 10,
'product_cat' => $category_slug
);

$query = new WP_Query($args);

?>

<div class="container-1col">

<h2>
<?php echo __('قد يعجبك أيضاً…','') ; ?>
</h2>

<?php if ($query->have_posts()) { ?>

<div class="swiper">
<div class="swiper-wrapper" role="list">

<?php while ($query->have_posts()) { $query->the_post(); ?>

<div class="swiper-slide">
<?php wc_get_template_part('content', 'product'); ?>
</div>

<?php } ?>

</div>
</div>
</div>

<?php
} else { echo 'No products found'; }
?>