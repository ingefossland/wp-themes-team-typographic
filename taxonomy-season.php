<?php

global $teamdata;

// team and league
$team_id = get_option('teamdata_team_id');
$league_id = get_option('teamdata_competition_id');

// get seasons & competitions
$seasons = $teamdata->get_seasons();
//$comps = $teamdata->get_competitions();

// current season
$season = get_queried_object();
$season_id = $season->term_id;

// get queried comp
$competition = $_REQUEST['comp'];
$competition = get_term_by('slug', $competition, 'competition');
$competition_id = $competition->term_id;

// get stats

if ($competition_id) {

	$stats = $teamdata->get_stats(array(
			'team_id' => $team_id,
			'season_id' => $season_id,
			'competition_id' => $competition_id
		));

} else {

	$stats = $teamdata->get_stats(array(
			'team_id' => $team_id,
			'season_id' => $season_id,
	));

}

?>

<?php get_header(); ?>

<section id="season">

<h1><?php single_term_title(); ?></h1>
<?php include("inc/season-nav-seasons.php"); ?>
<?php include("inc/season-nav-competitions.php"); ?>

<?php include("inc/season-matrix.php"); ?>
<?php include("inc/season-leaguePerformance.php"); ?>

</section>

<?php get_footer(); ?>
