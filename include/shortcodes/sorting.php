<?php

// Add custom sorting dropdown using a shortcode
function custom_sorting_shortcode() {
    $sorting_options = array(
        'highest_price' => __('الاعلي سعراً', 'woocommerce'),
        'lowest_price' => __('الاقل سعراً', 'woocommerce'),
        'best_seller' => __('الاكثر مبيعاً', 'woocommerce'),
        'newest' => __('الاحدث', 'woocommerce'),
    );

    ob_start();
    ?>
    <form method="GET" id="custom-sorting-form" style="display:none;">
        <input type="hidden" name="custom_orderby" id="custom_orderby_input">
    </form>
    <ul id="custom-sorting" style="list-style: none; padding: 0; background : white ; box-shadow : 2px 2px 4px #0005 ; width : 140px">
        <?php foreach ( $sorting_options as $value => $label ) : ?>
            <li class="sortli" style="cursor: pointer; padding: 10px 20px; margin: 5px 0;" onclick="submitSortingForm('<?php echo esc_attr( $value ); ?>')">
                <?php echo esc_html( $label ); ?>
            </li>
<style>.sortli:hover{background : #999999 ; color : white}</style>
        <?php endforeach; ?>
    </ul>
    <script>
        function submitSortingForm(value) {
            document.getElementById('custom_orderby_input').value = value;
            document.getElementById('custom-sorting-form').submit();
        }
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('sorting', 'custom_sorting_shortcode');


// Apply custom sorting logic
function apply_custom_sorting( $query ) {
    if ( ! is_admin() && $query->is_main_query() && ( is_shop() || is_product_category() || is_product_tag() ) ) {
        if ( isset( $_GET['custom_orderby'] ) ) {
            switch ( $_GET['custom_orderby'] ) {
                case 'highest_price':
                    $query->set( 'meta_key', '_price' );
                    $query->set( 'orderby', 'meta_value_num' );
                    $query->set( 'order', 'DESC' );
                    break;
                case 'lowest_price':
                    $query->set( 'meta_key', '_price' );
                    $query->set( 'orderby', 'meta_value_num' );
                    $query->set( 'order', 'ASC' );
                    break;
                case 'best_seller':
                    $query->set( 'meta_key', 'total_sales' );
                    $query->set( 'orderby', 'meta_value_num' );
                    $query->set( 'order', 'DESC' );
                    break;
                case 'newest':
                    $query->set( 'orderby', 'date' );
                    $query->set( 'order', 'DESC' );
                    break;
            }
        }
    }
}
add_action( 'pre_get_posts', 'apply_custom_sorting' );


// Ensure custom sorting is preserved across pagination
function custom_sorting_pagination_args( $args ) {
    if ( isset( $_GET['custom_orderby'] ) ) {
        $args['add_args'] = array( 'custom_orderby' => sanitize_text_field( $_GET['custom_orderby'] ) );
    }
    return $args;
}
add_filter( 'woocommerce_pagination_args', 'custom_sorting_pagination_args' );



?>