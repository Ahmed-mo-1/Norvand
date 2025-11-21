<?php
function display_custom_category_products($atts) {
    // Extract the category attribute from the shortcode
    $atts = shortcode_atts(
        array(
            'category' => '', // Default category is empty
        ),
        $atts,
        'custom_products'
    );

    // Query arguments
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 10,
        'product_cat' => $atts['category']
    );

    // The Query
    $query = new WP_Query($args);

    // Output buffer
    ob_start();

    // The Loop
    if ($query->have_posts()) {
        echo '<div class="swiper">';
        echo '<div class="swiper-wrapper">';
        while ($query->have_posts()) {
            $query->the_post();
            echo '<div class="swiper-slide">';
            wc_get_template_part('content', 'product');
            echo '</div>';
        }
        echo '</div>';
        echo '<div class="swiper-pagination"></div>';
        echo '<div class="swiper-button-next"></div>';
        echo '<div class="swiper-button-prev"></div>';
        echo '</div>';
    } else {
        echo 'No products found';
    }

    // Restore original Post Data
    wp_reset_postdata();

    // Return the buffer
    return ob_get_clean();
}

// Register the shortcode
add_shortcode('custom_products', 'display_custom_category_products');
?>