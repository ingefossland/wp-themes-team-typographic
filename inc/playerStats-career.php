<table class="playerStats" id="playerStats-career">
  <caption>
  Karriere i Brann
  </caption>
  <thead>
    <tr>
      <th rowspan="2"></th>
      <?php foreach ($stats->comps as $comp) { ?>
      <th colspan="2" scope="col"><?php echo $comp->name; ?></th>
      <?php } ?>
      <th colspan="2" scope="col">Total</th>
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
  <?php $total = get_player_stats($stats->players->{$player_id}); ?>
  <tfoot class="<?php echo $total->class; ?>">
    <tr>
    <?php if ($total->cards && $total->goals) { ?>
      <th rowspan="3" scope="row"><strong>Totalt</strong></th>
    <?php } else if ($total->cards || $total->goals) { ?>
      <th rowspan="2" scope="row"><strong>Totalt</strong></th>
    <?php } else { ?>
      <th scope="row"><strong>Totalt</strong></th>
    <?php } ?>
      <?php foreach ($stats->comps as $comp) {  ?>
      <?php $comp = get_player_stats($stats->players->{$player_id}->comp->{$comp->competition_id}); ?>
      <td class="apps"><?php echo $comp->apps; ?></td>
      <td class="goals"><?php echo $comp->goals; ?></td>
      <?php } ?>
      <td class="apps"><?php echo $total->apps; ?></td>
      <td class="goals"><?php echo $total->goals; ?></td>
    </tr>
    <?php if ($total->cards) { ?>
    <tr>
      <?php foreach ($stats->comps as $comp) {  ?>
      <?php $comp = get_player_stats($stats->players->{$player_id}->comp->{$comp->competition_id}); ?>
      <td colspan="2" class="cards"><?php echo $comp->cards; ?></td>
      <?php } ?>
      <td colspan="2" class="cards"><?php echo $total->cards; ?></td>
    </tr>
    <?php } ?>
    <?php if ($total->goals) { ?>
    <tr>
      <?php foreach ($stats->comps as $comp) {  ?>
      <?php $comp = get_player_stats($stats->players->{$player_id}->comp->{$comp->competition_id}); ?>
      <td colspan="2" class="average"><?php echo $comp->goal_average; ?></td>
      <?php } ?>
      <td colspan="2" class="average"><?php echo $total->goal_average; ?></td>
    </tr>
    <?php } ?>
  </tfoot>
  <?php foreach ($stats->seasons as $season) { ?>
  <?php $total = get_player_stats($stats->players->{$player_id}->season->{$season->season_id}); ?>
  <tbody class="<?php echo $total->class; ?>">
    <tr>
      <th rowspan="2" scope="row"><a href="<?php echo get_term_link($season->slug, 'season'); ?>"><?php echo $season->name; ?></a></th>
      <?php foreach ($stats->comps as $comp) { ?>
      <?php $comp = get_player_stats($stats->players->{$player_id}->season->{$season->season_id}->comp->{$comp->competition_id}); ?>
      <td class="apps"><?php echo $comp->apps; ?></td>
      <td class="goals"><?php echo $comp->goals; ?></td>
      <?php } ?>
      <td class="apps"><?php echo $total->apps; ?></td>
      <td class="goals"><?php echo $total->goals; ?></td>
    </tr>
    <?php if ($total->cards) { ?>
    <tr>
      <?php foreach ($stats->comps as $comp) {  ?>
      <?php $comp = get_player_stats($stats->players->{$player_id}->season->{$season->season_id}->comp->{$comp->competition_id}); ?>
      <td colspan="2" class="cards"><?php echo $comp->cards; ?></td>
      <?php } ?>
      <td colspan="2" class="cards"><?php echo $total->cards; ?></td>
    </tr>
    <?php } ?>
  </tbody>
  <?php } ?>
</table>
