<?php

// Set language to Norwegian
setlocale(LC_ALL, "no_NO");
setlocale(LC_ALL, "nb_NO");

// Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run.
add_action('after_setup_theme', 'netlife_setup');

if (!function_exists('netlife_setup')):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override twentyten_setup() in a child theme, add your own twentyten_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Ten 1.0
 */
function netlife_setup() {

	// scripts
	wp_enqueue_script('team-layers', get_bloginfo('template_url') . '/js/team-layers.js', array('jquery-ui-tabs'));
	wp_enqueue_script('team-toolbar', get_bloginfo('template_url') . '/js/team-toolbar.js', array('jquery'));
	wp_enqueue_script('team-filter', get_bloginfo('template_url') . '/js/team-filter.js', array('jquery'));
	wp_enqueue_script('team-ios', get_bloginfo('template_url') . '/js/team-iOS.js', array('jquery'));

	// This theme uses post thumbnails
	add_theme_support('post-thumbnails');

	// Add default posts and comments RSS feed links to head
	//add_theme_support('automatic-feed-links');

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 940 pixels wide by 198 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.

	// set_post_thumbnail_size(300, 240, true);
	
	// Add image sizes
	// add_image_size('c12', 940, 940); // 12 columns
	// add_image_size('c1', 80, 160); // 1 columns

 	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => 'Primary navigation',
		'languages' => 'Languages'
	));

}
endif;

/**
 * Makes some changes to the <title> tag, by filtering the output of wp_title().
 *
 * If we have a site description and we're viewing the home page or a blog posts
 * page (when using a static front page), then we will add the site description.
 *
 * If we're viewing a search result, then we're going to recreate the title entirely.
 * We're going to add page numbers to all titles as well, to the middle of a search
 * result title and the end of all other titles.
 *
 * The site title also gets added to all titles.
 *
 * @since Twenty Ten 1.0
 *
 * @param string $title Title generated by wp_title()
 * @param string $separator The separator passed to wp_title(). Twenty Ten uses a
 * 	vertical bar, "|", as a separator in header.php.
 * @return string The new title, ready for the <title> tag.
 */

function team_wp_title($title, $separator) {
	// Don't affect wp_title() calls in feeds.
	if (is_feed()) {
		return $title;
	}

	// The $paged global variable contains the page number of a listing of posts.
	// The $page global variable contains the page number of a single post that is paged.
	// We'll display whichever one applies, if we're not looking at the first page.
	global $paged, $page;

	if (is_search()) {
		// If we're a search, let's start over:
		$title = sprintf( __( 'Søk etter %s', 'team-typographic' ), '"' . get_search_query() . '"' );
		// Add a page number if we're on page 2 or more:
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( __( 'Side %s', 'team-typographic' ), $paged );
		// Add the site name to the end:
		$title .= " $separator " . get_bloginfo( 'name', 'display' );
		// We're done. Let's send the new title back to wp_title():
		return $title;
	}

	if (is_404()) {
		// If we're a search, let's start over:
		$title = _e('Siden finnes ikke');
		// Add a page number if we're on page 2 or more:

		// Add the site name to the end:
		$title .= " $separator " . get_bloginfo( 'name', 'display' );
		// We're done. Let's send the new title back to wp_title():
		return $title;
	}

	// Otherwise, let's start by adding the site name to the end:
	$title .= get_bloginfo( 'name', 'display' );

	// If we have a site description and we're on the home/front page, add the description:
	$site_description = get_bloginfo( 'description', 'display' );

	if ($site_description && (is_home() || is_front_page())) {
		$title .= " $separator " . $site_description;
	}

	// Add a page number if necessary:
	if ($paged >= 2 || $page >= 2) {
		$title .= " $separator " . sprintf( __( 'Side %s', 'team-typographic' ), max( $paged, $page ) );
	}

	// Return the new title to wp_title():
	return $title;
}

add_filter('wp_title', 'team_wp_title', 10, 2 );

// additional functions

include("functions-team.php");
include("functions-stats.php");

?>
