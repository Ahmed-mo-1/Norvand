jQuery(function($){
    // Replace select dropdown with color swatches
    $('.variations_form').each(function(){
        var $form = $(this),
            $select = $form.find('select'),
            $swatchesContainer = $('<div class="color-swatches"></div>');
        
        // Loop through select dropdown options
        $select.find('option').each(function(){
            var value = $(this).val(),
                text = $(this).text(),
                color = $(this).data('attribute-pa_color');
            if (value) {
                // Create color swatch
                var $swatch = $('<div class="swatch"></div>').attr('title', text).css('background-color', color).data('value', value);
                $swatchesContainer.append($swatch);
            }
        });

        // Replace select dropdown with color swatches
        $select.hide().after($swatchesContainer);
        $swatchesContainer.on('click', '.swatch', function(){
            var value = $(this).data('value');
            $select.val(value).change();
        });
    });
});
