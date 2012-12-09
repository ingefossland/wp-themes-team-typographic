<?php if ($stats->matches) { ?>

<section class="resfix">

    <h2>Kamper</h2>

    <?php foreach ($stats->matches as $match) { ?>

		<?php if ($season && $season != $match->season) { ?>
			</ul>
        <?php } ?>
    
    	<?php if ($season != $match->season) { ?>
			<h3><?php echo $match->season->name; ?></h3>
			<ul>
    	<?php } ?>
    
      <?php if ($match->match_status == "FT") { ?>
      <li><a href="<?php echo get_permalink($match->match_id); ?>"><em><?php echo $match->competition->name; ?> <?php echo date("d.m.Y", strtotime($match->match_date)); ?></em> <strong><span class="home"><?php echo $match->hometeam->name; ?></span> <span class="result"><?php echo $match->result; ?></span> <span class="away"><?php echo $match->awayteam->name; ?></span></strong></a></li>
      <?php } else { ?>
      <li><em><?php echo $match->competition->name; ?> <?php echo date("d.m.Y", strtotime($match->match_date)); ?></em> <strong><span class="home"><?php echo $match->hometeam->name; ?></span> <span class="result"><?php echo $match->result; ?></span> <span class="away"><?php echo $match->awayteam->name; ?></span></strong></li>
      <?php } ?>

		<?php $season = $match->season; ?>

    <?php } ?>

</ul>

</section>

<?php } ?>