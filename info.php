<?php
/* Template Name: info */
get_header();
?>

<!doctype html>
<html lang="en" data-critters-container>
<head>
<meta charset="utf-8">
<title>support</title>
<base href=".">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
*{
font-family:tajawal;
direction:rtl;
padding:0;
margin:0;
box-sizing:border-box
}
</style>
</head>

<body>
<app-root></app-root>

<?php
include_once get_theme_file_path('./assets/info/polyfills.php');
include_once get_theme_file_path('./assets/info/main.php');
include_once get_theme_file_path('./assets/info/styles.php');
?>

</body>
</html>
<?php get_footer(); ?>