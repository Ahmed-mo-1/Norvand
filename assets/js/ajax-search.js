jQuery(document).ready(function($) {
$('#search-input').on('input', function() {

var query = $(this).val();

if (query.length > 0) {

$.ajax({
url: ajax_search_params.ajax_url,
type: 'POST',
data: { action: 'ajax_search', query: query },
success: function(data) { $('#search-suggestions').html(data); }
});

} 

else { $('#search-suggestions').empty(); }

});
});
