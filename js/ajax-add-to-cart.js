jQuery(function($) {
    $('form.cart').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);

        $.ajax({
            url: ajax_add_to_cart.ajax_url,
            type: 'POST',
            data: form.serialize() + '&action=woocommerce_ajax_add_to_cart',
            success: function(response) {
                if (response.error) {
                    alert(response.error);
                } else {
                    $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, form]);
                }
            }
        });
    });
});
