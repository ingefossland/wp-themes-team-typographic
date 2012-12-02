<?php

$players = get_object_vars($stats->players);
usort($players, sort_players_by_apps);

?>

<table class="playerStats" id="playerStats-competition">
<caption>Spillerstatistikk</caption>
  <thead>
  	<tr>
  	  <th></th>
      <th scope="col">Kamper</th>
      <th scope="col">Mål</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($players as $p) { ?>
    <tr>
      <th scope="row"><a href="<?php echo get_permalink($p->ID); ?>" title="<?php echo $p->name; ?>"><span><?php echo $p->initials; ?></span></a></th>
      <?php $total = get_player_stats($p); ?>
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
