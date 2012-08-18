<?php if ($stats->totals->totalApps > 0) { ?>
<table class="stats" id="matrix">
<caption>Results and fixtures</caption>
  <thead>
    <tr>
      <td rowspan="2" class="match"></td>
      <?php foreach ($stats->players as $player) { ?>
        <?php $player = get_player_stats($player); ?>
      <th scope="col" class="player"><a href="<?php echo get_permalink($player->ID); ?>" title="<?php echo $player->name; ?> (<?php echo $player->totalApps; ?> apps, <?php echo $player->totalGoals; ?> goals)"><?php echo $player->initials; ?></a>
        </td>
        <?php } ?>
    </tr>
    <tr class="graph">
      <?php foreach ($stats->players as $player) { ?>
      <?php $player->apps_pct = round(($player->totalApps) / ($stats->totals->totalApps) * 100, 0); ?>
          <td><?php echo get_graph($player->apps_pct); ?></td>
      <?php } ?>
    </tr>
    </thead>
 <tbody>    
    <tr id="apps">
      <th scope="row"><strong>Apps</strong></th>
      <?php foreach ($stats->players as $player) { ?>
      <td><span><?php echo $player->apps; ?></span></td>
      <?php } ?>
    </tr>
    <tr id="goals">
      <th scope="row"><strong>Goals</strong></th>
      <?php foreach ($stats->players as $player) { ?>
      <td><span><?php echo $player->goals; ?></span></td>
      <?php } ?>
    </tr>
    <tr id="goalAvg">
      <th scope="row"><strong>Goal average</strong></th>
      <?php foreach ($stats->players as $player) { ?>
      <td><span><?php echo $player->goal_average; ?></span></td>
      <?php } ?>
    </tr>
    <tr id="cards">
      <th scope="row"><strong>Cards (Y/R)</strong></th>
      <?php foreach ($stats->players as $player) { ?>
      <td><span><?php echo $player->cards; ?></span></td>
      <?php } ?>
    </tr>
  </tbody>
  <tbody>
    <?php foreach ($stats->matches as $match) { ?>
    <tr>
      <?php if ($match->match_status == "FT") { ?>
      <th class="match"><a href="<?php echo get_permalink($match->match_id); ?>"><span class="date"><?php echo date("d.m.Y", strtotime($match->match_date)); ?></span> <span class="opponent"><?php echo $match->team->opponent->name; ?></span> <span class="ground">(<?php echo $match->team->ground_code; ?>)</span> <span class"comp"><?php echo strtoupper($match->competition->slug); ?></span> <span class="result"><span class="code"><?php echo strtoupper($match->team->result_code); ?></span> <?php echo $match->team->result; ?></span></a></th>
      <?php } else { ?>
      <th class="match"><strong><span class="date"><?php echo date("d.m.Y", strtotime($match->match_date)); ?></span> <span class="opponent"><?php echo $match->team->opponent->name; ?></span> <span class="ground">(<?php echo $match->team->ground_code; ?>)</span> <span class"comp"><?php echo strtoupper($match->competition->slug); ?></span> <span class="time"><?php echo date("H:i", strtotime($match->match_date)); ?></span></strong></th>
      </td>
      <?php } ?>
      <?php foreach ($stats->players as $player) { ?>
      	  <?php	if (isset($player->matches->{$match->match_id})) { ?>
	      <td class="on"><?php echo get_match_player($player->matches->{$match->match_id}); ?></td>
		  <?php } else { ?>
          <td>&nbsp;</td>
          <?php } ?>
      <?php } ?>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php } ?>
