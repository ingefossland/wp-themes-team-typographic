<?php

global $post, $teamdata;

// get teams
$index = $teamdata->get_players();

?>
<?php get_header(); ?>
<section id="index">
	<hgroup id="title">
  <h1>Spillere a&mdash;å</h1>
	</hgroup>
  <?php include("inc/index-players.php"); ?>
</section>
<?php get_sidebar(); ?>
<?php include("inc/filter-players.php"); ?>
<?php get_footer(); ?>
