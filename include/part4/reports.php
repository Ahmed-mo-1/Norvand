<?php // Function to retrieve order data for a specific status
function get_woocommerce_orders_data_by_status($status) {
    if (!function_exists('wc_get_orders')) {
        error_log('WooCommerce function wc_get_orders is not available.');
        return array();
    }

    $args = array(
        'status' => $status,
        'limit'  => -1,
    );

    try {
        $orders = wc_get_orders($args);
    } catch (Exception $e) {
        error_log('Error fetching orders: ' . $e->getMessage());
        return array();
    }

    $orders_data = array();

    foreach ($orders as $order) {
        $order_data = $order->get_data();
        $order_id = $order->get_id();
        $order_date = $order->get_date_created() ? $order->get_date_created()->date('Y-m-d H:i:s') : 'N/A';
        $customer_name = $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();
        $customer_phone = $order->get_billing_phone();
        $customer_email = $order->get_billing_email();
        $order_total = $order->get_total();
        $order_items = $order->get_items();

        $items = array();
        foreach ($order_items as $item_id => $item) {
            $product_name = $item->get_name();
            $product_quantity = $item->get_quantity();
            $product_total = $item->get_total();

            $items[] = array(
                'product_name'   => $product_name,
                'product_quantity' => $product_quantity,
                'product_total'  => $product_total,
            );
        }

        $orders_data[] = array(
            'order_id'       => $order_id,
            'order_date'     => $order_date,
            'customer_name'  => $customer_name,
            'customer_phone' => $customer_phone,
            'customer_email' => $customer_email,
            'order_total'    => $order_total,
            'items'          => $items,
        );
    }

    return $orders_data;
}

// Function to create a custom admin page
function custom_woocommerce_reports_page() {
    add_menu_page(
        'WooCommerce Custom Reports',    // Page title
        'Custom Reports',                // Menu title
        'manage_options',                // Capability
        'woocommerce-custom-reports',    // Menu slug
        'display_custom_reports_page',   // Function to display the page content
        'dashicons-chart-bar',           // Icon URL
        56                               // Position
    );
}
add_action('admin_menu', 'custom_woocommerce_reports_page');

// Function to display the custom report page content
function display_custom_reports_page() {
    if (!current_user_can('manage_options')) {
        return;
    }

    $order_statuses = array('completed', 'processing', 'pending');

    echo '<div class="wrap">';
    echo '<h1>WooCommerce Custom Reports</h1>';

    foreach ($order_statuses as $status) {
        $orders_data = get_woocommerce_orders_data_by_status($status);

        echo '<h2>' . ucfirst($status) . ' Orders</h2>';
        echo '<table class="widefat fixed" cellspacing="0">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Order ID</th>';
        echo '<th>Order Date</th>';
        echo '<th>Customer Name</th>';
        echo '<th>Customer Phone</th>';
        echo '<th>Customer Email</th>';
        echo '<th>Order Total</th>';
        echo '<th>Items</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($orders_data as $order) {
            echo '<tr>';
            echo '<td>' . esc_html($order['order_id']) . '</td>';
            echo '<td>' . esc_html($order['order_date']) . '</td>';
            echo '<td>' . esc_html($order['customer_name']) . '</td>';
            echo '<td>' . esc_html($order['customer_phone']) . '</td>';
            echo '<td>' . esc_html($order['customer_email']) . '</td>';
            echo '<td>' . esc_html($order['order_total']) . '</td>';
            echo '<td>';

            foreach ($order['items'] as $item) {
                echo esc_html($item['product_name']) . ' x ' . esc_html($item['product_quantity']) . ' (' . esc_html($item['product_total']) . ')<br>';
            }

            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    }

    echo '</div>';
}
?>