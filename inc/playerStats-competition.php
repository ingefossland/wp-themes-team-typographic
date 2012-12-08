<?php

$players = get_object_vars($stats->players);
usort($players, array(&$teamdata, 'sort_players_by_apps'));

?>

<table class="playerStats" id="playerStats-competition">
<caption>Spillerstatistikk</caption>
  <thead>
  	<tr>
      <th rowspan="2"></th>
      <th colspan="3"><?php echo $competition->name; ?></th>
    </tr>
  	<tr>
      <th scope="col">Kamper</th>
      <th scope="col">Mål</th>
      <th scope="col">Kort</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($players as $p) { ?>
    <?php $total = get_player_stats($p); ?>
    <?php if ($total->goals > 0) { $class = 'goalscorer'; } else { $class = ''; } ?>
    <tr class="<?php echo $class; ?>">
      <th scope="row"><a href="<?php echo get_permalink($p->ID); ?>" title="<?php echo $p->name; ?>"><span><?php echo $p->initials; ?></span></a></th>
      <td class="apps"><?php echo $total->apps; ?></td>
      <td class="goals"><?php echo $total->goals; ?></td>
      <td class="cards"><?php echo $total->cards; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
