<?php


//use the images urls and upload them to the server
// Add custom meta box for image URLs
function custom_image_urls_meta_box() {
    add_meta_box(
        'product_image_urls',
        'Product Image URLs',
        'display_image_urls_meta_box',
        'product',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'custom_image_urls_meta_box');

function display_image_urls_meta_box($post) {
    wp_nonce_field(basename(__FILE__), 'product_image_urls_nonce');
    $image_urls = get_post_meta($post->ID, '_product_image_urls', true);
    ?>
    <p>
        <label for="product_image_urls">Enter Image URLs (one per line):</label>
        <textarea name="product_image_urls" id="product_image_urls" rows="5" style="width: 100%;"><?php echo esc_textarea($image_urls); ?></textarea>
    </p>
    <?php
}

function save_product_image_urls($post_id) {
    if (!isset($_POST['product_image_urls_nonce']) || !wp_verify_nonce($_POST['product_image_urls_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    $new_image_urls = (isset($_POST['product_image_urls']) ? sanitize_textarea_field($_POST['product_image_urls']) : '');
    update_post_meta($post_id, '_product_image_urls', $new_image_urls);

    if (!empty($new_image_urls)) {
        $image_urls_array = array_filter(array_map('trim', explode("\n", $new_image_urls)));
        add_product_images_from_url($post_id, $image_urls_array);
    }
}
add_action('save_post', 'save_product_image_urls');

function add_product_images_from_url($product_id, $image_urls) {
    if (!is_array($image_urls) || empty($image_urls)) return;

    // Adding the featured image
    $featured_image_url = array_shift($image_urls); // First URL is the featured image
    $featured_image_id = upload_image_from_url($featured_image_url);
    if ($featured_image_id) {
        set_post_thumbnail($product_id, $featured_image_id);
    }

    // Adding the rest of the images to the product gallery
    $gallery_image_ids = [];
    foreach ($image_urls as $image_url) {
        $image_id = upload_image_from_url($image_url);
        if ($image_id) {
            $gallery_image_ids[] = $image_id;
        }
    }

    if (!empty($gallery_image_ids)) {
        update_post_meta($product_id, '_product_image_gallery', implode(',', $gallery_image_ids));
    }
}

function upload_image_from_url($image_url) {
    $image_name = basename($image_url);
    $upload_dir = wp_upload_dir();
    $image_data = file_get_contents($image_url);

    if (!$image_data) return false;

    $unique_file_name = wp_unique_filename($upload_dir['path'], $image_name);
    $file_path = $upload_dir['path'] . '/' . $unique_file_name;

    file_put_contents($file_path, $image_data);

    $file_type = wp_check_filetype($unique_file_name, null);
    $attachment = [
        'post_mime_type' => $file_type['type'],
        'post_title' => sanitize_file_name($unique_file_name),
        'post_content' => '',
        'post_status' => 'inherit'
    ];

    $attachment_id = wp_insert_attachment($attachment, $file_path);
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attachment_data = wp_generate_attachment_metadata($attachment_id, $file_path);
    wp_update_attachment_metadata($attachment_id, $attachment_data);

    return $attachment_id;
}

?>