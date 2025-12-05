<?php 







// Register Custom Post Type
function custom_post_type_portfolio() {

    $labels = array(
        'name'                  => _x('Portfolios', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Portfolio', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Portfolios', 'text_domain'),
        'name_admin_bar'        => __('Portfolio', 'text_domain'),
        'archives'              => __('Portfolio Archives', 'text_domain'),
        'attributes'            => __('Portfolio Attributes', 'text_domain'),
        'parent_item_colon'     => __('Parent Portfolio:', 'text_domain'),
        'all_items'             => __('All Portfolios', 'text_domain'),
        'add_new_item'          => __('Add New Portfolio', 'text_domain'),
        'add_new'               => __('Add New', 'text_domain'),
        'new_item'              => __('New Portfolio', 'text_domain'),
        'edit_item'             => __('Edit Portfolio', 'text_domain'),
        'update_item'           => __('Update Portfolio', 'text_domain'),
        'view_item'             => __('View Portfolio', 'text_domain'),
        'view_items'            => __('View Portfolios', 'text_domain'),
        'search_items'          => __('Search Portfolio', 'text_domain'),
        'not_found'             => __('Not found', 'text_domain'),
        'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
        'featured_image'        => __('Featured Image', 'text_domain'),
        'set_featured_image'    => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image'    => __('Use as featured image', 'text_domain'),
        'insert_into_item'      => __('Insert into portfolio', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this portfolio', 'text_domain'),
        'items_list'            => __('Portfolios list', 'text_domain'),
        'items_list_navigation' => __('Portfolios list navigation', 'text_domain'),
        'filter_items_list'     => __('Filter portfolios list', 'text_domain'),
    );

    $args = array(
        'label'                 => __('Portfolio', 'text_domain'),
        'description'           => __('Portfolio custom post type', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'taxonomies'            => array('category', 'post_tag'), // Optional: categories and tags
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-portfolio', // Icon in admin menu
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true, // Important for Gutenberg
    );
    
    register_post_type('portfolio', $args);
}

//add_action('init', 'custom_post_type_portfolio', 0);



include_once 'dashboard.php';



function custom_login_override() {
    global $pagenow;
    
    // Only trigger on wp-login.php
    if ($pagenow !== 'wp-login.php') {
        return;
    }
    
    // Sanitize the requested action
    $action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : '';
    
    // Check for critical GET parameters
    if (isset($_GET['reauth']) || isset($_GET['checkemail']) || isset($_GET['loggedout'])) {
        return;
    }
    
    // List of actions WordPress should handle
    $wp_allowed_actions = array(
        'postpass',
        'logout',
        'lostpassword',
        'retrievepassword',
        'resetpass',
        'rp',
        'confirm_admin_email',
    );
    
    // Allow internal WP actions to bypass the custom template
    if (in_array($action, $wp_allowed_actions, true)) {
        return;
    }
    
    // Check if we should load the custom template
    $is_default_view = empty($action) && $_SERVER['REQUEST_METHOD'] === 'GET';
    
    if ($is_default_view) {
        // Show custom login page
        require get_template_directory() . '/custom-login.php';
        exit;
    }
    
    return; 
}
add_action('login_init', 'custom_login_override');

// Handle AJAX login
add_action('wp_ajax_nopriv_custom_ajax_login', 'custom_ajax_login_handler');
function custom_ajax_login_handler() {
    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'custom_login_action')) {
        wp_send_json_error(array('message' => 'Security check failed. Please refresh the page and try again.'));
    }
    
    // Sanitize inputs
    $username = sanitize_user($_POST['username']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) && $_POST['remember'] === 'true';
    
    // Prepare credentials
    $creds = array(
        'user_login'    => $username,
        'user_password' => $password,
        'remember'      => $remember,
    );
    
    // Attempt login
    $user = wp_signon($creds, false);
    
    if (is_wp_error($user)) {
        wp_send_json_error(array('message' => $user->get_error_message()));
    } else {
        wp_send_json_success(array(
            'message' => 'Login successful!',
            'redirect_url' => admin_url(),
            'user_name' => $user->display_name
        ));
    }
}

