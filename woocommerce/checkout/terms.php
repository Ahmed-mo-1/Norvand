<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<p class="form-row privacy-policy" style="border-top : 1px solid #cccccc ; padding : 10px 0 0 ">
    <input type="checkbox" class="input-checkbox" name="privacy_policy" id="privacy_policy" />
    <label for="privacy_policy" class="checkbox">
<?php echo __('اوافق على الشروط و الاحكام',''); ?> 
<a class="underline-button" href="<?php bloginfo('home')?>/info/#/terms" target="_blank">
<?php echo __('الشروط والاحكام',''); ?>
</a>
<span class="required">*</span></label>
</p>
<br>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('form.checkout').on('submit', function(e) {
            if ($('#privacy_policy').length && !$('#privacy_policy').is(':checked')) {
                alert('<?php echo __( 'يجب الموافقة علي الشروط والاحكام', '' ); ?>');
                e.preventDefault();
                return false;
            }
        });
    });
</script>