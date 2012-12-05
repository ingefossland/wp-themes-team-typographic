jQuery(document).ready(function($) {

	function iOSswipeLeft() {
//		alert("Swipe left");

		// hide menu if visible, else open filter
        if ($('#menu').is(':visible')) {
            hide_menu();
        } else {
            show_filter();
        }       

	}

	function iOSswipeRight() {
//		alert("Swipe right");

		// hide filter if visible, else open menu
        if ($('#filter').is(':visible')) {
            hide_filter();
        } else {
            show_menu();
        }       

	}

});