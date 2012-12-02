<?php

global $post, $teamdata;

// get seasons & competitions
$seasons = $teamdata->get_seasons();
$comps = $teamdata->get_competitions();

?>
<?php get_header(); ?>
<section id="index">
  <hgroup id="title">
    <h1>Statistikk</h1>
  </hgroup>
  <?php if ($seasons) { ?>
  <nav>
    <h2>Seasons</h2>
    <ul>
      <?php foreach ($seasons as $season) { ?>
      <li><a href="<?php echo $season->link; ?>"><?php echo $season->name; ?></a></li>
      <?php } ?>
    </ul>
  </nav>
  <?php } ?>
  <?php if ($seasons) { ?>
  <nav>
    <h2>Competitions</h2>
    <ul>
      <?php foreach ($comps as $comp) { ?>
      <li><a href="<?php echo $comp->link; ?>"><?php echo $comp->name; ?></a></li>
      <?php } ?>
    </ul>
  </nav>
  <?php } ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
