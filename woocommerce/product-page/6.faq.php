<style>
    .faq-container {background : #f1eee4 ; padding : 30px 0 50px 0 ; margin : 20px 0 ; display : flex ; flex-direction : column ; width : 100% ; gap : 20px}
    .faq-container {padding : 20px}
    .faq-container div {width : 100%}
	@media(min-width : 991px){
    .faq-container { flex-direction : row ; padding : 30px 100px 50px 100px ; width : 100%}
	.faq-container .faq-content {display : flex ; align-items : center }
    .faq-container > div {width : 50%}
	}
</style>

<!-- faq-con > container -->
<div class="faq-container">

<!-- faq-title > content -->
<div class="faq-content">
<div>

<h2>
<?php echo __('الاسئلة',''); ?>
<span style="font-weight : 900">
<?php echo __('الشائعة',''); ?>
</span>
</h2>

<p>
<?php echo __('من الضمان حتي التوصبل تعرف علي اسئلتنا الاكثر شيوعاً',''); ?>
</p>

<a class="underline-button" href="<?php bloginfo('home') ; ?>/info">
<?php echo __('اعرف المزيد',''); ?>
</a>

</div>
</div>


<div>
<ul class="accordions">

<li>
<input type="radio" name="accordion" id="firstq" >
<label for="firstq">
<?php echo __('هل لون المنتج ثابت وعليه كفالة؟',''); ?>
</label>
<div class="content">
<p>
<?php echo __('نعم بكل تأكيد. نوفر لك ضمان شامل لمدة سنتين على كل قطعة نبيعها، مضمونًا الحماية ضد الصدأ أو التأكل. هدفنا هو ضمان تسوقك بكامل الثقة',''); ?>
</p>
<br><br>
</div>
</li>

<li>
<input type="radio" name="accordion" id="secondq" >
<label for="secondq">
<?php echo __('كم يحتاج التوصيل وقت ؟',''); ?>
</label>
<div class="content">
<p>
<?php echo __('تعتمد مدة التوصيل حسب كل منتج :',''); ?>
<br>
<?php echo __('يمكنك معرفة حالة كل منتج من خلال النظر إلى الخيار الموضح أسفل كل منتج:',''); ?>
<br><br>
<?php echo __('المتوفر:',''); ?>
<br>
<ul>
<li>
<?php echo __('نفس اليوم للطلب قبل الساعة 3 م: برسوم 2.99 د.ك (مجاناً للطلبات 40 د.ك أو أكثر).',''); ?>
</li><li>
<?php echo __('3-5 أيام عمل: برسوم 1 د.ك (مجاناً للطلبات 20 د.ك أو أكثر).',''); ?>
</li><li>
<?php echo __('أيام العمل من الخميس إلى الأحد.',''); ?>
</li>
</ul>
</p>
<br>
<!--<a href="<?php //bloginfo('home') ; ?>/info/#/return">-->
<a class="pointer" href="<?php bloginfo('home') ;?>/info/#/Delivery" aria-label="shipping">
<?php echo __('اعرف المزيد',''); ?>
</a>
<br><br>
</div>
</li>


<li>
<input type="radio" name="accordion" id="thirdq">
<label for="thirdq">
<?php echo __('تستخدمون الذهب الحقيقي ؟',''); ?>
</label>
<div class="content">
<p>
<?php echo __('نعم، نستخدم حصريًا الذهب الحقيقي في الطلاء على جميع قطع الذهبية. نستخدم الفولاذ المقاوم للصدأ الخالص، مما يتيح لك ارتداء مجوهراتك حول الماء والعرق دون القلق من التلاشي أو التأكل. تشترك قطع الذهب الوردي لدينا في القاعدة نفسها من الفولاذ المقاوم للصدأ الخالص، ومُغطاة بالذهب الحقيقي مع إضافة النحاس للحصول على لونها الوردي الجميل. بالمثل، تُصنع قطع الفضة لدينا من الفولاذ المقاوم للصدأ الخالص وتُصقل لتحقيق البريق المستمر. تُصنع قطع الرجال أيضًا من الفولاذ المقاوم للصدأ الخالص مع وعد بنفس المتانة ضد الماء والعرق',''); ?>
</p>

<br><br>
</div>
</li>


<li>
<input type="radio" name="accordion" id="forthq">
<label for="forthq">
<?php echo __('هل أقدر احفر على المنتج ؟',''); ?>
</label>
<div class="content">
<p>
<?php echo __('نحن سعداء بتقديم خدمة النقش و الحفر المجانية على بعض القطع المختارة، مع مجموعة من الخطوط والرموز التعبيرية. ابحث عن أيقونة صندوق النقش أسفل المنتجات المؤهلة للنقش. يُرجى الملاحظة أن القطع المنقوشة تستثنى من سياسة الإرجاع القياسية لدينا ما لم تكن معيبة، ولكنها تتمتع بالضمان الخاص بنا',''); ?>
</p>

<br><br>
</div>
</li>



<li>
<input type="radio" name="accordion" id="fifthq">
<label for="fifthq">
<?php echo __('ما هي سياسة الإرجاع الخاصة بكم؟',''); ?>
</label>
<div class="content">
<p>
<?php echo __('إذا قررت تغيير رأيك في غضون 14 يومًا من الشراء، فإننا نقدم لك استردادًا كاملاً يُحتسب على البطاقة الأصلية المستخدمة في عملية الشراء. يُرجى ملاحظة أن المنتجات المخصصة والمنقوشة قد لا تكون مؤهلة للإرجاع. لمزيد من التفاصيل حول سياسة الإرجاع الخاصة بنا',''); ?>
</p>

<br><br>
</div>
</li>

</ul>
</div>

</div>