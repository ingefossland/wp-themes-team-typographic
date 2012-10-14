<?php

	function sortByGoals($a, $b) {
		if ($a->totalGoals < $b->totalGoals) { return 1; }
		if ($a->totalGoals > $b->totalGoals) { return -1; }
		return 0;
	}
	
	$players = get_object_vars($stats->players);
	usort($players, sortByGoals);

?>

<?php if ($players) { ?>

<h2>Goalscorers</h2>

<ul>

<?php foreach ($players as $p) { ?>
	<?php if ($p->totalGoals < 1) { continue; } ?>

	<li><a href="<?php echo get_permalink($p->ID); ?>"><?php echo $p->name; ?></a> <?php echo $p->totalGoals; ?></li>

<?php } ?>

</ul>

<?php } ?>