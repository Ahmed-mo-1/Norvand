
<?php

// posts
// Add this to your theme's functions.php file or a custom plugin
function custom_posts_loop_shortcode($atts) {
    // Set default attributes and merge with user-provided attributes
    $atts = shortcode_atts(
        array(
            'category' => '',      // Category to filter posts
            'posts_per_page' => 5, // Number of posts to display
            'order' => 'DESC',     // Order of posts
            'orderby' => 'date'    // Order by field
        ),
        $atts,
        'posts_loop'
    );

    // Query arguments
    $query_args = array(
        'category_name' => $atts['category'],
        'posts_per_page' => $atts['posts_per_page'],
        'order' => $atts['order'],
        'orderby' => $atts['orderby']
    );

    // Custom query
    $query = new WP_Query($query_args);

    // Initialize output
    $output = '<div class="custom-posts-loop">';

    // Loop through posts
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $output .= '<div class="post-item">';
            $output .= '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
            $output .= '<div class="post-excerpt">' . get_the_excerpt() . '</div>';
            $output .= '</div>';
        }
    } else {
        $output .= '<p>No posts found.</p>';
    }

    // Restore original post data
    wp_reset_postdata();

    $output .= '</div>';

    return $output;
}

// Register shortcode
add_shortcode('posts_loop', 'custom_posts_loop_shortcode');
?>


