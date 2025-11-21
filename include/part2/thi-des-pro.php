<?php
/**
 * @snippet       Third, Fourth Description with Two Images @ Single Product
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 7
 * @community     https://businessbloomer.com/club/
 */
 
// Adding meta boxes for third, fourth descriptions, and images
add_action('add_meta_boxes', 'bbloomer_new_meta_box_single_prod');

function bbloomer_new_meta_box_single_prod() {
    add_meta_box(
        'custom_product_meta_box',
        'Product third description',
        'bbloomer_add_custom_content_meta_box_third',
        'product',
        'normal',
        'default'
    );
    add_meta_box(
        'custom_product_meta_box_fourth',
        'Product fourth description',
        'bbloomer_add_custom_content_meta_box_fourth',
        'product',
        'normal',
        'default'
    );
    add_meta_box(
        'custom_product_meta_box_image',
        'get the look',
        'bbloomer_add_custom_content_meta_box_image',
        'product',
        'normal',
        'default'
    );
    add_meta_box(
        'custom_product_meta_box_image2',
        'Product Image 2',
        'bbloomer_add_custom_content_meta_box_image2',
        'product',
        'normal',
        'default'
    );
}

function bbloomer_add_custom_content_meta_box_third($post) {
    $third_desc = get_post_meta($post->ID, '_third_desc', true) ? get_post_meta($post->ID, '_third_desc', true) : '';   
    wp_editor($third_desc, '_third_desc');
}

function bbloomer_add_custom_content_meta_box_fourth($post) {
    $fourth_desc = get_post_meta($post->ID, '_fourth_desc', true) ? get_post_meta($post->ID, '_fourth_desc', true) : '';   
    wp_editor($fourth_desc, '_fourth_desc');
}

function bbloomer_add_custom_content_meta_box_image($post) {
    $image_id = get_post_meta($post->ID, '_product_image_id', true);
    $image_url = $image_id ? wp_get_attachment_url($image_id) : '';
    echo '<div class="custom-image-meta-box">';
    echo '<img id="product_image_preview" src="' . esc_url($image_url) . '" style="max-width:100%;" />';
    echo '<input type="hidden" id="product_image_id" name="_product_image_id" value="' . esc_attr($image_id) . '" />';
    echo '<input type="button" id="upload_image_button" class="button" value="Upload Image" />';
    echo '<input type="button" id="remove_image_button" class="button" value="Remove Image" />';
    echo '</div>';
    ?>
    <script>
    jQuery(document).ready(function($) {
        var mediaUploader;
        $('#upload_image_button').click(function(e) {
            e.preventDefault();
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
            mediaUploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose Image',
                button: {
                    text: 'Choose Image'
                }, multiple: false });
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#product_image_id').val(attachment.id);
                $('#product_image_preview').attr('src', attachment.url);
            });
            mediaUploader.open();
        });
        $('#remove_image_button').click(function() {
            $('#product_image_id').val('');
            $('#product_image_preview').attr('src', '');
        });
    });
    </script>
    <?php
}

function bbloomer_add_custom_content_meta_box_image2($post) {
    $image_id = get_post_meta($post->ID, '_product_image_id2', true);
    $image_url = $image_id ? wp_get_attachment_url($image_id) : '';
    echo '<div class="custom-image-meta-box">';
    echo '<img id="product_image_preview2" src="' . esc_url($image_url) . '" style="max-width:100%;" />';
    echo '<input type="hidden" id="product_image_id2" name="_product_image_id2" value="' . esc_attr($image_id) . '" />';
    echo '<input type="button" id="upload_image_button2" class="button" value="Upload Image" />';
    echo '<input type="button" id="remove_image_button2" class="button" value="Remove Image" />';
    echo '</div>';
    ?>
    <script>
    jQuery(document).ready(function($) {
        var mediaUploader;
        $('#upload_image_button2').click(function(e) {
            e.preventDefault();
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
            mediaUploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose Image',
                button: {
                    text: 'Choose Image'
                }, multiple: false });
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#product_image_id2').val(attachment.id);
                $('#product_image_preview2').attr('src', attachment.url);
            });
            mediaUploader.open();
        });
        $('#remove_image_button2').click(function() {
            $('#product_image_id2').val('');
            $('#product_image_preview2').attr('src', '');
        });
    });
    </script>
    <?php
}

// Save the third, fourth descriptions, and images
add_action('save_post_product', 'bbloomer_save_custom_content_meta_box', 10, 1);

