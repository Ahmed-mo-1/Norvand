jQuery(document).ready(function($) {
    $(document).on('click', '.upload_image_button', function(e) {
        e.preventDefault();
        var button = $(this);
        var custom_uploader = wp.media({
            title: 'Select Image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        }).on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            var item_id = button.data('item-id');
            $('#edit-menu-item-image-' + item_id).val(attachment.url);
            $('#menu-item-image-preview-' + item_id).attr('src', attachment.url).show();
        }).open();
    });
});
