jQuery(document).ready(function($) {

	// open menu when clicking parent
    $('#menu > ul > li > a').click(function() {
	    $(this).parent().toggleClass('on');
		return false;
	});

    // filter list based on input
    $('#menu form input').keyup(function() {
    
		var filter = $(this).val();
		var rg = new RegExp(filter,'i');

		// loop content for filter
		$('#menu ul li ul li a').each(function() {
		
			if ($.trim($(this).html()).search(rg) == -1) {
				$(this).parent().css('display', 'none');
			} else {
				$(this).parent().css('display', '');
			}

		});

		// add filter class if result is filtered
		if (filter) {
	    	$(this).parent().parent().parent().addClass('filter');
		} else {
	    	$(this).parent().parent().parent().removeClass('filter');
		}
	    
    });

});