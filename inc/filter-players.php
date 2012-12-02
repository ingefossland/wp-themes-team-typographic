<?php

global $post, $teamdata;

$index = $teamdata->get_players();

?>
<nav id="filter">

<form action="#">
	<input type="text" />
</form>

<?php if ($index) { ?>

    <?php foreach ($index as $item) { ?>

	  <?php $letter = utf8_encode(substr(utf8_decode($item->name),0,1));	?>

		<?php if ($letter && $letter != $last_letter) { ?>
			</ul>
        <?php } ?>
    
    	<?php if ($letter != $last_letter) { ?>
			<h2><?php echo $letter; ?></h2>
			<ul>
    	<?php } ?>
   
      <li><a href="<?php echo get_permalink($item->ID); ?>"><?php echo $item->name; ?></a></li>

		<?php $last_letter = $letter; ?>

    <?php } ?>

	</ul>

<?php } ?>

</nav>
