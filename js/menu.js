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
    
	// show search
    $('a[href="#search"]').click(function(e) {

        // Prevent the default behavior and stop propagation
        e.preventDefault();
        e.stopPropagation();
        
        if ($('#search').is(':visible')) {
            hide_search();
        } else {
            show_search();
        }       

    });
    
    // extend search when clicking search input
    $('#search input[type=text]').focus(function(e) {
    
    	$('#search').addClass('focus');

	    /*

		var searchWidth = $('#search').outerWidth(true);
		var documentWidth = $('body').outerWidth(true);


		// animate search
		$('#search').animate({
			'width' : '+=' + 20
		}, 'fast');
		
		*/
		

    });
    
    $('#search input[type=text]').blur(function(e) {
    
    	$('#search').removeClass('focus');

	    /*

		var searchWidth = $('#search').outerWidth(true);
		var documentWidth = $('body').outerWidth(true);


		// animate search
		$('#search').animate({
			'width' : '+=' + 20
		}, 'fast');
		
		*/
		

    });    
    
	// Don't let clicks to the pageslide close the window
    $('#search').click(function(e) {
        e.stopPropagation();
    });

	// close search or menu if visible and click outsid
	$(document).bind('click keyup', function(e) {
	    // If this is a keyup event, let's see if it's an ESC key
        if ( e.type == "keyup" && e.keyCode != 27) return;
	    
	    // Make sure it's visible, and we're not modal	    
	    if ($('#search').is(':visible')) {	        
	       hide_search();
	    }

	    // Make sure it's visible, and we're not modal	    
	    if ($('#menu').is(':visible')) {	        
	       hide_menu();
	    }

	});
    
    // show search
    function show_search() {
    
		var slideWidth = $('#search').outerWidth(true);
		var _sliding = false;
		
		// If the slide is open or opening, just ignore the call
		if($('#search').is(':visible') || _sliding ) return;	        
		_sliding = true;
		
		// position search
		$('#search').css({ right: '-' + slideWidth + 'px' }); 
		$('#search').show();

		// set grid to fixed
	    $('#grid').css('position', 'fixed');
		                                                            
		// animate grid
		$('#grid').animate({
			'margin-left' : '-=' + slideWidth,
			'padding-right' : '+=' + slideWidth
		}, 'fast');

		// animate search
		$('#search').animate({
			'right' : '+=' + slideWidth,
		}, 'fast');
	    
    }
    
    // hide search
    function hide_search() {
	    
       var slideWidth = $('#search').outerWidth(true);
       var _sliding = false;
       
       // If the slide is open or opening, just ignore the call
       if($('#search').is(':hidden') || _sliding ) return;	        
       _sliding = true;
                                                                    
		// animate grid
		$('#grid').animate({
			'margin-left' : '+=' + slideWidth,
			'padding-right' : '-=' + slideWidth
		}, 'fast');

		// animate search
		$('#search').animate({
			'right' : '-=' + slideWidth,
		}, 'fast', '', function() {
			$('#search').hide();
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