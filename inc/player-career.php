<table class="stats" id="player-stats">
  <caption>Karriere i Brann</caption>
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
      <th scope="col" class="apps"><span>Apps</span></th>
      <th scope="col" class="goals"><span>Gls</span></th>
      <?php } ?>
      <th scope="col" class="total apps"><span>Apps</span></th>
      <th scope="col" class="total goals"><span>Gls</span></th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th scope="row"><strong>Total</strong></th>
      <?php foreach ($stats->comps as $comp) {  ?>
      <?php $comp = get_player_stats($stats->players->{$player_id}->comp->{$comp->competition_id}); ?>
      <td class="apps"><span><?php echo $comp->apps; ?></span></td>
      <td class="goals"><span><?php echo $comp->goals; ?></span></td>
      <?php } ?>
      <?php $total = get_player_stats($stats->players->{$player_id}); ?>
      <td class="apps"><span><?php echo $total->apps; ?></span></td>
      <td class="goals"><span><?php echo $total->goals; ?></span></td>
    </tr>
    <tr class="average">
      <th scope="row"><strong>Goal average</strong></th>
      <?php foreach ($stats->comps as $comp) {  ?>
      <?php $comp = get_player_stats($stats->players->{$player_id}->comp->{$comp->competition_id}); ?>
      <td colspan="2"><span><?php echo $comp->goal_average; ?></span></td>
      <?php } ?>
      <?php $total = get_player_stats($stats->players->{$player_id}); ?>
      <td colspan="2"><span><?php echo $total->goal_average; ?></span></td>
    </tr>
  </tfoot>
  <tbody>
    <?php foreach ($stats->seasons as $season) { ?>
    <tr>
      <th scope="row"><a href="<?php echo get_term_link($season->slug, 'season'); ?>"><?php echo $season->name; ?></a></th>
      <?php foreach ($stats->comps as $comp) { ?>
      <?php $comp = get_player_stats($stats->players->{$player_id}->season->{$season->season_id}->comp->{$comp->competition_id}); ?>
      <td class="apps"><span><?php echo $comp->apps; ?></span></td>
      <td class="goals"><span><?php echo $comp->goals; ?></span></td>
      <?php } ?>
      <?php $season = get_player_stats($stats->players->{$player_id}->season->{$season->season_id}); ?>
      <td class="apps"><span><?php echo $season->apps; ?></span></td>
      <td class="goals"><span><?php echo $season->goals; ?></span></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
