jQuery(document).ready(function($) {

	function iOSswipeLeft() {
//		alert("Swipe left");

        if ($('#menu').is(':visible')) {
            hide_menu();
        } else {
            show_filter();
        }       

	}

	function iOSswipeRight() {
//		alert("Swipe right");

        if ($('#filter').is(':visible')) {
            hide_filter();
        } else {
            show_menu();
        }       

	}

});