<?php

// get results
$results = $teamdata->get_matches(array(
	'team_id' => $team_id,
	'type' => 'results',
	'limit' => '3'
));

?>
<?php if ($results) { ?>

<section class="resfix">
    
    <h3>Siste resultater</h3>
    
    <ul>

    <?php foreach ($results as $match) { ?>

      <?php if ($match->match_status == "FT") { ?>
      <li><a href="<?php echo get_permalink($match->match_id); ?>"><em><?php echo $match->competition->name; ?> <?php echo date("d.m.Y", strtotime($match->match_date)); ?></em> <strong><span class="home"><?php echo $match->hometeam->name; ?></span> <span class="result"><?php echo $match->result; ?></span> <span class="away"><?php echo $match->awayteam->name; ?></span></strong></a></li>
      <?php } else { ?>
      <li><em><?php echo $match->competition->name; ?> <?php echo date("d.m.Y", strtotime($match->match_date)); ?></em> <strong><span class="home"><?php echo $match->hometeam->name; ?></span> <span class="result"><?php echo $match->result; ?></span> <span class="away"><?php echo $match->awayteam->name; ?></span></strong></li>
      <?php } ?>
	
    <?php } ?>
    
    </ul>

</section>

<?php } ?>