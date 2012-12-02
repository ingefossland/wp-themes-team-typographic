<?php

$players = get_object_vars($stats->players);
usort($players, sort_players_by_apps);

?>

<table class="player-stats" id="season-player-stats">
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
    <tr>
      <th scope="row"><a href="<?php echo get_permalink($p->ID); ?>" title="<?php echo $p->name; ?>"><span><?php echo $p->initials; ?></span></a></th>
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
