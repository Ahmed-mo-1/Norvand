<?php

//saerch ajax 

function enqueue_search_scripts() {
    wp_enqueue_script( 'ajax-search', get_template_directory_uri() . '/assets/js/ajax-search.js', array('jquery'), null, true );
    wp_localize_script( 'ajax-search', 'ajax_search_params', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'enqueue_search_scripts' );

function ajax_search() {
    $query = $_POST['query'];
    $args = array(
        'post_type' => 'product',
        's' => $query,
        'posts_per_page' => 5,
		'post_status' => 'publish'
    );
    $search_query = new WP_Query( $args );

    if( $search_query->have_posts() ) {
        while( $search_query->have_posts() ) {
            $search_query->the_post(); 

echo '<div class="search-result-item" 
style="border : 1px solid #cccccc ; margin : 10px auto ; border-radius : 10px ; 
display : flex ; justify-content : space-between ; align-items : center ; padding : 20px">';
    // Product Image
    if (has_post_thumbnail()) {
        echo '<div class="search-result-image" style="width : 50px ; height : 50px"><a href="' . get_permalink() . '">' . get_the_post_thumbnail(get_the_ID(), 'thumbnail') . '</a></div>';
    }
?>

<?php
    
    // Product Title
    echo '<div style="width : 200px"><div class="search-result-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></div>';
    
    // Product Price
    global $product;
    echo '<div class="search-result-price">' . $product->get_price_html() . '</div></div>';
echo '</div>'; 

        }
    } else {
        echo '<div class="search-result-item">No products found</div>';
    }

    wp_die();
}
add_action( 'wp_ajax_nopriv_ajax_search', 'ajax_search' );
add_action( 'wp_ajax_ajax_search', 'ajax_search' );




?>