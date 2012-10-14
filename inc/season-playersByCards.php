<?php

	function sortByApps($a, $b) {
		if ($a->totalApps < $b->totalApps) { return 1; }
		if ($a->totalApps > $b->totalApps) { return -1; }
		return 0;
	}
	
	$players = get_object_vars($stats->players);
	usort($players, sortByApps);

?>

<?php if ($players) { ?>

<h2>Kamper</h2>

<ul>

<?php foreach ($players as $p) { ?>
	<?php if ($p->totalApps < 1) { continue; } ?>

	<li><a href="<?php echo $p->link; ?>"><?php echo $p->name; ?></a> <?php echo $p->totalApps; ?> (<?php echo $p->totalAppsStart; ?>+<?php echo $p->totalAppsSub; ?>)</li>

<?php } ?>

</ul>

<?php } ?>