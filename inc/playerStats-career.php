<table class="player-stats" id="career">
  <thead>
    <tr>
      <td rowspan="2" class="season"></td>
      <?php foreach ($stats->comps as $comp) { ?>
	      <th colspan="2" scope="col" class="comp"><a href="<?php echo $comp->link; ?>"><?php echo $comp->name; ?></a></th>
      <?php } ?>
      <th colspan="2" scope="col" class="total comp"><span>Alle</span></th>
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
  <tfoot>
    <tr>
      <th scope="row"><strong>Totalt</strong></th>
      <?php foreach ($stats->comps as $comp) {  ?>
	      <?php $comp = get_player_stats($stats->players->{$player_id}->comp->{$comp->competition_id}); ?>
	      <td class="apps"><span><?php echo $comp->apps; ?></span></td>
	      <?php if ($comp->goals > 0) { ?>
	      <td class="goals"><span><?php echo $comp->goals; ?></span></td>
	      <?php } else { ?>
	      <td class="goals"></td>
	      <?php } ?>
      <?php } ?>
      <?php $total = get_player_stats($stats->players->{$player_id}); ?>
      <td class="apps"><span><?php echo $total->apps; ?></span></td>
      <?php if ($total->goals > 0) { ?>
      <td class="goals"><span><?php echo $total->goals; ?></span></td>
      <?php } else { ?>
	  <td class="goals"></td>
      <?php } ?>
    </tr>
    <tr class="average">
      <th scope="row">Gj. snitt</th>
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
	      <?php if ($comp->goals > 0) { ?>
	      <td class="goals"><span><?php echo $comp->goals; ?></span></td>
	      <?php } else { ?>
	      <td class="goals"></td>
	      <?php } ?>
      <?php } ?>
      <?php $total = get_player_stats($stats->players->{$player_id}->season->{$season->season_id}); ?>
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
