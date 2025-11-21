<!doctype html>
<html <?php language_attributes() ?>>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
<meta charset="<?php echo bloginfo ('charset') ?>" />
<meta name="description" content="this is Seo Meta Description">
<meta name="robots" content="index, follow">
<title><?php echo bloginfo('title') ?></title>
<?php wp_head(); ?>
<style>
*{direction : <?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en') ? 'ltr' : 'rtl'; ?>}
.swiper-button-next, .swiper-rtl .swiper-button-prev {transform : <?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en') ? 'scale(1)' : 'scale(-1)'; ?> !important}
.swiper-button-prev, .swiper-rtl .swiper-button-next {transform : <?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en') ? 'scale(1)' : 'scale(-1)'; ?> !important}
}
.swiper-button-next, .swiper-rtl .swiper-button-prev {
    left: <?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en') ? '40px' : '0'; ?> !important;
    right: <?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en') ? '0' : '40px'; ?> !important;}
</style>
</head>

<body <?php body_class(); ?> >

<?php
include_once 'parts/header/0.sidemenu.php';
 include_once 'parts/header/1.urgency-bar.php';
include_once 'parts/header/2.header-start.php';
include_once 'parts/header/3.desktop-icons-group.php';
include_once 'parts/header/4.nav-start.php';
include_once 'parts/header/5.mobile-menu-header.php';
include_once 'parts/header/6.mainmenu-start.php';

include_once 'parts/header/mainmenu/megamenu1.php';
include_once 'parts/header/mainmenu/megamenu2.php';
include_once 'parts/header/mainmenu/megamenu3.php';
include_once 'parts/header/mainmenu/megamenu4.php';
include_once 'parts/header/mainmenu/megamenu5.php';
include_once 'parts/header/mainmenu/megamenu6.php';
include_once 'parts/header/mainmenu/megamenu7.php';
include_once 'parts/header/mainmenu/megamenu8.php';

include_once 'parts/header/7.mainmenu-end.php';
include_once 'parts/header/8.nav-end.php';
include_once 'parts/header/9.logo.php';
include_once 'parts/header/10.mobile-cart.php';
include_once 'parts/header/11.mobile-cart-menu.php';
include_once 'parts/header/12.mobile-search-menu.php';
include_once 'parts/header/13.header-end.php';
?>