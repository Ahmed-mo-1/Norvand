

<?php 

//copy p link from search
add_action('add_meta_boxes', 'custom_product_search_meta_box');

function custom_product_search_meta_box() {
    add_meta_box(
        'product_search_meta_box', // ID
        'Product Search', // Title
        'render_product_search_meta_box', // Callback
        'product', // Post type
        'side', // Context
        'default' // Priority
    );
}

function render_product_search_meta_box($post) {
    ?>
<?php
echo htmlspecialchars('
<div class="ccconcon">

</div>')
?>
 <div id="product-search-box">
    <select id="active-toggle">
        <option value="active">Active</option>
        <option value="">Not Active</option>
    </select>
    <select id="class-toggle">
        <option value="ccg">Gold</option>
        <option value="ccr">Rose Gold</option>
        <option value="ccb">Black</option>
        <option value="ccs">Silver</option>

        <!-- Add more options as needed -->
    </select>
<br>
    <input type="text" id="product-search-input" placeholder="Search for a product" style="width: 100%; padding: 5px; margin-bottom: 10px;">
    <ul id="product-search-results" style="list-style-type: none; padding: 0;"></ul>
</div>
<script>
    jQuery(document).ready(function($) {
        $('#product-search-input').on('input', function() {
            var searchQuery = $(this).val();
            if (searchQuery.length > 2) {
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'search_products',
                        query: searchQuery
                    },
                    success: function(response) {
                        $('#product-search-results').html(response);
                    }
                });
            } else {
                $('#product-search-results').html('');
            }
        });

        $(document).on('click', '.product-link', function() {
            var activeClass = $('#active-toggle').val();
            var linkClass = $('#class-toggle').val();
            var productUrl = '<div class="cccon ' + activeClass + '"><a href="' + $(this).data('url') + '" class="cc ' + linkClass + '"></a></div>';
            navigator.clipboard.writeText(productUrl);
            // navigator.clipboard.writeText(productUrl).then(function() {alert('Product URL copied to clipboard');});
        });

        $('#active-toggle').on('change', function() {
            var activeClass = $(this).val();
            $('.cccon').toggleClass('active', activeClass === 'active');
        });

        $('#class-toggle').on('change', function() {
            var newClass = $(this).val();
            $('.cc').attr('class', 'cc ' + newClass);
        });
    });
</script>

    <?php
}


add_action('wp_ajax_search_products', 'handle_search_products');

function handle_search_products() {
    global $wpdb;

    $search_query = sanitize_text_field($_POST['query']);
    $results = [];

    if (!empty($search_query)) {
        $query = $wpdb->prepare("SELECT ID, post_title FROM {$wpdb->posts} WHERE post_title LIKE %s AND post_type = 'product' AND post_status = 'publish'", '%' . $wpdb->esc_like($search_query) . '%');
        $products = $wpdb->get_results($query);

        foreach ($products as $product) {
            $product_id = $product->ID;
            $product_title = $product->post_title;
            $product_url = get_permalink($product_id);
            $product_img = get_the_post_thumbnail_url($product_id, 'thumbnail');
            
            $results[] = [
                'id' => $product_id,
                'title' => $product_title,
                'url' => $product_url,
                'img' => $product_img
            ];
        }
    }

    if (!empty($results)) {
        foreach ($results as $product) {
            echo '<li style="margin-bottom: 10px; display: flex; align-items: center;">';
            echo '<img src="' . esc_url($product['img']) . '" alt="' . esc_attr($product['title']) . '" style="width: 50px; height: 50px; margin-right: 10px;">';
            echo '<a href="javascript:void(0);" class="product-link" data-url="' . esc_url($product['url']) . '">' . esc_html($product['title']) . '</a>';
            echo '</li>';
        }
    } else {
        echo '<li>No products found.</li>';
    }

    wp_die();
}






?>