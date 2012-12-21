<?php if ($players) { ?>

<div class="index">

    <?php foreach ($players as $item) { ?>

	  <?php $letter = utf8_encode(substr(utf8_decode($item->name_last),0,1));	?>

		<?php if ($letter && $letter != $last_letter) { ?>
			</ul>
        <?php } ?>
    
    	<?php if ($letter != $last_letter) { ?>
			<h2><?php echo $letter; ?></h2>
			<ul>
    	<?php } ?>
   
      <li><a href="<?php echo get_permalink($item->ID); ?>"><?php echo $item->name_first; ?> <strong><?php echo $item->name_last; ?></strong></a></li>

		<?php $last_letter = $letter; ?>

    <?php } ?>

	</ul>

</div>

<?php } ?>