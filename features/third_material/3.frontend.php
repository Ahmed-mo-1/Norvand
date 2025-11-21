<?php

add_shortcode('third_material', 'display_third_material_product_links');

function display_third_material_product_links() {
global $post;

$fields = array(
'fabric_blue', 'fabric_gold', 'fabric_gray', 'fabric_light_blue',
'fabric_oliver', 'fabric_pink', 'fabric_red', 'fabric_rosegold',
'fabric_white', 'fabric_black', 'fabric_white_black', 'marble_pink_brown', 'marble_white_black'
);

$has_any_material = false;

ob_start();
?>

<div class="color-container">
<div class="material">
<?php echo __('القماش :',''); ?>
</div>
<div class="material-group">
<?php
foreach ($fields as $field) {
$product_id = get_post_meta($post->ID, '_third_material_' . $field, true);
if ($product_id) {
$has_any_material = true;

if ($product_id === 'self') {
echo '<div class="material-border active"><a class="material-link ' . esc_attr($field) . '" href="' . get_permalink($post->ID) . '" aria-label="' . ucfirst(str_replace('_', ' ', $field)) . ': ' . esc_html(get_the_title($post->ID)) . '"></a></div>';
} else {
$product = wc_get_product($product_id);
if ($product) {
echo '<div class="material-border"><a class="material-link ' . esc_attr($field) . '" href="' . get_permalink($product_id) . '" aria-label="' . ucfirst(str_replace('_', ' ', $field)) . ': ' . esc_html($product->get_name()) . '"></a></div>';
}
}
}
}
?>
</div>

<?php

$posttags = get_the_terms( get_the_ID(), 'product_tag' );
if($posttags){
foreach($posttags as $product_tag) {
echo '<p style="visibility : hidden">' . $product_tag->name . '</p>'; }};

?>

</div>
<?php

$output = ob_get_clean();
if ($has_any_material) {
echo $output;
}
}

?>