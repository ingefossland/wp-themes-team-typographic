<?php if ($seasons) { ?>
<nav class="index" id="index-seasons">
  <?php foreach ($seasons as $season) { ?>
  <h2><?php echo $season->name; ?></h2>
  <ul>
    <li><a href="<?php echo $season->link; ?>#matches"><strong>Kamper</strong></a></li>
    <li><a href="<?php echo $season->link; ?>#players"><strong>Spillere</strong></a></li>
    <li><a href="<?php echo $season->link; ?>#goals"><strong>Mål</strong></a></li>
  </ul>
  <?php } ?>
</nav>
<?php } ?>
