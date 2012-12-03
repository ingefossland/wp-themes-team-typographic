<table class="playerStats" id="playerStats-career">
<caption>Karriere i Brann</caption>
  <thead>
    <tr>
      <td rowspan="2" class="season"></td>
      <?php foreach ($stats->comps as $comp) { ?>
	      <th colspan="2" scope="col" class="comp"><?php echo $comp->name; ?></th>
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
  <tbody>
    <?php foreach ($stats->seasons as $season) { ?>
    <?php $total = get_player_stats($stats->players->{$player_id}->season->{$season->season_id}); ?>
    <?php if ($total->goals > 0) { $class = 'goalscorer'; } else { $class = ''; } ?>
    <tr class="<?php echo $class; ?>">
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
      <td class="apps"><span><?php echo $total->apps; ?></span></td>
      <?php if ($total->goals > 0) { ?>
      <td class="goals"><span><?php echo $total->goals; ?></span></td>
      <?php } else { ?>
	  <td class="goals"></td>
      <?php } ?>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <?php $total = get_player_stats($stats->players->{$player_id}); ?>
    <?php if ($total->goals > 0) { $class = 'goalscorer'; } else { $class = ''; } ?>
    <tr class="<?php echo $class; ?>">
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
      <td class="apps"><span><?php echo $total->apps; ?></span></td>
      <?php if ($total->goals > 0) { ?>
      <td class="goals"><span><?php echo $total->goals; ?></span></td>
      <?php } else { ?>
	  <td class="goals"></td>
      <?php } ?>
    </tr>
    <?php if ($total->goals > 0) { ?>
    <tr>
      <th scope="row"></th>
      <?php foreach ($stats->comps as $comp) {  ?>
	      <?php $comp = get_player_stats($stats->players->{$player_id}->comp->{$comp->competition_id}); ?>
	      <?php if ($comp->goals > 0) { ?>
	      <td class="average" colspan="2"><span><?php echo $comp->goal_average; ?></span></td>
	      <?php } else { ?>
	      <td colspan="2"></td>
	      <?php } ?>
      <?php } ?>
      <?php $total = get_player_stats($stats->players->{$player_id}); ?>
      <td class="average" colspan="2"><span><?php echo $total->goal_average; ?></span></td>
    </tr>
    <?php } ?>
  </tfoot>
</table>
