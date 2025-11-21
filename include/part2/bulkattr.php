<?php

// Add custom bulk edit fields for attributes and values
add_action('woocommerce_product_bulk_edit_end', 'add_bulk_edit_attributes');

function add_bulk_edit_attributes() {
    ?>
    <div class="inline-edit-group">
        <label class="inline-edit-status alignleft">
            <span class="title"><?php esc_html_e('Attributes', 'textdomain'); ?></span>
            <span class="input-text-wrap">
                <div id="bulk-edit-attributes-container">
                    <div class="attribute-row">
                        <select name="_bulk_edit_attributes[]" class="bulk-edit-attributes">
                            <option value=""><?php esc_html_e('— Select Attribute —', 'textdomain'); ?></option>
                            <?php
                            $attributes = wc_get_attribute_taxonomies();
                            foreach ($attributes as $attribute) {
                                echo '<option value="' . esc_attr($attribute->attribute_name) . '">' . esc_html($attribute->attribute_label) . '</option>';
                            }
                            ?>
                        </select>
                        <select name="_bulk_edit_attribute_values[]" class="bulk-edit-attribute-values">
                            <option value=""><?php esc_html_e('— Select Value —', 'textdomain'); ?></option>
                        </select>
                        <button type="button" class="button remove-attribute-row">Remove</button>
                    </div>
                </div>
                <button type="button" class="button add-attribute-row"><?php esc_html_e('Add Attribute', 'textdomain'); ?></button>
            </span>
        </label>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            function updateAttributeValues(attributeSelect) {
                var $valuesDropdown = attributeSelect.next('.bulk-edit-attribute-values');
                var attribute = attributeSelect.val();
                $valuesDropdown.empty();
                $valuesDropdown.append('<option value=""><?php esc_html_e('— Select Value —', 'textdomain'); ?></option>');

                if (attribute) {
                    $.ajax({
                        url: ajaxurl,
                        type: 'POST',
                        data: {
                            action: 'get_attribute_values',
                            attribute: attribute,
                        },
                        success: function(response) {
                            var values = JSON.parse(response);
                            $.each(values, function(index, value) {
                                $valuesDropdown.append('<option value="' + value.slug + '">' + value.name + '</option>');
                            });
                        }
                    });
                }
            }

            $(document).on('change', '.bulk-edit-attributes', function() {
                updateAttributeValues($(this));
            });

            $('.add-attribute-row').on('click', function() {
                var newRow = $('.attribute-row:first').clone();
                newRow.find('select').val('');
                $('#bulk-edit-attributes-container').append(newRow);
            });

            $(document).on('click', '.remove-attribute-row', function() {
                if ($('.attribute-row').length > 1) {
                    $(this).closest('.attribute-row').remove();
                }
            });
        });
    </script>
    <?php
}

// AJAX handler to get attribute values
add_action('wp_ajax_get_attribute_values', 'get_attribute_values');

function get_attribute_values() {
    $attribute_name = sanitize_text_field($_POST['attribute']);
    $taxonomy = 'pa_' . $attribute_name;
    $terms = get_terms(array(
        'taxonomy' => $taxonomy,
        'hide_empty' => false,
    ));

    $values = array();
    if (!is_wp_error($terms)) {
        foreach ($terms as $term) {
            $values[] = array(
                'slug' => $term->slug,
                'name' => $term->name,
            );
        }
    }

    echo json_encode($values);
    wp_die();
}

add_action('woocommerce_product_bulk_edit_save', 'save_bulk_edit_attributes', 10, 1);

function save_bulk_edit_attributes($product) {
    $product_id = $product->get_id();
    
    if (isset($_REQUEST['_bulk_edit_attributes']) && isset($_REQUEST['_bulk_edit_attribute_values'])) {
        $attributes = $_REQUEST['_bulk_edit_attributes'];
        $values = $_REQUEST['_bulk_edit_attribute_values'];
        
        $product_attributes = $product->get_attributes();
        
        foreach ($attributes as $index => $attribute) {
            $attribute = sanitize_text_field($attribute);
            $value = sanitize_text_field($values[$index]);
            
            if ($attribute && $value) {
                $taxonomy = 'pa_' . $attribute;
                
                // Check if the attribute exists on the product
                if (!isset($product_attributes[$taxonomy])) {
                    // Attribute does not exist; add it
                    $product_attributes[$taxonomy] = new WC_Product_Attribute();
                    $product_attributes[$taxonomy]->set_id( wc_attribute_taxonomy_id_by_name( $attribute ) );
                    $product_attributes[$taxonomy]->set_name( $taxonomy );
                    $product_attributes[$taxonomy]->set_options( array() );
                    $product_attributes[$taxonomy]->set_position( 0 );
                    $product_attributes[$taxonomy]->set_visible( 1 );
                    $product_attributes[$taxonomy]->set_variation( 1 );
                }
                
                // Check if the term exists
                $term = get_term_by('slug', $value, $taxonomy);
                if ($term) {
                    // Get existing options and add new term
                    $options = $product_attributes[$taxonomy]->get_options();
                    $options[] = $term->term_id;
                    $product_attributes[$taxonomy]->set_options($options);

                    // Assign the term to the product
                    $result = wp_set_object_terms($product_id, $term->term_id, $taxonomy, true);
                    
                    // Log the process for debugging
                    if (is_wp_error($result)) {
                        error_log("Error setting term {$value} for taxonomy {$taxonomy}: " . $result->get_error_message());
                    } else {
                        error_log("Set term {$value} for taxonomy {$taxonomy} on product {$product_id}");
                    }
                } else {
                    error_log("Term {$value} does not exist in taxonomy {$taxonomy}");
                }
            }
        }
        
        // Save the product to ensure attributes are updated
        $product->set_attributes($product_attributes);
        $product->save();
    } else {
        error_log("No attribute or value data received for bulk edit");
    }
}



?>