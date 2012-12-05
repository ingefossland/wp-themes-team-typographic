<?php

global $teamdata;

$team_id = get_option('teamdata_team_id');
$player_id = $post->ID;

$player = $teamdata->get_player($player_id);
	
$stats = $teamdata->get_stats(array(
	'team_id' => $team_id,
	'player_id' => $player_id
));

// SUMMARY

$player->summary = '';

// positions

$positions = array(
	1 => 'Keeper',
	2 => 'Forsvar',
	3 => 'Midtbane',
	4 => 'Angrep'
);

$player->position = $positions[$player->position_id];

// position & nationality

if ($player->position && $player->country_id) {

	$player->summary = $player->position . ' (' . $player->country_id . ')'; 

} else if ($player->position) {

	$player->summary = $player->position; 
	
}

// birthdate?

if ($player->summary && $player->birthdate) {

	$player->summary .= '<br />Født: ' . strtolower($player->birthdate_no) . ''; 

} else if ($player->birthdate) {

	$player->summary .= 'Født: ' . strtolower($player->birthdate_no) . ''; 
	
}

?>
<?php get_header(); ?>
<article id="player">
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <hgroup>
    <h1><?php echo $player->name; ?></h1>
    <?php if ($player->summary) { ?>
	    <h2><?php echo $player->summary; ?></h2>
    <?php } ?>
  </hgroup>
  <?php the_content(); ?>
  <?php include("inc/playerStats-career.php"); ?>
  <?php include("inc/teamStats.php"); ?>
  <?php include("inc/matches-bySeason.php"); ?>
  <?php endwhile; ?>
</article>
<?php get_sidebar(); ?>
<?php include("inc/filter-players.php"); ?>
<?php get_footer(); ?>
