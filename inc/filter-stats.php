<nav id="filter">
  <form action="#">
    <p>
      <select onchange="window.location=this.value;">
        <?php foreach ($seasons as $s) { ?>
        <?php if ($s->season_id == $season_id) { ?>
        <option value="<?php echo $s->link; ?>" selected="selected"><?php echo $s->name; ?></option>
        <?php } else { ?>
        <option value="<?php echo $s->link; ?>"><?php echo $s->name; ?></option>
        <?php } ?>
        <?php } ?>
      </select>
    </p>
  </form>
  <ul>
    <li><a href="<?php echo $s->link; ?>">Alle</a></li>
    <?php foreach ($comps as $c) { ?>
    <li><a href="<?php echo get_term_link($season->slug, 'season') . $c->slug . '/'; ?>"><?php echo $c->name; ?></a></li>
    <?php } ?>
  </ul>
</nav>
