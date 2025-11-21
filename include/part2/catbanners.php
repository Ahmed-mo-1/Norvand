

<?php
//banners
// Hook to add custom fields to WooCommerce category edit page
add_action('product_cat_edit_form_fields', 'add_custom_category_fields', 10, 2);

function add_custom_category_fields($term, $taxonomy) {
    // Add fields for images and buttons
    for ($i = 2; $i <= 4; $i++) {
        echo '<tr class="form-field">';
        echo '<th scope="row" valign="top"><label for="thumb_image_' . $i . '">Thumbnail ' . $i . '</label></th>';
        echo '<td>
            <input type="text" name="thumb_image_' . $i . '" id="thumb_image_' . $i . '" value="' . esc_attr(get_term_meta($term->term_id, 'thumb_image_' . $i, true)) . '" />
            <br><span class="description">Enter the thumbnail image URL.</span>
            <br><br>
            <label for="thumb_button_text_' . $i . '">Button Text</label>
            <input type="text" name="thumb_button_text_' . $i . '" id="thumb_button_text_' . $i . '" value="' . esc_attr(get_term_meta($term->term_id, 'thumb_button_text_' . $i, true)) . '" />
            <br><span class="description">Enter the button text.</span>
            <br><br>
            <label for="thumb_button_link_' . $i . '">Button URL</label>
            <input type="text" name="thumb_button_link_' . $i . '" id="thumb_button_link_' . $i . '" value="' . esc_attr(get_term_meta($term->term_id, 'thumb_button_link_' . $i, true)) . '" />
            <br><span class="description">Enter the button link URL.</span>
        </td>';
        echo '</tr>';
    }
}

// Hook to save custom fields data
add_action('edited_product_cat', 'save_custom_category_fields', 10, 2);

function save_custom_category_fields($term_id, $tt_id) {
    for ($i = 2; $i <= 4; $i++) {
        if (isset($_POST['thumb_image_' . $i])) {
            update_term_meta($term_id, 'thumb_image_' . $i, sanitize_text_field($_POST['thumb_image_' . $i]));
            update_term_meta($term_id, 'thumb_button_text_' . $i, sanitize_text_field($_POST['thumb_button_text_' . $i]));
            update_term_meta($term_id, 'thumb_button_link_' . $i, sanitize_text_field($_POST['thumb_button_link_' . $i]));
        }
    }
}

// Shortcode to display custom category thumbnails and buttons dynamically based on the current URL category with attributes to select thumbnails
function display_custom_category_thumbnails_dynamic($atts) {
    // Extract attributes and set default values
    $atts = shortcode_atts(
        array(
            'thumbs' => '2,3,4'  // Default to show all available thumbnails (2, 3, and 4)
        ),
        $atts,
        'category_meta'
    );

    // Convert 'thumbs' attribute to an array
    $thumbs_to_display = explode(',', $atts['thumbs']);
    $thumbs_to_display = array_map('intval', $thumbs_to_display);  // Ensure the values are integers

    // Check if we're on a product category page
    if (is_product_category()) {
        // Get the current category object
        $current_category = get_queried_object();

        if (isset($current_category->term_id)) {
            $category_id = $current_category->term_id;
            $has_image = false;

            // Check if at least one thumbnail image is not empty
            foreach ($thumbs_to_display as $thumb_number) {
                if ($thumb_number >= 2 && $thumb_number <= 4) {  // Only allow valid thumbnail numbers
                    $image = get_term_meta($category_id, 'thumb_image_' . $thumb_number, true);
                    if (!empty($image)) {
                        $has_image = true;
                        break;  // No need to check further if we found an image
                    }
                }
            }

            // Proceed only if we found at least one non-empty image
            if ($has_image) {
                $output = '<div class="product x2"><div class="custom-thumbnails">';

                // Loop through the specified thumbnails
                foreach ($thumbs_to_display as $thumb_number) {
                    if ($thumb_number >= 2 && $thumb_number <= 4) {  // Only allow valid thumbnail numbers
                        $image = get_term_meta($category_id, 'thumb_image_' . $thumb_number, true);
                        $button_text = get_term_meta($category_id, 'thumb_button_text_' . $thumb_number, true);
                        $button_link = get_term_meta($category_id, 'thumb_button_link_' . $thumb_number, true);

                        if (!empty($image)) {
                            $output .= '<div class="thumbnail">
                                <img src="' . esc_url($image) . '" alt="Thumbnail ' . $thumb_number . '" />
                                <div class="btndiv"><a href="' . esc_url($button_link) . '" class="button">' . esc_html($button_text) . '</a></div>
                            </div>';
                        }
                    }
                }

                $output .= '</div></div>';
                return $output;
            }
        }
    }

    // Return a message or empty string if not on a category page or no category found
    return null;
}

// Register the shortcode
add_shortcode('category_meta', 'display_custom_category_thumbnails_dynamic');

?>
