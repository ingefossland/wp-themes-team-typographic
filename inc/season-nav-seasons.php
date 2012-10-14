<?php if ($seasons && !$season_id) { ?>
<nav>
<ul>
<?php foreach ($seasons as $s) { ?>
	<?php if ($s->season_id == $season_id) { ?>
	<li><strong><?php echo $s->name; ?></strong></li>
	<?php } else { ?>
	<li><a href="<?php echo $s->link; ?>"><?php echo $s->name; ?></a></li>
	<?php } ?>
<?php } ?>
</ul>
</nav>
<?php } ?>