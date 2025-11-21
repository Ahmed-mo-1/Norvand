<?php

function wp_maintenance_mode() {
    if ( !current_user_can( 'edit_themes' ) || !is_user_logged_in() ) {
        wp_die('        <!doctype html>
<head>
<meta name="viewport" content="width=device-width, initial-scale = 1">
<meta charset="utf-8">
<title>Norvand</title>
<style>
    *{padding : 0 ; margin : 0 ; box-sizing : border-box ; font-family : cairo}
    body {padding : 20px 0 ; text-align : center ; height : 96vh ; width : 100% ; flex-direction : column}
    .container { width : 90% ; text-align : center; margin : auto}
    a {background : black ; color : white ; padding : 10px 20px ; text-decoration : none}
</style>
</head>
<body>
    <br><br>
<div class="container">
عملائنا الأعزاء نعتذر، فريق نورڨاند يقوم بإنشاء وصيانة الموقع الإلكتروني لذلك لم يتوفر بعد.
<br>
<h2>
للاستفسار أو إنشاء الطلب، نسعد بتقديم خدماتنا عبر الواتس أب
</h2>
<br>
<a href="https://wa.me/96596974874" >
    واتس اب
</a>
<br><br>
شكرا لتعاونكم
</div>

<br><br>
<div class="container">
Dear Customers,  We apologize that the Norvand team is currently constructing and maintaining the website, therefore it is not available yet.

<h2>
For inquiries or to create an order, we are happy to provide our service via WhatsApp
</h2>
<br>
<a href="https://wa.me/96596974874" >
    whatsapp
    </a>
<br><br>

Thank you for your patience and understanding
</div>
<br><br>
</body>
</html>');
    }
}
//add_action('get_header', 'wp_maintenance_mode');



?>