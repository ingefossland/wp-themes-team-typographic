<?php if ($stats->comps) { ?>
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
