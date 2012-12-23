<?php

global $post, $teamdata;

// get indexes
$players = $teamdata->get_players();
$seasons = $teamdata->get_seasons();
$opponents = $teamdata->get_opponents();
$grounds = $teamdata->get_grounds();

?>

<nav id="menu">
  <form action="#">
    <p><input type="text" class="search" placeholder="Søk etter hva som helst" /></p>
  </form>
  <ul>
    <li class="seasons"><a href="<?php bloginfo('url'); ?>/matches/"><strong>Sesonger</strong></a>
	    <ul>
	      <?php foreach ($seasons as $season) { ?>
	      <li><a href="<?php echo $season->link; ?>"><?php echo $season->name; ?></a></li>
	      <?php } ?>
	    </ul>
    </li>
    <li class="players"><a href="<?php bloginfo('url'); ?>/players/"><strong>Spillere</strong></a>
	    <ul>
	      <?php foreach ($players as $player) { ?>
	      <li><a href="<?php echo $player->link; ?>"><?php echo $player->name_first; ?> <strong><?php echo $player->name_last; ?></strong></a></li>
	      <?php } ?>
	    </ul>
    </li>
    <li class="teams"><a href="<?php bloginfo('url'); ?>/teams/"><strong>Motstandere</strong></a>
	    <ul>
	      <?php foreach ($opponents as $team) { ?>
	      <li><a href="<?php echo $team->link; ?>"><?php echo $team->name; ?></strong></a></li>
	      <?php } ?>
	    </ul>
    </li>
    <li class="grounds"><a href="<?php bloginfo('url'); ?>/grounds/"><strong>På bortebane</strong></a>
	    <ul>
	      <?php foreach ($grounds as $ground) { ?>
	      <li><a href="<?php echo $ground->link; ?>"><?php echo $ground->name; ?></a></li>
	      <?php } ?>
	    </ul>
    </li>
  </ul>
</nav>
