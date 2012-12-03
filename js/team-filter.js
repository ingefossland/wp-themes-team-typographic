jQuery(document).ready(function($) {

    // filter list based on input
    $('#filter input').keyup(function() {

		var filter = $(this).val();
		var rg = new RegExp(filter,'i');

		$("#filter ul li").each(function() {
			if ($.trim($(this).html()).search(rg) == -1) {
				$(this).css('display', 'none');
			} else {
				$(this).css('display', '');
			}
		});
	    
    });

    

});