<?php function reviews(){ ?>

<style>
.swiper11 {width : 100% ; overflow-x : hidden ; height : 500px ; display: flex; align-items: center; justify-content: center; padding : 40px 0 }
.swiper11 .swiper-slide {filter : grayscale(50%) ; transition : 0.2s ; padding : 20px ; border-radius : 10px}
.swiper11 .swiper-slide p {font-size : 12px ; text-align : justify ; color : black}
.swiper11 .swiper-slide { display : flex ; align-items : center ; justify-content : center ; flex-direction : column  ; opacity : 1 ; scale : 0.9}
.swiper11 .imgcontainer {width: 60px; border-radius: 50%; overflow: hidden; height: 60px;}
.swiper11 .swiper-slide-active {scale : 1.1 ; filter : grayscale(0) ; margin : 0px !important ; border: 1px solid #cccccc ; opacity : 1}
</style>

<div class="container" style="background : var(--main-color)">
<div class="" style="font-size : 24px ; text-align : center">شلون 
<span style="font-weight : 600 ;">
تجربة عملاء 
</span>
نورفاند ؟
</div>

<div class="swiper11">
<div class="swiper-wrapper" role="list">

<div class="swiper-slide" >
<div class="imgcontainer"><img width="150" height="150" src="<?php bloginfo('template_url'); ?>/assets/reviews/1.webp" alt="insta2" loading="lazy"></div>
<div><h2>mena_a_ali</h2></div>
<div><p>
من اول ما وصلتلي الطلبيه ما شلت السواره من ايدي ما شاء الله الكواليتي واااايد حلووو و نظيف و عجبني و بصراحه التعامل معاهم وايد راقي و ذوق و ان شاء الله مو اخر مره اتعامل معاهم 🙏🏻💙
</p></div>
</div>

<div class="swiper-slide" >
<div class="imgcontainer"><img width="150" height="150" src="<?php bloginfo('template_url'); ?>/assets/reviews/2.webp" alt="insta2" loading="lazy"></div>
<div><h2>fhd_s_d</h2></div>
<div><p>
بصراحه انقذتوني ❤️ قدمتها هديه وصارت من اروع الهدايا 🔥 البكج لوحده يفتح النفس  باذنا لمناسبه القادمه بعد منكم لتنوع منتجاتكم وجودتها الرفيعة شكرا لكم 👏❤️❤️
</p></div>
</div>

<div class="swiper-slide" >
<div class="imgcontainer"><img width="150" height="150" src="<?php bloginfo('template_url'); ?>/assets/reviews/3.webp" alt="insta2" loading="lazy"></div>
<div><h2>zhn.97</h2></div>
<div><p>
تجربة حلوة وشغلهم رائع صراحة ما توقعت يكون مثل الصور بالضبط حتى الكوالتي وطريقة الحفر هم رائعة... وطريقة التغليف وايد كشخة يعني ماله داعي تشيلين هم اذا بتاخذين هدية 😍😍😍😍
</p></div>
</div>

<div class="swiper-slide" >
<div class="imgcontainer"><img width="150" height="150" src="<?php bloginfo('template_url'); ?>/assets/reviews/4.webp" alt="insta2" loading="lazy"></div>
<div><h2>kaldferi</h2></div>
<div><p>
والله عن نفسي تعاملت معاكم مرتين وكل شي يكون حلو ويبيض الوجهه
</p></div>
</div>

<div class="swiper-slide" >
<div class="imgcontainer"><img width="150" height="150" src="<?php bloginfo('template_url'); ?>/assets/reviews/5.webp" alt="insta2" loading="lazy"></div>
<div><h2>ramajlilaty</h2></div>
<div><p>
اتعاملت معكم تلات مرات وولا مرة ندمت ♥️ ماشاء الله شغلكم مرتب ومواعيدكم مزبوطة وخدمة العملاء راقيين جدا في التعامل ♥️ كل التوفيق 👏🏻
</p></div>
</div>

<div class="swiper-slide" >
<div class="imgcontainer"><img width="150" height="150" src="<?php bloginfo('template_url'); ?>/assets/reviews/6.webp" alt="insta2" loading="lazy"></div>
<div><h2>reem_al3neziii</h2></div>
<div><p>
والله بدون مجامله طلبت منه ثلاث مرات يجنن 🥺🖤🖤🖤🖤🖤🖤🖤
</p></div>
</div>

<div class="swiper-slide" >
<div class="imgcontainer"><img width="150" height="150" src="<?php bloginfo('template_url'); ?>/assets/reviews/7.webp" alt="insta2" loading="lazy"></div>
<div><h2>zazug</h2></div>
<div><p>
شكرا اكتير على اهتمامكم هاي تاني مره اطلب منكم .. و مرتين اكتير شغل مرتب و بالوقت وسهل الطلب .. يعيطكم الف عافيه ❤️❤️
</p></div>
</div>



</div>
</div>

<a target="_blank" href="https://www.instagram.com/p/CjafHXIIm1V/?utm_source=ig_web_copy_link" class="button" style="width: 250px !important;
    margin: 0 auto;
    color: black !important;
    background: none !important;
    border: 1px solid black !important;">
اكتشف اكثر
</a>
</div>

<?php } 
add_shortcode('reviews' , 'reviews');
?>