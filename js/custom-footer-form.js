jQuery(document).ready(function($) {
    $('#footer-client-form').on('submit', function(e) {
        e.preventDefault();
        
        var formData = {
            action: 'handle_footer_form_submission',
            email: $('#email').val(),
            phone: $('#phone').val()
        };

        $.post(ajax_object.ajax_url, formData, function(response) {
            alert('Data submitted successfully!');
        }).fail(function() {
            alert('An error occurred. Please try again.');
        });
    });
});
