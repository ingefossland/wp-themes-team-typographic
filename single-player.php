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
	2 => 'Forsvarsspiller',
	3 => 'Midtbanespiller',
	4 => 'Angrepsspiller'
);

$player->position = $positions[$player->position_id];

// position & nationality

if ($player->position) {

	$player->summary .= '<span class="positition">' . $player->position . '</span> '; 

} 

// nationality

if ($player->country_id) {

	$player->summary .= '<span class="country">(' . $player->country_id . ')</span> '; 
	
}

// birthdate?

if ($player->birthdate) {

	$player->summary .= '<span class="birthdate">Født: ' . strtolower($player->birthdate_no) . '</span>'; 
	
}

// first and last season

$seasons = $stats->seasons;

foreach ($seasons as $season) {
	if (!$first_season) {
		$first_season = $season;
	}
	$last_season = $season;
}

if ($first_season != $last_season) {
	$player->career = $first_season->name . '&mdash;' . $last_season->name;
} else {
	$player->career = $first_season->name;
}

?>
<?php get_header(); ?>

<article id="player">
  <hgroup>
    <h1><?php echo $player->name; ?></h1>
    <?php if ($player->summary) { ?>
    <h2><?php echo $player->summary; ?></h2>
    <?php } ?>
  </hgroup>
  <section id="layers">
  	<?php if ($post->post_content) { ?>
  	<ul class="tabs-3">
    	<li><a href="#biography">Biografi</a></li>
    	<li><a href="#career">Karriere</a></li>
    	<li><a href="#matches">Kamper</a></li>
    </ul>
    <?php } else { ?>
  	<ul class="tabs-2">
    	<li><a href="#career">Karriere</a></li>
    	<li><a href="#matches">Kamper</a></li>
    </ul>
    <?php } ?>
    <article id="biography">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
      <?php endwhile; ?>
    </article>
    <article id="career">
      <?php include("inc/playerStats-career.php"); ?>
    </article>
    <article id="matches">
      <?php include("inc/teamStats.php"); ?>
      <?php include("inc/matches-byPlayer.php"); ?>
    </article>
  </section>
</article>
<?php get_sidebar(); ?>
<?php include("inc/filter-players.php"); ?>
<?php get_footer(); ?>
