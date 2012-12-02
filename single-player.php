<?php

global $teamdata;

$team_id = get_option('teamdata_team_id');
$player_id = $post->ID;
	
$stats = $teamdata->get_stats(array(
	'team_id' => $team_id,
	'player_id' => $player_id
));

?>


<?php get_header(); ?>

<article id="player">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<hgroup>
<h1><?php the_title(); ?></h1>
</hgroup>

<?php the_content(); ?>

<?php include("single-player-career.php"); ?>

<?php endwhile; ?>

</article>

<?php get_footer(); ?>
