<table class="teamStats">
<caption>Kampstatistikk</caption>
  <thead>
    <tr>
      <td scope="col" class="comp"></td>
      <th scope="col" class="pld" title="Kamper">K</th>
      <th scope="col" class="win" title="Vunnet"><span>V</span></th>
      <th scope="col" class="draw" title="Uavgjort"><span>U</span></th>
      <th scope="col" class="loss" title="Tapt"><span>T</span></th>
      <th scope="col" class="gdf" title="Målforskjell"><span>+/-</span></th>
      <th scope="col" class="gdf"><span></span></th>
    </tr>
    <tr>
      <?php $stats->totals->win_pct = round(($stats->totals->totalWins) / ($stats->totals->totalApps) * 100, 0); ?>
      <?php $stats->totals->draw_pct = round(($stats->totals->totalDraws) / ($stats->totals->totalApps) * 100, 0); ?>
      <?php $stats->totals->loss_pct = round(($stats->totals->totalLosses) / ($stats->totals->totalApps) * 100, 0); ?>
      <td></td>
      <td></td>
      <td><?php echo get_graph($stats->totals->win_pct); ?></td>
      <td><?php echo get_graph($stats->totals->draw_pct); ?></td>
      <td><?php echo get_graph($stats->totals->loss_pct); ?></td>
      <td></td>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($stats->comps as $comp) { ?>
    <?php if ($comp->totalApps) { ?>
    <tr>
      <th scope="row" class="comp"><a href="<?php echo get_term_link($comp->slug, 'competition'); ?>"><?php echo $comp->name; ?></a></th>
      <td class="pld"><span><?php echo $comp->totalApps; ?></span></td>
      <td class="w"><span><?php echo $comp->totalWins; ?></span></td>
      <td class="d"><span><?php echo $comp->totalDraws; ?></span></td>
      <td class="l"><span><?php echo $comp->totalLosses; ?></span></td>
      <td class="gdf-exp"><span><?php echo $comp->totalGF; ?>&ndash;<?php echo $comp->totalGA; ?></span></td>
      <td class="gdf"><span><?php echo $comp->totalGF-$comp->totalGA; ?></span></td>
    </tr>
    <?php } ?>
    <?php } ?>
  </tbody>
  <tfoot>
  <th><strong>Total</strong></th>
    <td><span><?php echo $stats->totals->totalApps; ?></span></td>
    <td><span><?php echo $stats->totals->totalWins; ?></span></td>
    <td><span><?php echo $stats->totals->totalDraws; ?></span></td>
    <td><span><?php echo $stats->totals->totalLosses; ?></span></td>
    <td><span><?php echo $stats->totals->totalGF; ?>&ndash;<?php echo $stats->totals->totalGA; ?></span></td>
    <td><span><?php echo $stats->totals->totalGF-$stats->totals->totalGA; ?></span></td>
</tfoot>
</table>
