<?php

$players = get_object_vars($stats->players);
usort($players, sort_players_by_apps);

?>

<table class="playerStats" id="playerStats-season">
  <caption>
  Spillerstatistikk
  </caption>
  <thead>
    <tr>
      <th rowspan="2"></th>
      <?php foreach ($stats->comps as $comp) { ?>
      <?php if ($comp->totalApps > 0) { ?>
      <th colspan="3" scope="col"><a href="<?php echo get_term_link($season->slug, 'season') . $comp->slug . '/'; ?>" title="<?php echo $comp->name; ?>"><?php echo $comp->name; ?></a></th>
      <?php } else { ?>
      <th colspan="3" scope="col"><?php echo $comp->name; ?></th>
      <?php } ?>
      <?php } ?>
      <th colspan="3" scope="col" >Total</th>
    </tr>
    <tr>
      <?php foreach ($stats->comps as $comp) { ?>
      <th scope="col">Kamper</th>
      <th scope="col">Mål</th>
      <th scope="col">Kort</th>
      <?php } ?>
      <th scope="col">Kamper</th>
      <th scope="col">Mål</th>
      <th scope="col">Kort</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($players as $p) { ?>
    <?php $total = get_player_stats($p); ?>
    <tr class="<?php echo $total->class; ?>">
      <th scope="row"><a href="<?php echo get_permalink($p->ID); ?>"><?php echo $p->name; ?></a></th>
      <?php foreach ($stats->comps as $comp) { ?>
      <?php $comp = get_player_stats($p->comp->{$comp->competition_id}); ?>
      <td class="apps"><?php echo $comp->apps; ?></td>
      <td class="goals"><?php echo $comp->goals; ?></td>
      <td class="cards"><?php echo $comp->cards; ?></td>
      <?php } ?>
      <td class="apps"><?php echo $total->apps; ?></td>
      <td class="goals"><?php echo $total->goals; ?></td>
      <td class="cards"><?php echo $total->cards; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
