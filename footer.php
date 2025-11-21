<?php include_once 'parts/footer/1.footer-start.php' ;?>
<?php include_once 'parts/footer/2.join-form.php' ;?>
<?php include_once 'parts/footer/3.menu-start.php' ;?>

<?php 
include_once get_theme_file_path('/parts/footer/menues/menu1.php') ;
include_once get_theme_file_path('/parts/footer/menues/menu2.php') ;
include_once get_theme_file_path('/parts/footer/menues/logo.php') ;
include_once get_theme_file_path('/parts/footer/menues/menu3.php') ;
include_once get_theme_file_path('/parts/footer/menues/menu4.php') ;
include_once get_theme_file_path('/parts/footer/menues/logo1.php') ;
?>

<?php include_once 'parts/footer/4.menu-end.php' ;?>
<?php include_once 'parts/footer/5.copyright.php' ;?>
<?php include_once 'parts/footer/6.footer-end.php' ;?>

<a href="https://wa.me/96596974874" target="_blank" aria-label="whatsapp chat">
<div style="width : 60px ; position : fixed ; bottom : 30px ; right : 30px ; z-index : 10">
<img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/chat.svg" alt="whatsapp chat">
</div>
</a>

</body>
</html>