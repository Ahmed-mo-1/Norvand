<?php


add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_page', '__return_false', 10);


add_action('admin_enqueue_scripts', function() {
    // Remove Dashicons (optional)
    wp_deregister_style('dashicons');

    // Remove default WP admin CSS
    wp_dequeue_style('wp-admin');
    wp_dequeue_style('admin-menu');
    wp_dequeue_style('colors');

    // Remove default WP admin JS
    wp_dequeue_script('admin-menu');
});

add_filter('show_admin_bar', '__return_false');

/**/

add_action('adminmenu', function() { 
    $logo = get_stylesheet_directory_uri() . '/imgs/1.webp';
 
    echo '<div style="order: -1; width: 100px; margin: auto" class="custom-admin-logo">
            <img style="width: 100%" src="' . esc_url($logo) . '" alt="Logo">
          </div>';
});


// Add logo + front-end + logout buttons
add_action('admin_menu', function() {


    // 2. Add front-end button
    add_menu_page(
        'Visit Site',
        'Front-end',
        'read',
        'front-end-link',
        function() {
            wp_redirect(home_url());
            exit;
        },
        'dashicons-admin-site',
        1
    );

    // 3. Add logout button
    add_menu_page(
        'Logout',
        'Logout',
        'read',
        'logout-link',
        function() {
            wp_logout();
            wp_redirect(home_url('/wp-admin'));
            exit;
        },
        'dashicons-shield-alt',
        2
    );
});



add_action('wp_before_admin_bar_render', function() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_node('wp-logo');
});





/* ----------------------------------------------------------
   Modern WP Admin UI – Single File Version
   Add this entire block into your theme's functions.php
-----------------------------------------------------------*/

add_action('admin_head', function () { ?>
<style>
* {
	padding: 0;
	margin: 0;
	box-sizing: border-box
}
#wpwrap {display: flex}
#wp-auth-check-wrap {display: none}

.wp-menu-image,wp-menu-image svg {
	display: none
}

#adminmenumain {
	background: black;
	padding: 10px;
	color: white
}

#adminmenumain a{
	color: white
}

#wpadminbar {display: none}

#screen-options-wrap , #screen-meta, #screen-meta-links, .woocommerce-layout__header {
	display: none
}

#wpcontent {
	width: 100%;
	padding: 20px
}

.wp-submenu-head {display: none}


button, input[type="submit"]{
	border: none;
	background: black;
	color: white;
	padding: 20px;
	border-radius: 20px
}

input, select {
	border-radius: 20px
}

ul {
list-style: none
}


#adminmenumain {
    background: #fff;
    padding: 10px;
    color: white;
    height: 100dvh;
    overflow: auto;
}

a {
    text-decoration: none;
}

ul#adminmenu
 {
    display: flex;
    flex-direction: column;
    gap: 13px;
}


#adminmenu li {
    padding: 10px 0;
}

li:has(ul) {
    background: #fff;
    padding: 7px !important;
    border-radius: 16px;
}

ul#adminmenu > li:not(:has(ul)) {
    background: #fff;
    padding: 7px !important;
    border-radius: 16px;
}

.wp-not-current-submenu.wp-menu-separator, #collapse-menu {
	display: none
}

div#wpbody {
    height: 94dvh;
    overflow: auto;
    box-shadow: 2px 2px 10px black;
    border-radius: 16px;
    padding: 10px;
}

#adminmenumain > :not(#adminmenuwrap) {
    display: none !important;
}
























