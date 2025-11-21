<?php
function custom_footer_form() {
    ?>
    <div id="custom-footer-form">
        <form id="footer-client-form" method="post" action="">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>
            
            <input type="submit" name="submit_client_data" value="Submit">
        </form>
    </div>
    <?php
}
//add_action('wp_footer', 'custom_footer_form');






function handle_footer_form_submission() {
    global $wpdb;
    $message = '';

    if (isset($_POST['submit_client_data'])) {
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $table_name = $wpdb->prefix . 'client_data';

        // Ensure table exists
        if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
            $charset_collate = $wpdb->get_charset_collate();
            $sql = "CREATE TABLE $table_name (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                email varchar(255) NOT NULL,
                phone varchar(15) NOT NULL,
                PRIMARY KEY  (id),
                UNIQUE KEY email (email)
            ) $charset_collate;";
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }

        // Check if email already exists
        $existing_email = $wpdb->get_var($wpdb->prepare("SELECT email FROM $table_name WHERE email = %s", $email));
        if ($existing_email) {
            $message = 'انت مُسجل بالفعل';
        } else {
            // Insert data into the table
            $wpdb->insert($table_name, [
                'email' => $email,
                'phone' => $phone
            ]);
            $message = 'شكراً لانضمامك لعائلة نورڤاند';
        }
    } elseif (isset($_POST['delete_client_data'])) {
        $id = intval($_POST['client_id']);
        $table_name = $wpdb->prefix . 'client_data';

        // Delete data from the table
        $wpdb->delete($table_name, ['id' => $id]);
        $message = 'Client data deleted successfully!';
    } elseif (isset($_POST['update_client_data'])) {
        $id = intval($_POST['client_id']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $table_name = $wpdb->prefix . 'client_data';

        // Check if email already exists for another ID
        $existing_email = $wpdb->get_var($wpdb->prepare("SELECT email FROM $table_name WHERE email = %s AND id != %d", $email, $id));
        if ($existing_email) {
            $message = 'This email is already registered to another client!';
        } else {
            // Update data in the table
            $wpdb->update(
                $table_name,
                ['email' => $email, 'phone' => $phone],
                ['id' => $id]
            );
            $message = 'Client data updated successfully!';
        }
    }

    // Store the message in the session
    if (!session_id()) {
        session_start();
    }
    $_SESSION['form_submission_message'] = $message;
}
add_action('init', 'handle_footer_form_submission');

function display_footer_form_message() {
    if (!session_id()) {
        session_start();
    }

    if (!empty($_SESSION['form_submission_message'])) {
        echo '
<div id="subcon">
<div class="subconbg"></div>
<div class="footer-form-message">
'. esc_html($_SESSION['form_submission_message']) .'
<br><br>
<div id="hidenow">
اكمل التسوق
</div>
</div>
</div>
<script>
let hidebttn = document.getElementById("hidenow");

hidebttn.onclick = function(){
document.getElementById("subcon").style.display="none";
}

</script>';
        unset($_SESSION['form_submission_message']); // Clear the message after displaying
    }
}
add_action('wp_footer', 'display_footer_form_message');

function register_client_data_menu_page() {
    add_menu_page(
        'Clients Data',
        'Clients Data',
        'manage_options',
        'client-data',
        'display_client_data_page',
        'dashicons-admin-users',
        20
    );
}
add_action('admin_menu', 'register_client_data_menu_page');

function display_client_data_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'client_data';
    $client_data = $wpdb->get_results("SELECT * FROM $table_name");

    if (isset($_POST['download_excel'])) {
        download_excel($client_data);
    }

    if (isset($_GET['edit_id'])) {
        $edit_id = intval($_GET['edit_id']);
        $client_to_edit = $wpdb->get_row("SELECT * FROM $table_name WHERE id = $edit_id");
    }

    ?>
    <div class="wrap">
        <h1>Clients Data</h1>
        <!--<form method="post" action="">
            <input type="submit" name="download_excel" class="button button-primary" value="Download as Excel">
        </form>-->

        <?php if (isset($client_to_edit)): ?>
            <h2>Edit Client</h2>
            <form method="post" action="">
                <input type="hidden" name="client_id" value="<?php echo esc_attr($client_to_edit->id); ?>">
                <table class="form-table">
                    <tr>
                        <th><label for="email">Email</label></th>
                        <td><input name="email" type="email" id="email" value="<?php echo esc_attr($client_to_edit->email); ?>" class="regular-text"></td>
                    </tr>
                    <tr>
                        <th><label for="phone">Phone</label></th>
                        <td><input name="phone" type="text" id="phone" value="<?php echo esc_attr($client_to_edit->phone); ?>" class="regular-text"></td>
                    </tr>
                </table>
                <p class="submit">
                    <input type="submit" name="update_client_data" id="submit" class="button button-primary" value="Update Client">
                </p>
            </form>
        <?php endif; ?>


        <table class="widefat fixed" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($client_data as $client) : ?>
                    <tr>
                        <td><?php echo esc_html($client->id); ?></td>
                        <td><?php echo esc_html($client->email); ?></td>
                        <td><?php echo esc_html($client->phone); ?></td>
                        <td>
                            <form method="post" action="" style="display:inline;">
                                <input type="hidden" name="client_id" value="<?php echo esc_attr($client->id); ?>">
                                <input type="submit" name="delete_client_data" class="button button-secondary" value="Delete">
                            </form>
                            <a href="?page=client-data&edit_id=<?php echo esc_attr($client->id); ?>" class="button button-primary">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
}

function download_excel($client_data) {
    if (!class_exists('PHPExcel')) {
        require_once ABSPATH . 'wp-content/plugins/phpexcel/Classes/PHPExcel.php';
    }

    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);
    $sheet = $objPHPExcel->getActiveSheet();

    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Email');
    $sheet->setCellValue('C1', 'Phone');

    $row = 2;
    foreach ($client_data as $client) {
        $sheet->setCellValue("A$row", $client->id);
        $sheet->setCellValue("B$row", $client->email);
        $sheet->setCellValue("C$row", $client->phone);
        $row++;
    }

    $filename = 'client_data.xlsx';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0');

    $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $writer->save('php://output');
    exit();
}
?>
