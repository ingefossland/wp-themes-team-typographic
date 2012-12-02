jQuery(document).ready(function($) {

	// show menu
    $('a[href="#menu"]').click(function(e) {

        // Prevent the default behavior and stop propagation
        e.preventDefault();
        e.stopPropagation();
        
        if ($('#menu').is(':visible')) {
            hide_menu();
        } else {
            show_menu();
        }       

    });
   
	// Don't let clicks to the pageslide close the window
    $('#menu').click(function(e) {
        e.stopPropagation();
    });
    
	// show filter
    $('a[href="#filter"]').click(function(e) {

        // Prevent the default behavior and stop propagation
        e.preventDefault();
        e.stopPropagation();
        
        if ($('#filter').is(':visible')) {
            hide_filter();
        } else {
            show_filter();
        }       

    });
    
	// Don't let clicks to the pageslide close the window
    $('#filter').click(function(e) {
        e.stopPropagation();
    });

	// close filter or menu if visible and click outsid
	$(document).bind('click keyup', function(e) {
	    // If this is a keyup event, let's see if it's an ESC key
        if ( e.type == "keyup" && e.keyCode != 27) return;
	    
	    // Make sure it's visible, and we're not modal	    
	    if ($('#filter').is(':visible')) {	        
	       hide_filter();
	    }

	    // Make sure it's visible, and we're not modal	    
	    if ($('#menu').is(':visible')) {	        
	       hide_menu();
	    }

	});
    
    // show filter
    function show_filter() {
    
		var slideWidth = $('#filter').outerWidth(true);
		var _sliding = false;
		
		// If the slide is open or opening, just ignore the call
		if($('#filter').is(':visible') || _sliding ) return;	        
		_sliding = true;
		
		// position filter
		$('#filter').css({ right: '-' + slideWidth + 'px' }); 
		$('#filter').show();

		// set grid to fixed
	    $('#grid').css('position', 'fixed');
		                                                            
		// animate grid
		$('#grid').animate({
			'margin-left' : '-=' + slideWidth,
			'padding-right' : '+=' + slideWidth
		}, 'fast');

		// animate filter
		$('#filter').animate({
			'right' : '+=' + slideWidth,
		}, 'fast');
	    
    }
    
    // hide filter
    function hide_filter() {
	    
       var slideWidth = $('#filter').outerWidth(true);
       var _sliding = false;
       
       // If the slide is open or opening, just ignore the call
       if($('#filter').is(':hidden') || _sliding ) return;	        
       _sliding = true;
                                                                    
		// animate grid
		$('#grid').animate({
			'margin-left' : '+=' + slideWidth,
			'padding-right' : '-=' + slideWidth
		}, 'fast');

		// animate filter
		$('#filter').animate({
			'right' : '-=' + slideWidth,
		}, 'fast', '', function() {
			$('#filter').hide();
		});
	    
    }

    // show menu
    function show_menu() {
    
		var slideWidth = $('#menu').outerWidth(true);
		var _sliding = false;
		
		// If the slide is open or opening, just ignore the call
		if($('#menu').is(':visible') || _sliding ) return;	        
		_sliding = true;
		
		// position menu
		$('#menu').css({ left: '-' + slideWidth + 'px' }); 
		$('#menu').show();

		// set grid to fixed
	    $('#grid').css('position', 'fixed');
		                                                            
		// animate grid
		$('#grid').animate({
			'margin-right' : '-=' + slideWidth,
			'padding-left' : '+=' + slideWidth
		}, 'fast');

		// animate menu
		$('#menu').animate({
			'left' : '+=' + slideWidth,
		}, 'fast');
	    
    }
    
    // hide menu
    function hide_menu() {
	    
       var slideWidth = $('#menu').outerWidth(true);
       var _sliding = false;
       
       // If the slide is open or opening, just ignore the call
       if($('#menu').is(':hidden') || _sliding ) return;	        
       _sliding = true;
                                                                    
		// animate grid
		$('#grid').animate({
			'margin-right' : '+=' + slideWidth,
			'padding-left' : '-=' + slideWidth
		}, 'fast');

		// animate menu
		$('#menu').animate({
			'left' : '-=' + slideWidth,
		}, 'fast', '', function() {
			$('#menu').hide();
		});
	    
    }
    

});