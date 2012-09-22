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

	<li><?php echo $p->name; ?> <?php echo $p->totalGoals; ?></li>

<?php } ?>

</ul>

<?php } ?>