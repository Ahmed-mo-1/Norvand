
        document.getElementById('custom-font').addEventListener('change', function() {
            document.getElementById('custom-text-div').style.fontFamily = this.value;
        });

        document.querySelectorAll('.selectable-image').forEach(function(img) {
            img.addEventListener('click', function() {
                var customTextDiv = document.getElementById('custom-text-div');
                var newImg = document.createElement('img');
                newImg.src = this.src;
                newImg.alt = this.alt;
                newImg.className = 'inserted-image';

                var selection = window.getSelection();
                if (selection.rangeCount > 0) {
                    var range = selection.getRangeAt(0);
                    range.deleteContents();
                    range.insertNode(newImg);
                    range.insertNode(document.createTextNode(' ')); // Add space after image
                }
            });
        });

        document.querySelector('form.cart').addEventListener('submit', function() {
            var customText = document.getElementById('custom-text-div').innerHTML;
            document.getElementById('custom-text-meta').value = customText;
        });