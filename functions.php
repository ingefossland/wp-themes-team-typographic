<?php

// Set language to Norwegian
setlocale(LC_ALL, "no_NO");

// scripts
//wp_enqueue_script('jquery-pageslide', get_bloginfo('template_url') . '/js/lib/jquery.pageslide.min.js', array('jquery'), false, true);
wp_enqueue_script('team-typographic-menu', get_bloginfo('template_url') . '/js/menu.js', array('jquery'));

// additional functions

include("functions-stats.php");

?>
