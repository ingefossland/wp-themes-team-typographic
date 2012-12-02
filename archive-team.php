<?php

global $post, $teamdata;

// get teams
$index = $teamdata->get_teams();

?>
<?php get_header(); ?>
<section id="index">
	<hgroup id="title">
  <h1>Motstandere a&mdash;å</h1>
	</hgroup>
  <?php include("inc/archive-index.php"); ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
