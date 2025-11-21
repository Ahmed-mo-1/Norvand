<?php

// Add 'Add to Wishlist' button on product pages
function add_wishlist_button() {
    global $product;
    echo '<div style="height: 40px !important;
    width: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    border-radius: 10px;
    background: none;
    color: black;
    border: 1px solid black;" class="add-to-wishlist pointer h40px flx aic jcc" data-product-id="' . $product->get_id() . '">' ; ?>
<img class="icon" style="filter : brightness(0)" src="<?php bloginfo('template_url'); ?>/assets/svgs/heart-empty.svg" alt="carticon">
<?php echo '</div>';
}
//add_action('woocommerce_after_add_to_cart_button', 'add_wishlist_button');
add_shortcode('wishlist', 'add_wishlist_button');

// Handle AJAX request to add product to wishlist
function handle_add_to_wishlist() {
    if (isset($_POST['product_id'])) {
        $product_id = intval($_POST['product_id']);
        $user_id = get_current_user_id();
        $wishlist = get_user_meta($user_id, '_wishlist', true);

        if (!$wishlist) {
            $wishlist = array();
        }

        if (!in_array($product_id, $wishlist)) {
            $wishlist[] = $product_id;
            update_user_meta($user_id, '_wishlist', $wishlist);
            wp_send_json_success(array('message' => 'Product added to wishlist.'));
} else {
            wp_send_json_error(array('message' => 'Product is already in your wishlist.'));
}
    } else {
        wp_send_json_error(array('message' => 'Invalid product ID.'));
    }
    wp_die();
}
add_action('wp_ajax_add_to_wishlist', 'handle_add_to_wishlist');
add_action('wp_ajax_nopriv_add_to_wishlist', 'handle_add_to_wishlist');

// Enqueue scripts
function enqueue_wishlist_scripts() {
    wp_enqueue_script('wishlist-script', get_template_directory_uri() . '/js/wishlist.js', array('jquery'), null, true);
    wp_localize_script('wishlist-script', 'wishlistAjax', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_wishlist_scripts');

// Display wishlist on user's account page
function display_wishlist_in_account() {
    $user_id = get_current_user_id();
    $wishlist = get_user_meta($user_id, '_wishlist', true);

    if ($wishlist) {
        echo '<h2>Your Wishlist</h2>';
        echo '<ul class="wishlist">';
        foreach ($wishlist as $product_id) {




        $product = wc_get_product($product_id);
        echo '<div class="search-result-item" style="border: 1px solid #cccccc; margin: 10px auto; border-radius: 10px; display: flex; justify-content: space-between; align-items: center; padding: 20px;">';

        // Product Image
        if (has_post_thumbnail($product_id)) {
            echo '<div class="search-result-image" style="width: 50px; height: 50px;"><a href="' . get_permalink($product_id) . '">' . get_the_post_thumbnail($product_id, 'thumbnail') . '</a></div>';
        }

        // Product Title and Price
        echo '<div style="width: 200px;"><div class="search-result-title"><a href="' . get_permalink($product_id) . '">' . get_the_title($product_id) . '</a></div>';
        echo '<div class="search-result-price">' . $product->get_price_html() . '</div></div>';
        echo '</div>'; 



        }
        echo '</ul>';
    } else {
        echo '<p>Your wishlist is empty.</p>';
    }
}
add_action('woocommerce_account_dashboard', 'display_wishlist_in_account');
add_shortcode('wishlistpage', 'display_wishlist_in_account');


?>