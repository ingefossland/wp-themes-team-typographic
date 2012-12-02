<?php

global $post, $teamdata;

// get teams
$index = $teamdata->get_grounds();

?>
<section id="index">
  <?php get_header(); ?>
  <hgroup id="title">
    <h1>Baner a&mdash;å</h1>
  </hgroup>
  <?php include("inc/archive-index.php"); ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
