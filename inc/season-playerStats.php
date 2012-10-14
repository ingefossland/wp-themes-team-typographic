<?php

	function sortByApps($a, $b) {
		if ($a->totalApps < $b->totalApps) { return 1; }
		if ($a->totalApps > $b->totalApps) { return -1; }
		return 0;
	}
	
	$players = get_object_vars($stats->players);
	usort($players, sortByApps);

?>

<h2>Spillerstatistikk</h2>

<table class="stats" id="career">
  <caption>
  Spillerstatistikk
  </caption>
  <thead>
    <tr>
      <td rowspan="2" class="season"></td>
      <?php foreach ($stats->comps as $comp) { ?>
      <th colspan="2" scope="col" class="comp"><a href="<?php echo $comp->link; ?>"><?php echo $comp->name; ?></a></th>
      <?php } ?>
      <th colspan="2" scope="col" class="total comp"><strong>Total</strong></th>
    </tr>
    <tr>
      <?php foreach ($stats->comps as $comp) { ?>
      <th scope="col" class="apps"><span>Kamper</span></th>
      <th scope="col" class="goals"><span>Mål</span></th>
      <?php } ?>
      <th scope="col" class="total apps"><span>Kamper</span></th>
      <th scope="col" class="total goals"><span>Mål</span></th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($players as $p) { ?>
        <?php //$player = get_player_stats($player); ?>
    <tr>
      <th scope="row"><a href="<?php echo get_permalink($p->ID); ?>"><?php echo $p->name; ?></a></th>
      <?php foreach ($stats->comps as $comp) { ?>
      <?php $comp = get_player_stats($p->comp->{$comp->competition_id}); ?>
      <td class="apps"><span><?php echo $comp->apps; ?></span></td>
      <td class="goals"><span><?php echo $comp->goals; ?></span></td>
      <?php } ?>
      <?php $season = get_player_stats($p); ?>
      <td class="apps"><span><?php echo $season->apps; ?></span></td>
      <td class="goals"><span><?php echo $season->goals; ?></span></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
