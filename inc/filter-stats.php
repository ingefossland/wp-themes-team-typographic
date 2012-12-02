<nav id="filter">
	<h2><?php single_term_title(); ?></h2>
  <ul>
    <li><a href="<?php echo $s->link; ?>">Alle</a></li>
    <?php foreach ($comps as $c) { ?>
		    <li><a href="<?php echo get_term_link($season->slug, 'season') . $c->slug . '/'; ?>"><?php echo $c->name; ?></a></li>
    <?php } ?>
  </ul>

	<form action="#">
    	<p><input type="text" /></p>
    </form>
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
