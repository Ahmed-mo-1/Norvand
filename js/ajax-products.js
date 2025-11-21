jQuery(document).ready(function($) {
    var page = 1;

    $('#load-more-products').on('click', function(e) {
        e.preventDefault();
        page++;

        $.ajax({
            url: ajax_url, // This is provided by the localize script
            type: 'POST',
            data: {
                action: 'update_products',
                page: page
            },
            success: function(response) {
                if(response.html) {
                    $('#product-container').append(response.html);
                }
            }
        });
    });
});
