<?php

$players = get_object_vars($stats->players);
usort($players, sort_players_by_apps);

?>

<table class="playerStats" id="playerStats-season">
<caption>Spillerstatistikk</caption>
  <thead>
    <tr>
      <th rowspan="2"></th>
      <?php foreach ($stats->comps as $comp) { ?>
      <th colspan="2" scope="col" class="comp"><a href="<?php echo $comp->link; ?>" title="<?php echo $comp->name; ?>"><?php echo $comp->name; ?></a></th>
      <?php } ?>
      <th colspan="2" scope="col" class="total comp">Total</th>
    </tr>
    <tr>
      <?php foreach ($stats->comps as $comp) { ?>
      <th scope="col" class="apps">Kamper</th>
      <th scope="col" class="goals">Mål</th>
      <?php } ?>
      <th scope="col" class="total apps">Kamper</th>
      <th scope="col" class="total goals">Mål</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($players as $p) { ?>
    <?php $total = get_player_stats($p); ?>
    <?php if ($total->goals > 0) { $class = 'goalscorer'; } else { $class = ''; } ?>
    <tr class="<?php echo $class; ?>">
      <th scope="row"><a href="<?php echo get_permalink($p->ID); ?>" title="<?php echo $p->name; ?>"><span><?php echo $p->initials; ?></span></a></th>
      <?php foreach ($stats->comps as $comp) { ?>
	      <?php $comp = get_player_stats($p->comp->{$comp->competition_id}); ?>
	      <td class="apps"><span><?php echo $comp->apps; ?></span></td>
	      <?php if ($comp->goals > 0) { ?>
	      <td class="goals"><span><?php echo $comp->goals; ?></span></td>
	      <?php } else { ?>
	      <td class="goals"></td>
	      <?php } ?>
      <?php } ?>
      <td class="apps"><span><?php echo $total->apps; ?></span></td>
      <?php if ($total->goals > 0) { ?>
      <td class="goals"><span><?php echo $total->goals; ?></span></td>
      <?php } else { ?>
	  <td class="goals"></td>
      <?php } ?>
    </tr>
    <?php } ?>
  </tbody>
</table>
