<table class="teamStats">
<caption>Kampstatistikk</caption>
  <thead>
    <tr>
      <th></th>
      <th></th>
      <th scope="col" class="w" title="Vunnet"><span>V</span></th>
      <th scope="col" class="d" title="Uavgjort"><span>U</span></th>
      <th scope="col" class="l" title="Tapt"><span>T</span></th>
      <th></th>
      <th></th>
    </tr>
    <tr>
      <?php $stats->totals->win_pct = round(($stats->totals->totalWins) / ($stats->totals->totalApps) * 100, 0); ?>
      <?php $stats->totals->draw_pct = round(($stats->totals->totalDraws) / ($stats->totals->totalApps) * 100, 0); ?>
      <?php $stats->totals->loss_pct = round(($stats->totals->totalLosses) / ($stats->totals->totalApps) * 100, 0); ?>
      <th></th>
      <th scope="col" class="pld" title="Kamper"><span>K</span></th>
      <td><?php echo get_graph($stats->totals->win_pct); ?></td>
      <td><?php echo get_graph($stats->totals->draw_pct); ?></td>
      <td><?php echo get_graph($stats->totals->loss_pct); ?></td>
      <th></th>
      <th scope="col" class="gdf" title="Målforskjell">+/-</th>
    </tr>
  </thead>
	<?php if (!$competition_id) { ?>
  <tbody>
    <?php foreach ($stats->comps as $comp) { ?>
    <?php if ($comp->totalApps) { ?>
    <?php $gdf = $comp->totalGF-$comp->totalGA; ?>
    <tr>
    	<?php if ($season_id) { ?>
      <th scope="row"><a href="<?php echo get_term_link($season->slug, 'season') . $comp->slug . '/'; ?>"><?php echo $comp->name; ?></a></th>
		<?php } else { ?>
         <th scope="row"><?php echo $comp->name; ?></th>
	     <?php } ?>
      <td><span><?php echo $comp->totalApps; ?></span></td>
      <td><span><?php echo $comp->totalWins; ?></span></td>
      <td><span><?php echo $comp->totalDraws; ?></span></td>
      <td><span><?php echo $comp->totalLosses; ?></span></td>
      <td><span><?php if ($gdf > 0) { echo '+'; } ?><?php echo $gdf; ?></span></td>
      <td><span><?php echo $comp->totalGF; ?>&ndash;<?php echo $comp->totalGA; ?></span></td>
    </tr>
    <?php } ?>
    <?php } ?>
  </tbody>
   <?php } ?>
  <tfoot>
  <th><strong>Total</strong></th>
    <?php $gdf = $stats->totals->totalGF-$stats->totals->totalGA; ?>
    <td><span><?php echo $stats->totals->totalApps; ?></span></td>
    <td><span><?php echo $stats->totals->totalWins; ?></span></td>
    <td><span><?php echo $stats->totals->totalDraws; ?></span></td>
    <td><span><?php echo $stats->totals->totalLosses; ?></span></td>
    <td><span><?php if ($gdf > 0) { echo '+'; } ?><?php echo $gdf; ?></span></td>
    <td><span><?php echo $stats->totals->totalGF; ?>&ndash;<?php echo $stats->totals->totalGA; ?></span></td>
</tfoot>
</table>
