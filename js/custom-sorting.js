jQuery(document).ready(function($) {
    // Function to sort products by date
    function sortProductsByDate() {
        var $products = $('.product-catalog .product');
        $products.sort(function(a, b) {
            var dateA = $(a).data('date');
            var dateB = $(b).data('date');
            return (new Date(dateA) < new Date(dateB)) ? 1 : -1; // Change to -1 : 1 for ascending order
        });

        // Append sorted products back to the container
        $products.detach().appendTo('.product-catalog');

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

    }

    // Function to sort products by price
    function sortProductsByPrice() {
        var $products = $('.product-catalog .product');
        $products.sort(function(a, b) {
            var priceA = parseFloat($(a).data('price'));
            var priceB = parseFloat($(b).data('price'));

            // Handle cases where price might be NaN or missing
            if (isNaN(priceA)) priceA = Number.MAX_VALUE;
            if (isNaN(priceB)) priceB = Number.MAX_VALUE;

            return (priceA < priceB) ? 1 : -1; // Change to -1 : 1 for descending order
        });

        // Append sorted products back to the container
        $products.detach().appendTo('.product-catalog');

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
    }

    // Add click event to the sort by date button
    $('#sort-by-date').on('click', function() {
        sortProductsByDate();
    });

    // Add click event to the sort by price button
    $('#sort-by-price').on('click', function() {
        sortProductsByPrice();
    });
});
