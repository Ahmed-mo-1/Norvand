<?php
// Function to handle setting the language cookie
function set_custom_language_cookie() {
    if (isset($_POST['lang'])) {
        $lang = $_POST['lang'];
        setcookie('lang', $lang, time() + (86400 * 30), "/"); // 86400 = 1 day
        $_COOKIE['lang'] = $lang; // Set for immediate usage in the current request
        wp_send_json_success();
    } else {
        wp_send_json_error('No language set');
    }
}

add_action('wp_ajax_set_language_cookie', 'set_custom_language_cookie');
add_action('wp_ajax_nopriv_set_language_cookie', 'set_custom_language_cookie');

?>

<?php
// Function to display the current language at the footer
function print_language_cookie() {
    echo 'Current language: ' . (isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'en');
}
//add_action('wp_footer', 'print_language_cookie');

?>