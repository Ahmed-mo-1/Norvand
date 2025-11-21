<?php
function productswiper() {
    if (!is_product()) {
        return;
    }

    global $post;
    $terms = get_the_terms($post->ID, 'product_cat');
    
    if ($terms && !is_wp_error($terms)) {
        $product_cat_ids = array();
        foreach ($terms as $term) {
            $product_cat_ids[] = $term->term_id;
        }

        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 10,
            'post__not_in' => array($post->ID), // Exclude the current product
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => $product_cat_ids,
                    'operator' => 'IN',
                ),
            ),
        );

        $loop = new WP_Query($args);
        ?>
        <style>
            .swiper .selected-color {display : none}
        </style>
        <section>
        <div class="swiper">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
        <?php
        while ($loop->have_posts()) : $loop->the_post();
            global $product;
            echo '<div class="swiper-slide"><a style="color: black; text-decoration: none" href="' . get_permalink() . '">' . woocommerce_get_product_thumbnail() . ' ' . get_the_title() . '</a><br>' . $product->get_short_description() . ' ' . wc_price($product->get_price()) . '</div>';
        endwhile;

        wp_reset_postdata();
        ?>
          </div>
        </div>
        </section>
        <?php
    }
}

add_shortcode('productswiper', 'productswiper');
?>
