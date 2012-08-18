<?php

global $post, $teamdata;

// get teams
$index = $teamdata->get_teams();

?>

<?php get_header(); ?>

<h1>Team index</h1>

<?php include("inc/archive-index.php"); ?>
        
<?php get_footer(); ?>