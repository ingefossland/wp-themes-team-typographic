<?php

global $post, $teamdata;

$team_id = get_option('teamdata_team_id');
$opponent_id = $post->ID;

// team & opponent
$team = $teamdata->get_team($team_id);
$opponent = $teamdata->get_team($opponent_id);

// get stats
$stats = $teamdata->get_stats(array(
	'team_id' => $team_id,
	'teams' => $opponent_id,
	'order' => 'descending'
));

?>
<?php get_header(); ?>
<article id="team">
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <hgroup id="title">
    <h1>Brann mot
      <?php the_title(); ?>
    </h1>
  </hgroup>
  <?php the_content(); ?>
  <?php endwhile; ?>
  <?php include("inc/teamStats.php"); ?>
  <?php include("inc/matches-bySeason.php"); ?>
  <?php include("inc/playerStats-season.php"); ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>