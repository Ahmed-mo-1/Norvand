<?php
// Function to load the appropriate language text domain
function custom_load_theme_textdomain() {

/*changes depends on main website language -- if the website is arabic make firsy line ar*/
    $lang = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'ar';
    $locale = ($lang == 'en') ? 'en' : 'ar';

    load_textdomain('', get_template_directory() . '/features/translate/languages/' . $locale . '.mo');
}
add_action('after_setup_theme', 'custom_load_theme_textdomain');

?>
