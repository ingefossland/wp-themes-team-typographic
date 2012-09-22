<?php 

header("Content-type: application/x-javascript"); 

require_once('../../../../wp-config.php');

?>

function initialize(lat, lng, zoom) {

	// set center
	
	var center = new google.maps.LatLng(lat, lng);

	// set styles

    var mapStyles = [
      {
        featureType: 'all',
        stylers: [
          { hue: "#496e1b" },
          { saturation: -50 },
          { lightness: 0 },
          { gamma: 1 }
        ]
      }
    ];
    
    // set options

    var mapOptions = {
      center: center,
      zoom: zoom,
	  scrollwheel: false,
	  navigationControl: false,
	  mapTypeControl: false,
	  scaleControl: false,
	  draggable: true,
	  disableDefaultUI: true,
	  mapTypeId: google.maps.MapTypeId.ROADMAP,
	  styles: mapStyles
    };

    var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    
    // add marker

	var marker_icon = new google.maps.MarkerImage('<?php bloginfo('template_url'); ?>/img/map/map-marker.png',
	  new google.maps.Size(64.0, 84.0),
	  new google.maps.Point(0, 0),
	  new google.maps.Point(32, 100));
	  	
	var marker_shadow = new google.maps.MarkerImage('<?php bloginfo('template_url'); ?>/img/map/map-marker-shadow.png',
	  new google.maps.Size(64.0, 114.0),
	  new google.maps.Point(0, 0),
	  new google.maps.Point(32, 100));
    
    var marker = new google.maps.Marker({
	    position: center,
		shadow: marker_shadow,
		icon: marker_icon,
	    title: "Netlife Research"
	});
	
	// To add the marker to the map, call setMap();
	marker.setMap(map);

}

// INITIALIZE

jQuery(document).ready(function($) {

	// check map
    var map = null;

    var lat = document.getElementById('map-latitude').innerHTML * 1;
    var lng = document.getElementById('map-longitude').innerHTML * 1;
    var zoom = document.getElementById('map-zoom').innerHTML * 1;
    
    initialize(lat, lng, zoom);

});