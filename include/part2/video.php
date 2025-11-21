<?php

function add_video_url_meta_box() {
    add_meta_box(
        'video_url_meta_box', 
        'Product Video URL', 
        'display_video_url_meta_box', 
        'product', 
        'side', 
        'high'
    );
}
add_action('add_meta_boxes', 'add_video_url_meta_box');

function display_video_url_meta_box($post) {
    $video_url = get_post_meta($post->ID, '_video_url', true);
    ?>
    <label for="video_url">Video URL:</label>
    <input type="text" name="video_url" value="<?php echo esc_attr($video_url); ?>" size="25" />
    <?php
}

function save_video_url_meta_box($post_id) {
    if (isset($_POST['video_url'])) {
        update_post_meta($post_id, '_video_url', sanitize_text_field($_POST['video_url']));
    }
}
add_action('save_post', 'save_video_url_meta_box');


add_shortcode('woovideo', 'display_video_in_product_gallery');

function display_video_in_product_gallery($html, $attachment_id) {
    global $post;
    $video_url = get_post_meta($post->ID, '_video_url', true);

    if (!empty($video_url)) {?>

<div class="swiper-slide" style="" role="listitem">
<video width="100%" height="100%" frameborder="0" allowfullscreen autoplay muted loop>
<source src="<?php echo esc_url($video_url) ?>" type="video/mp4">
<source src="<?php echo esc_url($video_url) ?>" type="video/ogg">
</video>
</div> <?php
    }

}




?>