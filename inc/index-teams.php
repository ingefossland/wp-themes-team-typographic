<?php if ($index) { ?>

	<div class="index">

    <?php foreach ($index as $item) { ?>

	  <?php $letter = utf8_encode(substr(utf8_decode($item->name),0,1));	?>

		<?php if ($letter && $letter != $last_letter) { ?>
			</ul>
        <?php } ?>
    
    	<?php if ($letter != $last_letter) { ?>
			<h2><?php echo $letter; ?></h2>
			<ul>
    	<?php } ?>
   
      <li><a href="<?php echo get_permalink($item->ID); ?>"><strong><?php echo $item->name; ?></strong></a></li>

		<?php $last_letter = $letter; ?>

    <?php } ?>

	</ul>

</div>

<?php } ?>