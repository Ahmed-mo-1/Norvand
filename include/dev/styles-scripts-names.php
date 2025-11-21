<?php

function list_enqueued_styles() {
global $wp_styles;
foreach ($wp_styles->queue as $handle) { echo $handle . '<br>'; }
}

//add_action('wp_print_styles', 'list_enqueued_styles');

function list_enqueued_scripts() {
global $wp_scripts;
foreach ($wp_scripts->queue as $handle) { echo $handle . '<br>'; }
}

//add_action('wp_print_styles', 'list_enqueued_scripts');

?>