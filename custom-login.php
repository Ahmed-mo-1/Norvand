<?php
// Handle login submission
if ( isset($_POST['custom_login_nonce']) && wp_verify_nonce($_POST['custom_login_nonce'], 'custom_login_action') ) {
    $creds = array(
        'user_login'    => $_POST['log'],
        'user_password' => $_POST['pwd'],
        'remember'      => isset($_POST['rememberme'])
    );
    $user = wp_signon( $creds, false );
    if ( is_wp_error($user) ) {
        $error = $user->get_error_message();
    } else {
        wp_redirect(admin_url());
        exit;
    }
}

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<title>Login</title>
<style>
*{
	padding: 0;
	margin: 0;
	box-sizing: border-box
}

body {
	display: flex;
	width: 100%;
	height: 100dvh
}

.design-container {
	width: 75%;
	background: url("<?php echo get_stylesheet_directory_uri(); ?>/imgs/1.jpg") center/cover;
}

.login-container {
	width: 25%;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	gap: 10px
}

.login-container form {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	gap: 10px;
	width: clamp(70%, 200px, 90%);
	max-width: 300px
}

input {
	width: 100%;
	font-size: 16px;
	padding: 12px 16px;
	border-radius: 20px;
	border: 1px solid #ccc;
	transition: 0.2s
}

input:focus {
	outline: 1px solid #3858e9;
	border: none
}

input[type= "submit"] {
	width: 100%;
	font-size: 16px;
	padding: 12px 16px;
	border-radius: 20px;
	border: none;
	background: #3858e9;
	color: white
}

input[type= "submit"]:hover {
	width: 100%;
	font-size: 16px;
	padding: 12px 16px;
	border-radius: 20px;
	border: none;
	background: #1838c9;
	color: white
}

input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus {
    -webkit-box-shadow: 0 0 0 1000px white inset !important;
    box-shadow: 0 0 0 1000px white inset !important;
    -webkit-text-fill-color: #000 !important;
    transition: background-color 9999s ease-in-out 0s; /* Prevent flash */
}


@media(max-width: 1000px) {

	body {
		display: flex;
		width: 100%;
		height: 100dvh
	}

	.design-container {
		display: none
	}

	.login-container {
		width: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		gap: 10px
	}

}

</style>
</head>
<body>
<div class="design-container">

</div>

<div class="login-container">
    <div style="width: 100px; aspect-ratio: 1" ><img style="width: 100%" src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/1.webp" alt="Logo"></div>
    
    <?php if(!empty($error)) echo '<div class="error">'.$error.'</div>'; ?>

    <form method="post">
        <input type="text" name="log" placeholder="Username" required>
        <input type="password" name="pwd" placeholder="Password" required>
        <!--<label><input type="checkbox" name="rememberme"> Remember Me</label>-->
        <?php wp_nonce_field('custom_login_action','custom_login_nonce'); ?>
        <input type="submit" class="button-primary" value="Log In">
    </form>

    <!--<p><a href="<?php //echo wp_lostpassword_url(); ?>">Forgot Password?</a></p>-->
</div>
</body>
</html>
