<?php

$players = get_object_vars($stats->players);
usort($players, sort_players_by_apps);

?>

<table class="playerStats" id="playerStats-competition">
<caption>Spillerstatistikk</caption>
  <thead>
  	<tr>
      <th rowspan="2"></th>
      <th colspan="3"><?php echo $competition->name; ?></th>
    </tr>
  	<tr>
      <th scope="col">Kamper</th>
      <th scope="col">Mål</th>
      <th scope="col">Kort</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($players as $p) { ?>
    <?php $total = get_player_stats($p); ?>
    <?php if ($total->goals > 0) { $class = 'goalscorer'; } else { $class = ''; } ?>
    <tr class="<?php echo $class; ?>">
      <th scope="row"><a href="<?php echo get_permalink($p->ID); ?>" title="<?php echo $p->name; ?>"><span><?php echo $p->initials; ?></span></a></th>
      <td class="apps"><span><?php echo $total->apps; ?></span></td>
      <?php if ($total->goals > 0) { ?>
      <td class="goals"><span><?php echo $total->goals; ?></span></td>
      <?php } else { ?>
	  <td class="goals"></td>
      <?php } ?>
      <?php if ($total->cards > 0) { ?>
      <td class="cards">
	    <?php if ($total->totalRC > 0) { ?>
    	  	<span class="rc"><?php echo $total->totalRC; ?></span>
        <?php } ?>
	    <?php if ($total->totalYC > 0) { ?>
	      	<span class="yc"><?php echo $total->totalYC; ?></span>
        <?php } ?>
      <?php } else { ?>
	  <td class="cards"></td>
      <?php } ?>
    </tr>
    <?php } ?>
  </tbody>
</table>
