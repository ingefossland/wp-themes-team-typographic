<table class="playerStats" id="playerStats-career">
  <caption>
  Karriere i Brann
  </caption>
  <thead>
    <tr>
      <th rowspan="2"></th>
      <?php foreach ($stats->comps as $comp) { ?>
      <th colspan="3" scope="col"><?php echo $comp->name; ?></th>
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
  <tfoot>
    <?php $total = get_player_stats($stats->players->{$player_id}); ?>
    <tr class="<?php echo $total->class; ?>">
      <th scope="row"><strong>Totalt</strong></th>
      <?php foreach ($stats->comps as $comp) {  ?>
      <?php $comp = get_player_stats($stats->players->{$player_id}->comp->{$comp->competition_id}); ?>
      <td class="apps"><?php echo $comp->apps; ?></td>
      <td class="goals"><?php echo $comp->goals; ?></td>
      <td class="cards"><?php echo $comp->cards; ?></td>
      <?php } ?>
      <td class="apps"><?php echo $total->apps; ?></td>
      <td class="goals"><?php echo $total->goals; ?></td>
      <td class="cards"><?php echo $total->cards; ?></td>
    </tr>
    <?php if ($total->totalGoals > 0) { ?>
    <tr>
      <th scope="row"></th>
      <?php foreach ($stats->comps as $comp) {  ?>
      <?php $comp = get_player_stats($stats->players->{$player_id}->comp->{$comp->competition_id}); ?>
      <td class="average" colspan="2"><?php echo $comp->goal_average; ?></td>
      <td></td>
      <?php } ?>
      <?php $total = get_player_stats($stats->players->{$player_id}); ?>
      <td class="average" colspan="2"><?php echo $total->goal_average; ?></td>
      <td></td>
    </tr>
    <?php } ?>
  </tfoot>
  <tbody>
    <?php foreach ($stats->seasons as $season) { ?>
    <?php $total = get_player_stats($stats->players->{$player_id}->season->{$season->season_id}); ?>
    <tr class="<?php echo $total->class; ?>">
      <th scope="row"><a href="<?php echo get_term_link($season->slug, 'season'); ?>"><?php echo $season->name; ?></a></th>
      <?php foreach ($stats->comps as $comp) { ?>
      <?php $comp = get_player_stats($stats->players->{$player_id}->season->{$season->season_id}->comp->{$comp->competition_id}); ?>
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
