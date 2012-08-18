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

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<h1><?php the_title(); ?></h1>
<?php the_content(); ?>
<?php endwhile; ?>

<?php include("inc/team-head2head.php"); ?>
<?php include("inc/team-resfix.php"); ?>

<?php get_footer(); ?>
