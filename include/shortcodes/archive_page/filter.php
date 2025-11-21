<div style="cursor: pointer ; margin : 20px 0 ; display : flex ; gap : 10px" onclick="sidenav22('filter')">
فلترة<img src="<?php bloginfo('template_url') ?>/assets/svgs/plus.svg" alt="true">
</div>

<style>
.switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 28px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: .4s;
    border-radius: 34px;
}

.slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
}

input:checked + .slider {
    background-color: #000;
}

input:checked + .slider:before {
    transform: translateX(22px);
}

.new {display : none !important}
</style>

    <label class="switch" style="display:none">
        <input type="checkbox" id="engravingSwitch">
        <span class="slider round"></span>
    </label>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>

document.getElementById('engravingSwitch').addEventListener('change', function() {

            var elements = document.querySelectorAll('.attribute-engraving');
            elements.forEach(function(element) {
                if (document.getElementById('engravingSwitch').checked) {
                    element.classList.add('new');
                } else {
                    element.classList.remove('new');
                }
            });



$(document).ready(function() {
    let itemsPerPage = 20; // Number of items to display per page
    let allItems = $('.content .item').not('.new');
    let totalItems = allItems.length;
    let totalPages = Math.ceil(totalItems / itemsPerPage);
    let currentPage = 0;

    // Function to generate page numbers
    function generatePageNumbers() {
        $('.pagination').empty(); // Clear existing pagination
        for (let i = 0; i < totalPages; i++) {
            let pageNumber = $('<a href="#">' + (i + 1) + '</a>');
            pageNumber.click(function(e) {
                e.preventDefault();
                currentPage = i;
                showPage(currentPage);
				window.location.href = "#startpro";
            });
            $('.pagination').append(pageNumber);
        }
        highlightCurrentPage(currentPage);
    }

    // Function to show items for a specific page
    function showPage(page) {
        $('.content .item').hide(); // Hide all items
        let start = page * itemsPerPage;
        let end = start + itemsPerPage;
        allItems.slice(start, end).show(); // Show relevant items
        highlightCurrentPage(page);
    }

    // Function to highlight the current page number
    function highlightCurrentPage(page) {
        $('.pagination a').removeClass('active');
        $('.pagination a').eq(page).addClass('active');
    }

    // Generate initial page numbers and show the first page
    generatePageNumbers();
    showPage(currentPage);
});



        });


</script>


<div>
<div  class="relative sortt" style="cursor: pointer ; margin : 20px 0   ; display : flex ; gap : 10px">
ترتيب<img src="<?php bloginfo('template_url') ?>/assets/svgs/plus.svg" alt="true">
</div>
<div class="sortingmenu" style="display : none ; position : absolute ; left : 0 ; transform : translateX(20px) ; z-index : 10"><?php echo do_shortcode('[sorting]') ; ?></div>
</div>



<script>

$(function(){

$('.sortt').on('click', function(){$('.sortingmenu').toggle();})

})

</script>
