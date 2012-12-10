<?php

$players = get_object_vars($stats->players);
usort($players, array(&$teamdata, 'sort_players_by_apps'));

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
      <th colspan="2" scope="col"><a href="<?php echo get_term_link($season->slug, 'season') . $comp->slug . '/'; ?>" title="<?php echo $comp->name; ?>"><?php echo $comp->name; ?></a></th>
      <?php } else { ?>
      <th colspan="2" scope="col"><?php echo $comp->name; ?></th>
      <?php } ?>
      <?php } ?>
      <th colspan="2" scope="col" >Total</th>
    </tr>
    <tr>
      <?php foreach ($stats->comps as $comp) { ?>
      <th scope="col">Kamper</th>
      <th scope="col">Mål</th>
      <?php } ?>
      <th scope="col">Kamper</th>
      <th scope="col">Mål</th>
    </tr>
  </thead>
  <?php /* TOTALS */ ?>
  <?php $total = get_comp_stats($stats->totals); ?>
  <tfoot class="<?php echo $total->class; ?>">
    <tr>
    <?php if ($total->cards) { ?>
      <th rowspan="2" scope="row"><strong>Totalt</strong></th>
    <?php } else { ?>
      <th scope="row"><strong>Totalt</strong></th>
    <?php } ?>
      <?php foreach ($stats->comps as $comp) { ?>
      <?php $comp = get_comp_stats($comp); ?>
      <td class="apps"><?php echo $comp->apps; ?></td>
      <td class="goals"><?php echo $comp->goals; ?></td>
      <?php } ?>
      <td class="apps"><?php echo $total->apps; ?></td>
      <td class="goals"><?php echo $total->goals; ?></td>
    </tr>
    <?php if ($total->cards) { ?>
    <tr>
       <th></th>
      <?php foreach ($stats->comps as $comp) {  ?>
      <?php $comp = get_comp_stats($comp); ?>
      <td class="cards" colspan="2"><?php echo $comp->cards; ?></td>
      <?php } ?>
      <td class="cards" colspan="2"><?php echo $total->cards; ?></td>
    </tr>
    <?php } ?>
  </tfoot>
  <?php /* PLAYERS */ ?>
  <?php foreach ($players as $p) { ?>
  <?php $total = get_player_stats($p); ?>
  <tbody class="<?php echo $total->class; ?>">
    <tr>
      <?php if ($total->cards) { ?>
      <th rowspan="2" scope="row"><a href="<?php echo get_permalink($p->ID); ?>"><?php echo $p->name; ?></a></th>
      <?php } else { ?>
      <th scope="row"><a href="<?php echo get_permalink($p->ID); ?>"><?php echo $p->name; ?></a></th>
      <?php } ?>
      <?php foreach ($stats->comps as $comp) { ?>
      <?php $comp = get_player_stats($p->comp->{$comp->competition_id}); ?>
      <td class="apps"><?php echo $comp->apps; ?></td>
      <td class="goals"><?php echo $comp->goals; ?></td>
      <?php } ?>
      <td class="apps"><?php echo $total->apps; ?></td>
      <td class="goals"><?php echo $total->goals; ?></td>
    </tr>
    <?php if ($total->cards) { ?>
    <tr>
      <?php foreach ($stats->comps as $comp) {  ?>
      <?php $comp = get_player_stats($p->comp->{$comp->competition_id}); ?>
      <td class="cards" colspan="2"><?php echo $comp->cards; ?></td>
      <?php } ?>
      <td class="cards" colspan="2"><?php echo $total->cards; ?></td>
    </tr>
    <?php } ?>
  </tbody>
  <?php } ?>
</table>