// Redirect already logged-in users
add_action('init', 'redirect_logged_in_users_from_login');
function redirect_logged_in_users_from_login() {
    global $pagenow;
    
    if ($pagenow === 'wp-login.php' && is_user_logged_in() && !isset($_GET['action'])) {
        wp_safe_redirect(admin_url());
        exit;
    }
}

 

class WP_Translate_Nav_Menu_Walker extends Walker_Nav_Menu {
    // Override the start_el method
    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
        // Translate the title of the menu item
        $item->title = __($item->title, '');

        // Now call the parent method to output the rest of the menu item as usual
        parent::start_el($output, $item, $depth, $args, $id);
    }
}

include_once 'features/first_material/1.backend.php';
include_once 'features/first_material/2.save.php';
include_once 'features/first_material/3.frontend.php';
include_once 'features/first_material/4.frontend_archive.php';

include_once 'features/second_material/1.backend.php';
include_once 'features/second_material/2.save.php';
include_once 'features/second_material/3.frontend.php';

include_once 'features/third_material/1.backend.php';
include_once 'features/third_material/2.save.php';
include_once 'features/third_material/3.frontend.php';

include_once 'parts/header/functions/search.php';
include_once 'features/translate/translate.php';
include_once 'features/translate/translate-cookie.php';
include_once 'features/translate/translate-shortcode.php';
//include_once 'include/dev/styles-scripts-names.php';

//if (is_account_page()) {include_once get_theme_file_path('assets/css/account.php');}
//wp_enqueue_script("pagination", get_template_directory_uri()."/assets/js/pagination.js", array('jquery'), time() , true);
include_once 'include/part2/imgurl.php';
include_once 'include/part2/maintenance.php';
include_once 'include/part2/privacy.php';
include_once 'include/part2/bulkattr.php';
include_once 'include/part2/attrdesc.php';
include_once 'include/part2/drp.php';
//include_once 'lan.php';
include_once 'include/part1/menucustomize.php';
include_once 'include/part1/disable-emoji.php';
include_once 'include/part1/woocommerce-support.php';
include_once 'include/part1/menus.php';
include_once 'include/part1/remove.php';

include_once 'include/part2/more-related.php';
include_once 'include/part2/sec-des-cat.php';
include_once 'include/part2/sec-des-tag.php';
include_once 'include/part2/thi-des-pro.php';
include_once 'include/part2/sec-short-des-pro.php';
include_once 'include/part2/video.php';
//include_once 'include/part2/imgradio.php';
include_once 'include/part2/form.php';
include_once 'include/part2/name-phone-table.php';
include_once 'include/part4/reports.php';
include_once 'include/part4/reports-product.php';
//shortcodes

include_once 'include/shortcodes/subcat.php';
include_once 'include/shortcodes/subcat1.php';
//include_once 'include/shortcodes/archive.php';
include_once 'include/shortcodes/trends.php';
include_once 'include/shortcodes/insta_slide.php';
include_once 'include/shortcodes/reviews.php';
include_once 'include/shortcodes/cat-third-desc.php';
include_once 'include/shortcodes/imgdes.php';
include_once 'include/shortcodes/wishlist.php';
include_once 'include/shortcodes/sorting.php';
include_once 'include/shortcodes/prods.php';
include_once 'include/shortcodes/cus-pro.php';

//styles and scripts
include_once 'include/part1/app.php';
include_once 'include/part2/catbanners.php';
include_once 'include/part2/posts5.php';
include_once 'include/part2/sorting.php';
include_once 'include/part2/admin-ps.php';

include_once 'include/part2/nocompress.php';
include_once 'include/part2/disabled-things.php';
include_once 'include/part2/optimize.php';
?>