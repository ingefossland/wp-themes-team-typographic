<?php

$players = get_object_vars($stats->players);
usort($players, array(&$teamdata, 'sort_players_by_goals'));

$max_goals = 0;

?>

<table class="playerStats" id="playerStats-goals">
  <caption>
  Mål
  </caption>
  <tbody>
    <?php foreach ($players as $p) { ?>
	<?php if ($p->totalGoals < 1) { continue; } ?>
	<?php if ($max_goals < 1) { $max_goals = $p->totalGoals; } ?>
    <?php $total = get_player_stats($p); ?>
    <tr>
      <th scope="row"><a href="<?php echo get_permalink($p->ID); ?>"><?php echo $p->name; ?></a></th>
      <td class="goals"><?php echo $p->totalGoals; ?></span></td>
      <td class="graph">
	      <span class="bar multiple">
	      <?php foreach ($stats->comps as $comp) { ?>
	      <?php echo get_goalscorer_graph($max_goals, $p->comp->{$comp->competition_id}->totalGoals); ?>
	      <?php } ?>
	      </span>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
