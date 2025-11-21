<?php
// Function to display the language selector form
function custom_language_selector() {
    $languages = ['ar' => 'Arabic','en' => 'English', ];
    echo '<form id="language-selector">';
    echo '<select name="lang" id="lang">';
    foreach ($languages as $code => $name) {
        $selected = (isset($_COOKIE['lang']) && $_COOKIE['lang'] === $code) ? 'selected' : '';
        echo '<option value="' . $code . '" ' . $selected . '>' . $name . '</option>';
    }
    echo '</select>';
    echo '</form>';
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("lang").addEventListener("change", function() {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "' . admin_url('admin-ajax.php') . '", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        setTimeout(function() {
                            location.reload();
                        }, 100);
                    }
                };
                xhr.send("action=set_language_cookie&lang=" + encodeURIComponent(this.value));
            });
        });
    </script>';
}
add_shortcode('language', 'custom_language_selector');

?>