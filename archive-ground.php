<?php

global $post, $teamdata;

// get teams
$index = $teamdata->get_grounds();

?>
<?php get_header(); ?>
<section id="index">
  <hgroup id="title">
    <h1>Baner a&mdash;å</h1>
  </hgroup>
  <?php include("inc/index-teams.php"); ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
