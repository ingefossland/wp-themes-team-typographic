<?php

global $post, $teamdata;

$team_id = get_option('teamdata_team_id');
$league_id = get_option('teamdata_competition_id');



// get fixtures
$fixtures = $teamdata->get_matches(array(
	'team_id' => $team_id,
	'type' => 'fixtures',
	'limit' => '3'
));

?>

<?php get_header(); ?>

	<?php include("inc/matches-nextFixtures.php"); ?>
	<?php include("inc/matches-latestResults.php"); ?>

	<?php while ( have_posts() ) : the_post(); ?>
	    <?php //get_template_part('story', get_post_type()); ?>
    <?php endwhile; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>