function bbloomer_save_custom_content_meta_box($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['_third_desc'])) {
        update_post_meta($post_id, '_third_desc', $_POST['_third_desc']);
    }
    if (isset($_POST['_fourth_desc'])) {
        update_post_meta($post_id, '_fourth_desc', $_POST['_fourth_desc']);
    }
    if (isset($_POST['_product_image_id'])) {
        update_post_meta($post_id, '_product_image_id', $_POST['_product_image_id']);
    }
    if (isset($_POST['_product_image_id2'])) {
        update_post_meta($post_id, '_product_image_id2', $_POST['_product_image_id2']);
    }
}

// Display third and fourth descriptions and images on the single product page
//add_action('woocommerce_after_single_product_summary', 'bbloomer_third_fourth_desc_image_bottom_single_product', 99);

function bbloomer_third_fourth_desc_image_bottom_single_product() {
    global $product;
    $third_desc = get_post_meta($product->get_id(), '_third_desc', true) ? get_post_meta($product->get_id(), '_third_desc', true) : '';
    $fourth_desc = get_post_meta($product->get_id(), '_fourth_desc', true) ? get_post_meta($product->get_id(), '_fourth_desc', true) : '';
    $image_id = get_post_meta($product->get_id(), '_product_image_id', true);
    $image_url = $image_id ? wp_get_attachment_url($image_id) : '';
    $image_id2 = get_post_meta($product->get_id(), '_product_image_id2', true);
    $image_url2 = $image_id2 ? wp_get_attachment_url($image_id2) : '';

    if ($third_desc) {
        echo '<div class="third-description">';
        echo '<h2>Third Description</h2>';
        echo $third_desc;
        echo '</div>';
    }
    if ($fourth_desc) {
        echo '<div class="fourth-description">';
        echo '<h2>Fourth Description</h2>';
        echo $fourth_desc;
        echo '</div>';
    }
    if ($image_url) {
        echo '<div class="product-image">';
        echo '<h2>Product Image 1</h2>';
        echo '<img src="' . esc_url($image_url) . '" alt="Product Image" />';
        echo '</div>';
    }
    if ($image_url2) {
        echo '<div class="product-image">';
        echo '<h2>Product Image 2</h2>';
        echo '<img src="' . esc_url($image_url2) . '" alt="Product Image" />';
        echo '</div>';
    }
}

// Optional: Add shortcodes for third, fourth descriptions, and images if needed
add_shortcode('pro_third_desc', 'bbloomer_third_desc_shortcode');
add_shortcode('pro_fourth_desc', 'bbloomer_fourth_desc_shortcode');
add_shortcode('pro_image2', 'bbloomer_image_shortcode');
add_shortcode('pro_image3', 'bbloomer_image2_shortcode');

function bbloomer_third_desc_shortcode() {
    global $product;
    $third_desc = get_post_meta($product->get_id(), '_third_desc', true) ? get_post_meta($product->get_id(), '_third_desc', true) : '';
    return $third_desc ? '<div class="third-description">' . $third_desc . '</div>' : '';
}

function bbloomer_fourth_desc_shortcode() {
    global $product;
    $fourth_desc = get_post_meta($product->get_id(), '_fourth_desc', true) ? get_post_meta($product->get_id(), '_fourth_desc', true) : '';
    return $fourth_desc ? '<div class="fourth-description">' . $fourth_desc . '</div>' : '';
}

function bbloomer_image_shortcode() {
    global $product;
    $image_id = get_post_meta($product->get_id(), '_product_image_id', true);
    $image_url = $image_id ? wp_get_attachment_url($image_id) : '';
    return $image_url ? '<div class="w50m100"><img class="w100pe" src="' . esc_url($image_url) . '" alt="Product Image" /></div>' : '<div class="w50m100"><img class="w100pe" 
	src="https://norvandshop.com/updating/wp-content/uploads/2024/06/19931994-19073076-gp-pt-dbed-non-e2.webp" 
	alt="Product Image" /></div>';
}

function bbloomer_image2_shortcode() {
    global $product;
    $image_id = get_post_meta($product->get_id(), '_product_image_id2', true);
    $image_url = $image_id ? wp_get_attachment_url($image_id) : '';
    return $image_url ? '<div class="product-image"><img src="' . esc_url($image_url) . '" alt="Product Image" /></div>' : '';
}
?>
