<?php

global $post, $teamdata;

$team_id = get_option('teamdata_team_id');
$league_id = get_option('teamdata_competition_id');

// get results
$results = $teamdata->get_matches(array(
	'team_id' => $team_id,
	'type' => 'results',
	'limit' => '3'
));

// get fixtures
$fixtures = $teamdata->get_matches(array(
	'team_id' => $team_id,
	'type' => 'fixtures',
	'limit' => '3'
));

?>

<?php get_header(); ?>

	<?php //include("inc/frontpage-fixtures.php"); ?>
	<?php //include("inc/frontpage-results.php"); ?>

	<?php while ( have_posts() ) : the_post(); ?>
	    <?php //get_template_part('story', get_post_type()); ?>
    <?php endwhile; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>