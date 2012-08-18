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

<h1><?php single_term_title(); ?></h1>
<?php include("inc/season-matrix.php"); ?>

<?php get_footer(); ?>
