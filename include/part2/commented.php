







<?php
/*
// attributes menu
function register_product_attributes_menu() {
    add_meta_box('product-attributes-nav', __('Product Attributes'), 'product_attributes_nav_menu', 'nav-menus', 'side', 'default');
}
add_action('admin_init', 'register_product_attributes_menu');

function product_attributes_nav_menu() {
    $taxonomy = 'pa_color'; // Replace 'pa_color' with your attribute taxonomy.
    $terms = get_terms(array('taxonomy' => $taxonomy, 'hide_empty' => false));

    ?>
    <div id="posttype-product-attributes" class="posttypediv">
        <div id="tabs-panel-product-attributes" class="tabs-panel tabs-panel-active">
            <ul id="product-attributes-checklist" class="categorychecklist form-no-clear">
                <?php foreach ($terms as $term): ?>
                    <li>
                        <label class="menu-item-title">
                            <input type="checkbox" class="menu-item-checkbox" name="menu-item[-<?php echo $term->term_id; ?>][menu-item-object-id]" value="<?php echo $term->term_id; ?>"> <?php echo $term->name; ?>
                        </label>
                        <input type="hidden" class="menu-item-type" name="menu-item[-<?php echo $term->term_id; ?>][menu-item-type]" value="taxonomy">
                        <input type="hidden" class="menu-item-object" name="menu-item[-<?php echo $term->term_id; ?>][menu-item-object]" value="<?php echo $taxonomy; ?>">
                        <input type="hidden" class="menu-item-url" name="menu-item[-<?php echo $term->term_id; ?>][menu-item-url]" value="">
                        <input type="hidden" class="menu-item-title" name="menu-item[-<?php echo $term->term_id; ?>][menu-item-title]" value="<?php echo $term->name; ?>">
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <p class="button-controls">
            <span class="add-to-menu">
                <button type="submit" class="button-secondary submit-add-to-menu right" value="<?php esc_attr_e('Add to Menu'); ?>" name="add-post-type-menu-item" id="submit-posttype-product-attributes"><?php esc_attr_e('Add to Menu'); ?></button>
            </span>
        </p>
    </div>
    <?php
}







class Walker_Nav_Menu_Product_Attributes extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        // Ensure $args is an object
        $args = (object) $args;

        // Check if this is a custom product attribute item
        if ($item->object == 'product_attribute') {
            $term_id = $item->object_id;
            $term = get_term($term_id);
            $link = get_term_link($term);

            // Add menu item output
            $output .= '<li class="menu-item"><a href="' . esc_url($link) . '">' . esc_html($term->name) . '</a></li>';
        } else {
            // Fallback to parent start_el for non-product attribute items
            parent::start_el($output, $item, $depth, $args, $id);
        }
    }
}




function register_my_menus() {
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu'),
        'secondary-menu' => __('Secondary Menu'),
        'footer-menu' => __('Footer Menu'),
    ));
}
add_action('init', 'register_my_menus');




wp_nav_menu(array(
    'theme_location' => 'primary-menu', // or your specific menu location
    'walker' => new Walker_Nav_Menu_Product_Attributes()
));




function add_custom_menu_walker($args) {
    // Ensure the $args parameter is always an array
    if (is_array($args)) {
        $args['walker'] = new Walker_Nav_Menu_Product_Attributes();
    } else {
        $args = array('walker' => new Walker_Nav_Menu_Product_Attributes());
    }
    return $args;
}
add_filter('wp_nav_menu_args', 'add_custom_menu_walker');





*/

?>









