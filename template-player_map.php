<?php
/**
 * Template Name: Player map
 * Description: Map of where players where born
 */

global $post, $teamdata;

// google maps

$gmap_api_key = get_option("ux-geocoder-gmap_api_key_v3");
wp_enqueue_script('ux-geocoder-googlemaps', 'https://maps.googleapis.com/maps/api/js?sensor=false&key='.$gmap_api_key);
wp_enqueue_script('teamdata-player-map', get_bloginfo('template_url') . '/js/player-map.php');

// get players that are associated with a location

$players = $teamdata->get_players();


?>

<?php get_header(); ?>

<div id="map_canvas"></div>

<?php get_footer(); ?>
