<?php

global $post, $teamdata;

$index = $teamdata->get_players();

?>
<nav id="filter">

<form action="#">
	<p><input type="text" class="search" placeholder="Finn spiller" /></p>
</form>

<?php if ($index) { ?>

	<ul class="index">
    <?php foreach ($index as $item) { ?>
      <li><a href="<?php echo get_permalink($item->ID); ?>"><?php echo $item->name_first; ?> <strong><?php echo $item->name_last; ?></strong></a></li>
    <?php } ?>
	</ul>


<?php } ?>



</nav>
