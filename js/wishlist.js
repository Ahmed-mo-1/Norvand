jQuery(document).ready(function($) {
    $('.add-to-wishlist').on('click', function(e) {
        e.preventDefault();

        var button = $(this);
        var product_id = button.data('product-id');

        $.ajax({
            url: wishlistAjax.ajax_url,
            type: 'POST',
            data: {
                action: 'add_to_wishlist',
                product_id: product_id
            },
            success: function(response) {
                if (response.success) {
                    alert(response.data.message);
                } else {
                    alert(response.data.message);
                }
            }
        });
    });
});