/* General page wrapper */
.wrap {
    max-width: 900px;
    margin: 40px auto;
    padding: 20px 30px;
    border-radius: 10px;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    color: #333;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

/* Headings */
.wrap h1 {
    font-size: 2.2em;
    margin-bottom: 15px;
    color: #0073aa;
}

.wrap h2 {
    font-size: 1.5em;
    margin-top: 30px;
    margin-bottom: 10px;
    color: #222;
}

.wrap h2 span.count {
    color: #555;
    font-weight: normal;
    font-size: 0.9em;
}

/* Paragraphs */
.wrap p {
    font-size: 1em;
    line-height: 1.6;
    margin-bottom: 15px;
}

.wrap a {
    color: #0073aa;
    text-decoration: none;
}

.wrap a:hover {
    text-decoration: underline;
}

/* Current version and update info */
.wp-current-version {
    font-weight: bold;
    color: #d54e21;
    margin-bottom: 5px;
}

.update-last-checked {
    font-size: 0.9em;
    color: #666;
}

/* Auto-update notice */
.auto-update-status {
    background-color: #fff8e1;
    border-left: 4px solid #ffb900;
    padding: 10px 15px;
    border-radius: 5px;
    margin-bottom: 20px;
}

/* Response message */
.response {
    background-color: #e6ffed;
    border-left: 4px solid #46b450;
    padding: 10px 15px;
    border-radius: 5px;
}

/* Buttons */
.button {
    display: inline-block;
    background-color: #0073aa;
    color: #fff;
    padding: 8px 18px;
    font-size: 0.95em;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.2s;
}

.button:hover {
    background-color: #005177;
}

/* Tables */
.widefat {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.widefat th, .widefat td {
    padding: 10px 12px;
    border: 1px solid #ddd;
    vertical-align: middle;
}

.widefat th {
    background-color: #f1f1f1;
    text-align: left;
}

.check-column {
    width: 40px;
    text-align: center;
}

.plugin-title img {
    width: 32px;
    height: 32px;
    vertical-align: middle;
    margin-right: 10px;
    border-radius: 4px;
}

.upgrade p {
    margin: 0;
}

/* Forms */
form.upgrade {
    margin-top: 10px;
}

/* Highlight links inside status messages */
.auto-update-status a, .response a {
    font-weight: bold;
}

/* Responsive adjustments */
@media (max-width: 600px) {
    .wrap {
        padding: 15px 20px;
    }

    .widefat th, .widefat td {
        padding: 8px;
    }

    .plugin-title img {
        width: 24px;
        height: 24px;
    }
}

















/* General wrapper */
.wrap {
    max-width: 1000px;
    margin: 40px auto;
    padding: 20px 30px;
    border-radius: 10px;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    color: #333;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

/* Page heading */
.wp-heading-inline {
    font-size: 2em;
    margin-right: 15px;
    color: #0073aa;
}

/* Add Post button */
.page-title-action {
    display: inline-block;
    background-color: #0073aa;
    color: #fff;
    padding: 6px 16px;
    font-size: 0.95em;
    border-radius: 4px;
    text-decoration: none;
    transition: background-color 0.2s;
}

.page-title-action:hover {
    background-color: #005177;
}

/* Sub-sub navigation */
.subsubsub {
    margin: 15px 0;
    padding: 0;
    list-style: none;
    font-size: 0.95em;
}

.subsubsub li {
    display: inline;
}

.subsubsub li a {
    text-decoration: none;
    color: #0073aa;
    margin-right: 5px;
}

.subsubsub li a.current {
    font-weight: bold;
    color: #222;
}

/* Search box */
.search-box input[type="search"] {
    padding: 6px 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 200px;
}

.search-box .button {
    margin-left: 5px;
}

/* Buttons */
.button, .button.action, .button.button-primary, .button.save {
    display: inline-block;
    background-color: #0073aa;
    color: #fff;
    padding: 6px 14px;
    font-size: 0.9em;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.2s;
}

.button:hover, .button.action:hover, .button.button-primary:hover, .button.save:hover {
    background-color: #005177;
}

/* Tables */
.wp-list-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #fff;
    border-radius: 6px;
    overflow: hidden;
}

.wp-list-table th,
.wp-list-table td {
    padding: 12px 10px;
    border-bottom: 1px solid #e1e1e1;
    vertical-align: middle;
}

.wp-list-table th {
    background-color: #f1f1f1;
    text-align: left;
    font-weight: bold;
}

.wp-list-table tr:nth-child(even) {
    background-color: #fafafa;
}

.wp-list-table tr:hover {
    background-color: #f0f8ff;
}

/* Checkboxes */
.check-column {
    width: 40px;
    text-align: center;
}

/* Row actions */
.row-actions {
    font-size: 0.85em;
    margin-top: 5px;
}

.row-actions a,
.row-actions button {
    margin-right: 5px;
    color: #0073aa;
    text-decoration: none;
}

.row-actions a:hover,
.row-actions button:hover {
    text-decoration: underline;
}

/* Inline edit / quick edit */
.inline-edit-wrapper {
    background: #fff;
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 6px;
    margin-top: 10px;
}

.inline-edit-wrapper fieldset {
    margin-bottom: 10px;
}

.inline-edit-wrapper .title {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

/* Inputs and selects */
.inline-edit-wrapper input[type="text"],
.inline-edit-wrapper input[type="search"],
.inline-edit-wrapper select,
.inline-edit-wrapper textarea {
    padding: 6px 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 100%;
    box-sizing: border-box;
    margin-bottom: 10px;
}

/* Pagination */
.tablenav-pages {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    margin-top: 10px;
    font-size: 0.9em;
}

.tablenav-pages .button {
    margin: 0 2px;
}

/* Bulk actions */
.bulkactions {
    margin-bottom: 10px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .wrap {
        padding: 15px 20px;
    }

    .search-box input[type="search"] {
        width: 100%;
        margin-bottom: 5px;
    }

    .page-title-action {
        margin-top: 10px;
        display: block;
    }
}























 

/* Top-level Links */
#adminmenu li.menu-top > a {
    display: flex !important;
    align-items: center !important;
    padding: 12px 12px !important;
    color: #333333 !important;
    text-decoration: none !important;
    font-weight: 600 !important;
    transition: all 0.3s ease !important;
    background-color: #ffffff !important;
    cursor: pointer !important;
}

#adminmenu li.menu-top > a:hover {
    background-color: #f7f7f7 !important;
    color: #0073aa !important;
}

/* Submenus */
#adminmenu .wp-submenu-wrap {
    display: none ;
    background-color: #f9f9f9 !important;
    border-left: 4px solid transparent !important;
}

