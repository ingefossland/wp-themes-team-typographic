<?php

/**
 * Template Name: Season Taxonomy
 * Description: Map of where players where born
 */

global $teamdata;

// team and league
$team_id = get_option('teamdata_team_id');
$league_id = get_option('teamdata_competition_id');

// current season
$season = get_queried_object();
$season_id = $season->term_id;

// get seasons & competitions
$seasons = $teamdata->get_seasons();
$comps = $teamdata->get_competitions();

// get queried comp
$competition = $wp_query->query_vars['comp_name'];
$competition = get_term_by('slug', $competition, 'competition');
$competition_id = $competition->term_id;

// get stats

if ($competition_id) {

	$stats = $teamdata->get_stats(array(
			'team_id' => $team_id,
			'season_id' => $season_id,
			'competition_id' => $competition_id
		));

} else if ($season_id) {

	$stats = $teamdata->get_stats(array(
			'team_id' => $team_id,
			'season_id' => $season_id,
	));

}

?>
<?php get_header(); ?>
<section id="season">
  <hgroup id="title">
    <?php if ($competition_id) { ?>
    <h1><?php echo $competition->name; ?>
      <?php single_term_title(); ?>
    </h1>
    <?php } else if ($season_id) { ?>
    <h1>
      <?php single_term_title(); ?>
    </h1>
    <?php } else { ?>
    <h1>Sesongstatistikk</h1>
    <?php } ?>
  </hgroup>
  <?php if ($competition_id) { ?>
  <?php include("inc/teamStats.php"); ?>
  <?php include("inc/matches-byMonth.php"); ?>
  <?php include("inc/playerStats-competition.php"); ?>
  <?php } else if ($season_id) { ?>
  <?php include("inc/teamStats.php"); ?>
  <?php include("inc/matches-byMonth.php"); ?>
  <?php include("inc/playerStats-season.php"); ?>
  <?php } ?>
  <?php //include("inc/season-playersByGoals.php"); ?>
  <?php //include("inc/season-playersByApps.php"); ?>
  <?php //include("inc/season-matrix.php"); ?>
  <?php //include("inc/season-leaguePerformance.php"); ?>
</section>
<?php include("inc/filter-stats.php"); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
