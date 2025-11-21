    <div class="pagination">

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--<script>$(document).ready(function() {
    let itemsPerPage = 20; // Number of items to display per page
    let totalItems = $('.content .item').length;
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
        $('.content .item').slice(page * itemsPerPage, (page + 1) * itemsPerPage).show(); // Show relevant items
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
</script>-->

<script>
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
</script>

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