#adminmenu .wp-submenu li a {
    display: block !important;
    padding: 8px 25px !important;
    color: #555555 !important;
    text-decoration: none !important;
    font-weight: 400 !important;
    font-size: 14px !important;
    transition: all 0.2s ease !important;
}

 














/* General form styling */
.wrap form {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
    max-width: 700px;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.wrap h1 {
    font-size: 28px;
    margin-bottom: 20px;
    color: #333;
}

.form-table th {
    text-align: left;
    padding: 10px;
    vertical-align: top;
    width: 220px;
    color: #555;
}

.form-table td {
    padding: 10px;
}

/* Number inputs and selects */
input[type="number"], select {
    padding: 6px 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    width: 150px;
    transition: border-color 0.3s, box-shadow 0.3s;
}

input[type="number"]:focus, select:focus {
    border-color: #0073aa;
    box-shadow: 0 0 3px rgba(0,115,170,0.5);
    outline: none;
}

/* Apple-style toggle switch */
.toggle-wrapper {
    display: inline-block;
    position: relative;
    width: 50px;
    height: 28px;
}

.toggle-wrapper input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0; left: 0;
    right: 0; bottom: 0;
    background-color: #ccc;
    border-radius: 34px;
    transition: 0.4s;
}

.slider::before {
    position: absolute;
    content: "";
    height: 22px;
    width: 22px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    border-radius: 50%;
    transition: 0.4s;
}

.toggle-wrapper input:checked + .slider {
    background-color: #0073aa;
}

.toggle-wrapper input:checked + .slider::before {
    transform: translateX(22px);
}

/* Optional shadow effect */
.slider::before {
    box-shadow: 0 1px 3px rgba(0,0,0,0.3);
}

/* Labels */
label {
    font-size: 14px;
    color: #333;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 10px;
}

/* Submit button */
.button-primary {
    background-color: #0073aa;
    border-color: #0073aa;
    color: #fff;
    padding: 8px 18px;
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
    transition: background 0.3s;
}

.button-primary:hover {
    background-color: #005f8d;
    border-color: #005f8d;
}





















/* Hide native checkbox/radio appearance */
input[type="checkbox"],
input[type="radio"] {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    width: 40px;
    height: 22px;
    background: #ccc;
    border-radius: 11px;
    position: relative;
    outline: none;
    cursor: pointer;
    transition: background 0.3s;
}

/* The circular knob */
input[type="checkbox"]::after,
input[type="radio"]::after {
    content: "";
    position: absolute;
    top: 1px;
    left: 1px;
    width: 20px;
    height: 20px;
    background: #fff;
    border-radius: 50%;
    transition: transform 0.3s, background 0.3s;
    box-shadow: 0 1px 3px rgba(0,0,0,0.3);
}

/* Checked state */
input[type="checkbox"]:checked,
input[type="radio"]:checked {
    background: #0073aa;
}

input[type="checkbox"]:checked::after,
input[type="radio"]:checked::after {
    transform: translateX(18px);
}

/* Optional hover effect */
input[type="checkbox"]:hover,
input[type="radio"]:hover {
    background: #aaa;
}

/* Space between toggle and label text */
label > input[type="checkbox"],
label > input[type="radio"] {
    margin-right: 10px;
    vertical-align: middle;
}

/* Ensure proper alignment with text */
label {
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
}


</style>

<script>
jQuery(document).ready(function($) {
    // Hide all submenus initially
    $('#adminmenu .wp-submenu-wrap').hide();

    // Toggle submenu on click only if there is a submenu
    $('#adminmenu li.menu-top > a').click(function(e) {
        var submenu = $(this).siblings('.wp-submenu-wrap');

        if (submenu.length > 0) {
            e.preventDefault(); // Only prevent navigation if submenu exists

            // Close other submenus
            $('#adminmenu .wp-submenu-wrap').not(submenu).slideUp(200);

            // Toggle this submenu
            submenu.slideToggle(200);
        }
        // If no submenu, link works normally
    });
});


</script>

<?php });


/* ---------------------------------------------
   ADMIN BRANDING CUSTOMIZATIONS
----------------------------------------------*/

// 1. Change footer text
add_filter('admin_footer_text', function () {
    return ;
});

// 2. Remove WP version (or change it)
add_filter('update_footer', function () {
    return ''; // empty or your custom text
}, 9999);

// 3. Replace "Howdy" with "Welcome" + username
add_filter('admin_bar_menu', function ($wp_admin_bar) {
    $user = wp_get_current_user();
    $account = $wp_admin_bar->get_node('my-account');
    if(!$account) return;

    $new_title = str_replace('Howdy,', 'Welcome,', $account->title);
    $account->title = $new_title;
    $wp_admin_bar->add_node($account);
}, 25);

// 4. Remove WP logo from admin bar
add_action('admin_bar_menu', function ($wp_admin_bar) {
    $wp_admin_bar->remove_node('wp-logo');
}, 999);

// 5. Remove update/version nags
add_filter('update_nag', '__return_empty_string');
add_filter('core_update_footer', '__return_empty_string');

