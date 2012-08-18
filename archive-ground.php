<?php

global $post, $teamdata;

// get teams
$index = $teamdata->get_grounds();

?>

<?php get_header(); ?>

<h1>Ground index</h1>

<?php include("inc/archive-index.php"); ?>
        
<?php get_footer(); ?>