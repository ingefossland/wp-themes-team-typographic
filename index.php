<?php

global $post, $teamdata;

// get indexes
$players = $teamdata->get_players();
$seasons = $teamdata->get_seasons();

?>

<?php get_header(); ?>
<?php get_sidebar(); ?>
<section id="index">
  <hgroup id="title">
    <h1>Brann (<?php echo $seasons[count($seasons)-1]->name; ?>&mdash;<?php echo $seasons[0]->name; ?>)</h1>
  </hgroup>
  <section id="layers">
  	<ul class="tabs-2">
    	<li><a href="#seasons">Sesonger</a></li>
    	<li><a href="#players">Spillere a&mdash;å</a></li>
    </ul>  <article id="seasons">
  <?php include("inc/index-seasons.php"); ?>
  </article>
  <article id="players">
  <?php include("inc/index-players.php"); ?>
  </article>

</section>
<?php get_footer(); ?>