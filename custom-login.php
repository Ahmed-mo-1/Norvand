<?php
/**
 * Custom Login Page Template
 * This file handles the display and submission logic for the custom login screen.
 */

// Initialize error variable to prevent notices if not set
$error = '';

// Handle login submission
if ( isset($_POST['custom_login_nonce']) && wp_verify_nonce($_POST['custom_login_nonce'], 'custom_login_action') ) {

    $creds = array(
        // Sanitize login field (required by wp_signon)
        'user_login'    => sanitize_user($_POST['log']),
        'user_password' => $_POST['pwd'],
        'remember'      => isset($_POST['rememberme']),
    );

    // Attempt to sign the user on
    $user = wp_signon($creds, false);

    if (is_wp_error($user)) {
        // Capture the error message for display
        $error = $user->get_error_message();
    } else {
        // Successful login: wp_signon sets cookies, now redirect to the admin dashboard
        wp_safe_redirect(admin_url());
        exit;
    }
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | <?php bloginfo('name'); ?></title>
<style>
/* Load Inter Font from Google Fonts for a clean, modern look */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Inter', sans-serif; /* Apply Inter font globally */
}

body {
    display: flex;
    width: 100%;
    height: 100dvh;
    overflow: hidden; /* Prevent body scroll */
    background-color: #f7f7f7;
}

/* The 75% image container on desktop */
.design-container {
    width: 75%;
    background: url("<?php echo get_stylesheet_directory_uri(); ?>/imgs/1.jpg") center/cover;
    transition: width 0.3s ease;
}

/* The 25% login form container on desktop */
.login-container {
    width: 25%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 20px;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: -5px 0 15px rgba(0, 0, 0, 0.05);
}

.login-container h1 {
    font-size: 24px;
    font-weight: 700;
    color: #333;
    margin-bottom: 5px;
}

.login-container p {
    font-size: 14px;
    color: #666;
}

.login-container form {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 15px;
    width: 100%;
    max-width: 300px;
}

/* Input styles */
input {
    width: 100%;
    font-size: 16px;
    padding: 12px 18px;
    border-radius: 10px; /* Slightly larger radius for softer look */
    border: 1px solid #e0e0e0;
    transition: border-color 0.2s, box-shadow 0.2s;
}

input:focus {
    outline: none;
    border-color: #3858e9;
    box-shadow: 0 0 0 3px rgba(56, 88, 233, 0.15); /* Soft focus ring */
}

/* Submit button styles */
input[type= "submit"] {
    cursor: pointer;
    font-size: 16px;
    font-weight: 600;
    padding: 12px 16px;
    border-radius: 10px;
    border: none;
    background: #3858e9;
    color: white;
    box-shadow: 0 4px 10px rgba(56, 88, 233, 0.4);
    transition: background 0.2s ease, box-shadow 0.2s ease, transform 0.1s;
}

input[type= "submit"]:hover {
    background: #1838c9;
    box-shadow: 0 6px 15px rgba(56, 88, 233, 0.6);
    transform: translateY(-1px);
}

/* Custom styling for error messages */
.error {
    width: 100%;
    max-width: 300px;
    padding: 12px 18px;
    border-radius: 8px;
    background-color: #ffe0e0;
    border: 1px solid #ff9999;
    color: #cc0000;
    font-size: 14px;
    text-align: center;
    margin-bottom: 10px;
}

/* Fix for browser autofill background */
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus {
    -webkit-box-shadow: 0 0 0 1000px white inset !important;
    box-shadow: 0 0 0 1000px white inset !important;
    -webkit-text-fill-color: #000 !important;
    transition: background-color 9999s ease-in-out 0s;
}


/* Responsive Layout for Mobile */
@media(max-width: 1000px) {
    body {
        /* Allow scroll in case content overflows on small screens */
        overflow-y: auto;
    }

    .design-container {
        display: none; /* Hide the large image container on mobile */
    }

    .login-container {
        width: 100%; /* Take full width on mobile */
        box-shadow: none; /* Remove shadow */
    }
}
</style>
</head>

<body>
<div class="design-container"></div>

<div class="login-container">

    <div style="width: 80px; aspect-ratio: 1; margin-bottom: 10px;">
        <!-- Use a fallback placeholder image path if needed, or ensure the webp exists -->
        <img style="width: 100%; height: auto; object-fit: contain;"
             src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/1.webp"
             onerror="this.onerror=null;this.src='https://placehold.co/80x80/3858e9/ffffff?text=LOGO';"
             alt="Logo">
    </div>

    <h1>Welcome Back</h1>
    <p>Sign in to access your dashboard.</p>

    <?php if (!empty($error)) : ?>
        <div class="error"><?php echo esc_html($error); ?></div>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="log" placeholder="Username" required autocomplete="username">
        <input type="password" name="pwd" placeholder="Password" required autocomplete="current-password">
        
        <!-- Add a Remember Me checkbox for accessibility and better user experience -->
        <label style="align-self: flex-start; font-size: 14px; display: flex; align-items: center;">
            <input type="checkbox" name="rememberme" id="rememberme" value="forever" style="width: auto; margin-right: 8px; border-radius: 3px; padding: 0;">
            Remember Me
        </label>

        <?php wp_nonce_field('custom_login_action', 'custom_login_nonce'); ?>

        <input type="submit" value="Log In">
        
        <!-- Add a link to the lost password screen -->
        <a href="<?php echo wp_lostpassword_url(); ?>" style="font-size: 13px; color: #3858e9; text-decoration: none; margin-top: 10px;">
            Forgot Password?
        </a>
    </form>

</div>
</body>
</html>