<?php if ($stats->comps) { ?>
<nav>
  <ul>
    <li><a href="?comp=">All competitions</a></li>
    <?php foreach ($stats->comps as $comp) { ?>
    <?php if ($comp->totalApps > 0) { ?>
    <li><a href="?comp=<?php echo $comp->slug; ?>"><?php echo $comp->name; ?></a></li>
    <?php } ?>
    <?php } ?>
  </ul>
</nav>
<?php } ?>
