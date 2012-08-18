<?php if ($results) { ?>

	<div class="resfix">
    
    <h2>Latest results</h2>
    
    <ul>

    <?php foreach ($results as $match) { ?>

      <?php if ($match->match_status == "FT") { ?>
      <li><a href="<?php echo get_permalink($match->match_id); ?>"><span class"comp"><?php echo $match->competition->name; ?></span> <span class="date"><?php echo date("d.m.Y", strtotime($match->match_date)); ?></span> <span class="opponent"><?php echo $match->hometeam->name; ?> <span class="result"><?php echo $match->result; ?></span> <?php echo $match->awayteam->name; ?></span></a></li>
      <?php } else { ?>
      <li><em><span class"comp"><?php echo $match->competition->name; ?></span> <span class="date"><?php echo date("d.m.Y", strtotime($match->match_date)); ?></span> <span class="opponent"><?php echo $match->hometeam->name; ?> &ndash; <?php echo $match->awayteam->name; ?></span></em></li>
      <?php } ?>
	
    <?php } ?>
    
    </ul>

</div>

<?php } ?>