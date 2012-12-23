<?php if ($seasons) { ?>
<nav class="index" id="index-seasons">
<h2><?php echo $seasons[count($seasons)-1]->name; ?>&mdash;<?php echo $seasons[0]->name; ?></h2>
	<ul>
  <?php foreach ($seasons as $season) { ?>
  <li><a href="<?php echo $season->link; ?>"><strong><?php echo $season->name; ?></strong></a></li>
  <?php } ?>
	</ul>
</nav>
<?php } ?>
