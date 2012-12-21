<?php

global $teamdata;

// team and league
$team_id = get_option('teamdata_team_id');
$league_id = get_option('teamdata_competition_id');

// current season
$season = get_queried_object();
$season_id = $season->term_id;
$season = $teamdata->get_season(array(
		'season_id' => $season_id,
	));

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
<article id="season">
  <hgroup id="title">
    <?php if ($competition_id) { ?>
    <h1><a href="<?php echo $season->link; ?>"><?php echo $season->name; ?></a> / <?php echo $competition->name; ?></h1>
    <?php } else if ($season_id) { ?>
    <h1><?php echo $season->name; ?></h1>
    <?php } else { ?>
    <h1>Sesongstatistikk</h1>
    <?php } ?>
  </hgroup>
  <section id="layers">
    <ul class="tabs-3">
      <li><a href="#matches">Kamper</a></li>
      <li><a href="#players">Spillere</a></li>
      <li><a href="#goals">Mål</a></li>
    </ul>
    <?php if ($competition_id) { ?>
    <article id="matches">
      <?php include("inc/teamStats.php"); ?>
      <?php include("inc/matches-byMonth.php"); ?>
    </article>
    <article id="players">
      <?php include("inc/playerStats-competition.php"); ?>
	</article>
    <article id="goals">
      <?php include("inc/playerStats-competition-goals.php"); ?>
    </article>
    <?php } else if ($season_id) { ?>
    <article id="matches">
      <?php include("inc/teamStats.php"); ?>
      <?php include("inc/matches-byMonth.php"); ?>
    </article>
    <article id="players">
      <?php include("inc/playerStats-season.php"); ?>
	</article>
    <article id="goals">
      <?php include("inc/playerStats-season-goals.php"); ?>
    </article>
    <?php } ?>
  </section>
</article>
<?php include("inc/filter-stats.php"); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
