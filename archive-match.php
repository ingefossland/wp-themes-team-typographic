<?php

global $post, $teamdata;

// get seasons & competitions
$seasons = $teamdata->get_seasons();

?>
<?php get_header(); ?>
<section id="index">
  <hgroup id="title">
    <h1>Sesonger</h1>
  </hgroup>
  <?php if ($seasons) { ?>
  <nav class="index">
    <h2>Sesonger</h2>
    <ul>
      <?php foreach ($seasons as $season) { ?>
      <li><a href="<?php echo $season->link; ?>"><strong><?php echo $season->name; ?></strong></a></li>
      <?php } ?>
    </ul>
  </nav>
  <?php } ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
