<?php get_header(); ?>

<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">

<?php
while ( have_posts() ) : the_post();
the_content();
endwhile;
?>

</main>
</div>

<style>
img.inserted-image {
    width: 40px;
    position: relative;
    top: -7px;
}
.wc-item-meta p {display : flex}

</style>

<?php get_footer(); ?>