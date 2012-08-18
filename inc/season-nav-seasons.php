<?php if ($seasons) { ?>
<nav>
<ul>
<?php foreach ($seasons as $season) { ?>
	<?php if ($season->season_id == $season_id) { ?>
	<li><strong><?php echo $season->name; ?></strong></li>
	<?php } else { ?>
	<li><a href="<?php echo $season->link; ?>"><?php echo $season->name; ?></a></li>
	<?php } ?>
<?php } ?>
</ul>
</nav>
<?php } ?>