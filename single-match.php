<?php

global $post, $teamdata;

$match_id = $post->ID;

$team_id = get_option('teamdata_team_id');
$league_id = get_option('teamdata_competition_id');

// get matchfacts
$matchfacts = $teamdata->get_matchfacts(array(
	'match_id' => $match_id,
	'team_id' => $team_id,
));

// get matchfacts players
$matchfacts_players = $teamdata->get_matchfacts_players(array(
	'match_id' => $match_id,
	'team_id' => $team_id,
));

// team & opponent
$team = $teamdata->get_team($team_id);
$opponent = $teamdata->get_team($matchfacts->team->opponent_id);

// get stats
$stats = $teamdata->get_stats(array(
	'team_id' => $team_id,
	'teams' => $matchfacts->team->opponent_id,
	'order' => 'descending'
));

?>
<?php get_header(); ?>
<article id="match">
  <hgroup>
    <h1><?php echo $matchfacts->hometeam->name; ?>&ndash;<?php echo $matchfacts->awayteam->name; ?> <?php echo $matchfacts->result; ?></h1>
    <h2><a href="<?php echo $matchfacts->season->link; ?>"><?php echo $matchfacts->competition->name; ?> <?php echo $matchfacts->season->name; ?></a>,
      <?php the_time('d.m.Y'); ?>
      <?php the_time('H:i'); ?>
    </h2>
    <h3><a href="<?php echo get_permalink($matchfacts->ground->ID); ?>">
      <?php the_ground(); ?>
      </a>, <?php echo $matchfacts->attendance; ?> tilskuere.</h3>
  </hgroup>
  <?php include("single-match-players.php"); ?>
  <?php //include("inc/team-resfix.php"); ?>
  <?php //the_awayteam_players(); ?>
  <?php //the_table(); ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
