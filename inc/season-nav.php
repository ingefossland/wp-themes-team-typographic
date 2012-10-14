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

<?php if ($stats->comps && !$competition_id) { ?>
<nav>
  <ul>
    <li><a href="<?php echo get_term_link($season->slug, 'season'); ?>">All competitions</a></li>
    <?php foreach ($stats->comps as $c) { ?>
    <?php if ($c->totalApps > 0) { ?>
    	<?php if ($competition_id == $c->term_id) { ?>
		    <li><strong><?php echo $c->name; ?></strong></li>
		<?php } else { ?>
		    <li><a href="<?php echo get_term_link($season->slug, 'season') . $c->slug . '/'; ?>"><?php echo $c->name; ?></a></li>
	    <?php } ?>
    <?php } ?>
    <?php } ?>
  </ul>
</nav>
<?php } ?>
