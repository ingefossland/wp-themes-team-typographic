<?php

// Set language to Norwegian
setlocale(LC_ALL, "no_NO");

// scripts
//wp_enqueue_script('jquery-pageslide', get_bloginfo('template_url') . '/js/lib/jquery.pageslide.min.js', array('jquery'), false, true);
wp_enqueue_script('team-toolbar', get_bloginfo('template_url') . '/js/team-toolbar.js', array('jquery'));
wp_enqueue_script('team-filter', get_bloginfo('template_url') . '/js/team-filter.js', array('jquery'));

// additional functions

include("functions-stats.php");

?>
