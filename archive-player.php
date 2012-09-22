<?php

global $post, $teamdata;

// get teams
$index = $teamdata->get_players();

?>

<?php get_header(); ?>

<h1>Player index</h1>

<?php include("inc/archive-index.php"); ?>
        
<?php get_sidebar(); ?>
<?php get_footer(); ?>