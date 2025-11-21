<?php

// Add custom admin menu
add_action('admin_menu', 'custom_product_orders_admin_menu');

function custom_product_orders_admin_menu() {
    add_menu_page('Product Orders', 'Product Orders', 'manage_options', 'product_orders', 'custom_product_orders_page');
}

// Render custom admin page
function custom_product_orders_page() {
    ?>
    <div class="wrap">
        <h2>Product Orders</h2>
<form method="post" action="">
    <?php
    // Get all products
    $products = wc_get_products(array('status' => 'publish'));
    ?>
    <label for="product_id">Select a product:</label>
    <input type="text" id="product_search" placeholder="Search for a product..." onkeyup="filterProducts()">
    <table id="product_table">
        <thead>
            <tr>
                <th>Select</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Stock Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td>
                        <input type="radio" name="product_id" value="<?php echo esc_attr($product->get_id()); ?>">
                    </td>
                    <td><?php echo esc_html($product->get_id()); ?></td>
                    <td><?php echo esc_html($product->get_name()); ?></td>
                    <td><?php echo wc_price($product->get_price()); ?></td>
                    <td><?php echo esc_html($product->get_stock_status()); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <label for="time_period">Select a time period:</label>
    <select name="time_period" id="time_period">
        <option value="7">Last 7 days</option>
        <option value="30">Last 30 days</option>
        <option value="custom">Custom Range</option>
    </select>
    <br>
    <div id="custom_range" style="display: none;">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" value="<?php echo esc_attr(date('Y-m-d', strtotime('-7 days'))); ?>">
        <br>
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" value="<?php echo esc_attr(date('Y-m-d')); ?>">
        <br>
    </div>
    <input type="submit" name="submit" class="button-primary" value="Submit">
</form>

<script>
document.getElementById('time_period').addEventListener('change', function() {
    var customRange = document.getElementById('custom_range');
    if (this.value === 'custom') {
        customRange.style.display = 'block';
    } else {
        customRange.style.display = 'none';
    }
});

function filterProducts() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById('product_search');
    filter = input.value.toUpperCase();
    table = document.getElementById('product_table');
    tr = table.getElementsByTagName('tr');

    // Loop through all table rows and hide those that don't match the search query
    for (i = 1; i < tr.length; i++) {
        tr[i].style.display = 'none';
        td = tr[i].getElementsByTagName('td');
        for (var j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = '';
                    break;
                }
            }
        }
    }
}
</script>

        <?php
        // Check if form is submitted
        if (isset($_POST['submit']) && !empty($_POST['product_id'])) {
            $product_id = intval($_POST['product_id']);
            $time_period = $_POST['time_period'];
            if ($time_period == 'custom') {
                $start_date = sanitize_text_field($_POST['start_date']);
                $end_date = sanitize_text_field($_POST['end_date']);
            } else {
                $start_date = date('Y-m-d', strtotime("-{$time_period} days"));
                $end_date = date('Y-m-d');
            }
            $order_count = get_order_count_for_product($product_id, $start_date, $end_date);
            echo '<p>Number of completed orders for selected product: ' . $order_count . '</p>';
        }
        ?>
    </div>
    <script>
        // Toggle custom date range based on selected time period
        document.getElementById('time_period').addEventListener('change', function() {
            if (this.value === 'custom') {
                document.getElementById('custom_range').style.display = 'block';
            } else {
                document.getElementById('custom_range').style.display = 'none';
            }
        });
    </script>
    <?php
}

// Function to get number of completed orders for a product within the specified time period
function get_order_count_for_product($product_id, $start_date, $end_date) {
    $completed_orders_count = 0;
    $total_profit = 0;
    $customer_names = array();
    $product_name = '';
    $product_image = '';

    // Get product details
    $product = wc_get_product($product_id);
    if ($product) {
        $product_name = $product->get_name();
        $product_image = $product->get_image();
    }

    // Get completed orders within the specified time period
    $orders = wc_get_orders(array(
        'limit'        => -1,
        'status'       => 'completed',
        'return'       => 'ids',
        'date_created' => '>=' . $start_date . ' 00:00:00',
        'date_completed' => '<=' . $end_date . ' 23:59:59',
    ));

    // Loop through orders to count product quantity and get customer names
    foreach ($orders as $order_id) {
        $order = wc_get_order($order_id);
        foreach ($order->get_items() as $item_id => $item_data) {
            $product = $item_data->get_product();
            if ($product->get_id() === $product_id) {
                $completed_orders_count += $item_data->get_quantity();
                // Get customer name
                $customer_names[] = $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();
				$customer_phones[] = $order->get_billing_phone();
				$customer_emails[] = $order->get_billing_email();
                // Calculate total profit
                $total_profit += $item_data->get_total();
            }
        }
    }

    // Output product name and image
    echo '<p>Product Name: ' . $product_name . '</p>';
    echo '<p>Product Image: ' . $product_image . '</p>';

    // Output customer names
    if (!empty($customer_names)) {
?>
<table style="border : 1px solid black">
<tbody>
<?php
		foreach($customer_names as $name ){ ?>

        <th  style="border : 1px solid black"> <?php echo $name ; ?> </th>
<?php } ?>
<tr >
<?php
		foreach($customer_phones as $phone ){ ?>

        <td style="border : 1px solid black"> <?php echo $phone ; ?> </td>
<?php } ?>
</tr>
<tr>
<?php
		foreach($customer_emails as $email ){ ?>

        <td style="border : 1px solid black"> <?php echo $email ; ?> </td>
<?php } ?>
</tr>
</tbody>
</table>
<?php


    }

    // Output total profit
    echo '<p>Total profit generated from selected product: ' . wc_price($total_profit) . '</p>';

    return $completed_orders_count;
}




?>