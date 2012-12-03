<?php

global $post, $teamdata;

$index = $teamdata->get_teams();

?>
<nav id="filter">

<form action="#">
	<p><input type="text" class="search" placeholder="Finn spiller" /></p>
</form>

<?php if ($index) { ?>

	<ul class="index">
    <?php foreach ($index as $item) { ?>
      <li><a href="<?php echo get_permalink($item->ID); ?>"><?php echo $item->name; ?></a></li>
    <?php } ?>
	</ul>

<?php } ?>

</nav>
