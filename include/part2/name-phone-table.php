<?php

add_action( 'woocommerce_register_form_start', 'bbloomer_add_name_woo_account_registration' );
  
function bbloomer_add_name_woo_account_registration() {
    ?>
  
    <p class="form-row form-row-wide">
    <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
    </p>
  
<!--    <p class="form-row form-row-last">
    <label for="reg_billing_last_name"><?php //_e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php //if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
    </p>-->
  
    <div class="clear"></div>
  
    <?php
}
  
///////////////////////////////
// 2. VALIDATE FIELDS
  
add_filter( 'woocommerce_registration_errors', 'bbloomer_validate_name_fields', 10, 3 );
  
function bbloomer_validate_name_fields( $errors, $username, $email ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
        $errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
        $errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
    }
    return $errors;
}
  
///////////////////////////////
// 3. SAVE FIELDS
  
add_action( 'woocommerce_created_customer', 'bbloomer_save_name_fields' );
  
function bbloomer_save_name_fields( $customer_id ) {
    if ( isset( $_POST['billing_first_name'] ) ) {
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
        update_user_meta( $customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']) );
    }
    if ( isset( $_POST['billing_last_name'] ) ) {
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
        update_user_meta( $customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']) );
    }
  
}































//phones


// Add billing phone number field to WooCommerce registration form
add_action('woocommerce_register_form', 'add_billing_phone_field_to_registration_form');
function add_billing_phone_field_to_registration_form() {
    ?>
    <p class="form-row form-row-wide">
        <label for="reg_billing_phone"><?php _e('Billing phone', 'woocommerce'); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php if (!empty($_POST['billing_phone'])) echo esc_attr($_POST['billing_phone']); ?>" />
    </p>
    <?php
}

// Validate billing phone number during registration
/*add_filter('woocommerce_registration_errors', 'validate_billing_phone_field_on_registration', 10, 3);
function validate_billing_phone_field_on_registration($errors, $username, $email) {
    if (empty($_POST['billing_phone'])) {
        $errors->add('billing_phone_error', __('Billing phone number is required!', 'woocommerce'));
    } elseif (!preg_match('/^[0-9]{10,15}$/', $_POST['billing_phone'])) {
        $errors->add('billing_phone_error', __('Please enter a valid billing phone number (10-15 digits).', 'woocommerce'));
    }
    return $errors;
}*/

// Save billing phone number during registration
add_action('woocommerce_created_customer', 'save_billing_phone_field_on_registration');
function save_billing_phone_field_on_registration($customer_id) {
    if (isset($_POST['billing_phone'])) {
        update_user_meta($customer_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']));
    }
}
// Display billing phone number in the user's WooCommerce account details
add_action('woocommerce_edit_account_form', 'display_billing_phone_field_in_account_details');
function display_billing_phone_field_in_account_details() {
    $user_id = get_current_user_id();
    $billing_phone = get_user_meta($user_id, 'billing_phone', true);
    ?>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="account_billing_phone"><?php _e('Billing Phone', 'woocommerce'); ?></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_phone" id="account_billing_phone" value="<?php echo esc_attr($billing_phone); ?>" />
    </p>
    <?php
}

// Save billing phone number in the user's WooCommerce account details
add_action('woocommerce_save_account_details', 'save_billing_phone_field_in_account_details');
function save_billing_phone_field_in_account_details($user_id) {
    if (isset($_POST['billing_phone'])) {
        update_user_meta($user_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']));
    }
}

// Display billing phone number in the user admin profile (WordPress admin)
add_action('show_user_profile', 'display_billing_phone_field_in_admin_user_profile');
add_action('edit_user_profile', 'display_billing_phone_field_in_admin_user_profile');
function display_billing_phone_field_in_admin_user_profile($user) {
    ?>
    <h3><?php _e('Billing Information', 'woocommerce'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="billing_phone"><?php _e('Billing Phone', 'woocommerce'); ?></label></th>
            <td>
                <input type="text" name="billing_phone" id="billing_phone" value="<?php echo esc_attr(get_user_meta($user->ID, 'billing_phone', true)); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Please enter your billing phone number.', 'woocommerce'); ?></span>
            </td>
        </tr>
    </table>
    <?php
}

// Save billing phone number in the user admin profile (WordPress admin)
add_action('personal_options_update', 'save_billing_phone_field_in_admin_user_profile');
add_action('edit_user_profile_update', 'save_billing_phone_field_in_admin_user_profile');
function save_billing_phone_field_in_admin_user_profile($user_id) {
    if (current_user_can('edit_user', $user_id)) {
        if (isset($_POST['billing_phone'])) {
            update_user_meta($user_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']));
        }
    }
}

















// users table

// Add custom column to Users table for billing phone
add_filter('manage_users_columns', 'add_billing_phone_column_to_users_table');
function add_billing_phone_column_to_users_table($columns) {
    $columns['billing_phone'] = __('Billing Phone', 'woocommerce');
    return $columns;
}

// Populate the custom column with user data for billing phone
add_action('manage_users_custom_column', 'populate_billing_phone_column_in_users_table', 10, 3);
function populate_billing_phone_column_in_users_table($output, $column_name, $user_id) {
    if ($column_name == 'billing_phone') {
        $billing_phone = get_user_meta($user_id, 'billing_phone', true);
        return esc_html($billing_phone);
    }
    return $output;
}

// Make the custom column sortable for billing phone
add_filter('manage_users_sortable_columns', 'make_billing_phone_column_sortable');
function make_billing_phone_column_sortable($columns) {
    $columns['billing_phone'] = 'billing_phone';
    return $columns;
}

// Handle the sorting for the custom column for billing phone
add_action('pre_get_users', 'sort_users_by_billing_phone_column');
function sort_users_by_billing_phone_column($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    // Check if we are sorting by billing phone column
    if ('billing_phone' === $query->get('orderby')) {
        $query->set('meta_key', 'billing_phone');
        $query->set('orderby', 'meta_value');
    }
}



?>












<?php

// Add Billing Phone column to the WooCommerce Customers table
add_filter('woocommerce_admin_report_columns', 'add_billing_phone_to_customers_table');
add_action('woocommerce_admin_customers_report_column_billing_phone', 'populate_billing_phone_column');

// Define the new column
function add_billing_phone_to_customers_table($columns) {
    $new_columns = array();
    foreach ($columns as $column_key => $column_title) {
        $new_columns[$column_key] = $column_title;
        if ('date_registered' === $column_key) {
            // Insert the new column after 'date_registered'
            $new_columns['billing_phone'] = __('Billing Phone', 'woocommerce');
        }
    }
    return $new_columns;
}

// Populate the new column with data
function populate_billing_phone_column($customer) {
    $user_id = $customer->get_user_id();
    $billing_phone = get_user_meta($user_id, 'billing_phone', true);
    echo $billing_phone ? esc_html($billing_phone) : __('No phone available', 'woocommerce');
}


?>