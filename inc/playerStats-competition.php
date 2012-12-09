<?php

$players = get_object_vars($stats->players);
usort($players, array(&$teamdata, 'sort_players_by_apps'));

?>

<table class="playerStats" id="playerStats-competition">
  <caption>
  Spillerstatistikk
  </caption>
  <thead>
    <tr>
      <th rowspan="2"></th>
      <th colspan="3" scope="col" ><?php echo $competition->name; ?></th>
    </tr>
    <tr>
      <th scope="col" colspan="2">Kamper</th>
      <th scope="col">Mål</th>
    </tr>
  </thead>
  <?php /* TOTALS */ ?>
  <?php $total = get_comp_stats($stats->totals); ?>
  <tfoot class="<?php echo $total->class; ?>">
    <tr>
      <th scope="row"><strong>Totalt</strong></th>
      <td class="apps"><?php echo $total->apps; ?></td>
      <td class="cards"><?php echo $total->cards; ?></td>
      <td class="goals"><?php echo $total->goals; ?></td>
    </tr>
  </tfoot>
  <?php /* PLAYERS */ ?>
  <?php foreach ($players as $p) { ?>
  <?php $total = get_player_stats($p); ?>
  <tbody class="<?php echo $total->class; ?>">
    <tr>
      <th scope="row"><a href="<?php echo get_permalink($p->ID); ?>"><?php echo $p->name; ?></a></th>
      <td class="apps"><?php echo $total->apps; ?></td>
      <td class="cards"><?php echo $total->cards; ?></td>
      <td class="goals"><?php echo $total->goals; ?></td>
    </tr>
  </tbody>
  <?php } ?>
</table>
