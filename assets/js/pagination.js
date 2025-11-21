<div class="pagination"></div>

    <style>
        .pagination {
            display: flex;
			flex-wrap : wrap ;
            justify-content: center;
            margin: 30px 0 ;
        }
        .pagination button {
            margin: 0 5px;
            padding: 5px 10px;
            cursor: pointer;
        }
        .pagination a {
            margin: 0 5px;
            padding: 5px 10px;
            cursor: pointer;
            text-decoration: none;
            color: #cccccc;
        }
        .pagination a.active {
            font-weight: bold;
            color: black;
        }
    </style>
<!-- dynamic pagination -->

jQuery(document).ready(function($) {
    let itemsPerPage = 8;
    let totalItems = $('.content > .product').length;
    let totalPages = Math.ceil(totalItems / itemsPerPage);
    let currentPage = 0;

    function generatePageNumbers() {
        $('.pagination').empty(); 
        for (let i = 0; i < totalPages; i++) {
            let pageNumber = $('<a href="#">' + (i + 1) + '</a>');
            pageNumber.click(function(e) {
                e.preventDefault();
                currentPage = i;
                showPage(currentPage);
				window.location.href = "#header";
            });
            $('.pagination').append(pageNumber);
        }
        highlightCurrentPage(currentPage);
    }

    function showPage(page) {
        $('.content .product').hide(); 
        $('.content .product').slice(page * itemsPerPage, (page + 1) * itemsPerPage).show();
        highlightCurrentPage(page);
    }

    function highlightCurrentPage(page) {
        $('.pagination a').removeClass('active');
        $('.pagination a').eq(page).addClass('active');
    }

    generatePageNumbers();
    showPage(currentPage);
})