<?php

global $teamdata;

$team_id = get_option('teamdata_team_id');

$competition = get_queried_object();
$competition_id = $competition->term_id;
	
$stats = $teamdata->get_stats(array(
	'team_id' => $team_id,
	'competition_id' => $competition_id
));

?>
<?php get_header(); ?>
<section id="competition">
  <hgroup id="title">
    <h1>
      <?php single_term_title(); ?>
    </h1>
  </hgroup>
  <?php include("inc/teamStats.php"); ?>
  <?php include("inc/playerStats-competition.php"); ?>
  <?php include("inc/playerStats-competition-goals.php"); ?>
  <?php include("inc/matches-bySeason.php"); ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
