<?php

global $post, $teamdata;

$team_id = get_option('teamdata_team_id');
$ground_id = $post->ID;

// team & opponent
$team = $teamdata->get_team($team_id);
$ground = $teamdata->get_ground($ground_id);

// get stats
$stats = $teamdata->get_stats(array(
	'team_id' => $team_id,
	'grounds' => $ground_id,
	'order' => 'descending'
));

?>
<?php get_header(); ?>

<article id="ground">
  <hgroup id="title">
    <h1>Brann på
      <?php the_title(); ?>
    </h1>
  </hgroup>
  <section id="layers">
    <ul class="tabs-2">
      <li><a href="#matches">Kamper</a></li>
      <li><a href="#players">Spillere</a></li>
    </ul>
    <article id="matches">
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <?php the_content(); ?>
  <?php endwhile; ?>
  <?php include("inc/teamStats.php"); ?>
  <?php include("inc/matches-bySeason.php"); ?>
    </article>
    <article id="players">
  <?php include("inc/playerStats-season.php"); ?>
	</article>
    </section>
</article>
<?php get_sidebar(); ?>
<?php include("inc/filter-grounds.php"); ?>
<?php get_footer(); ?>
