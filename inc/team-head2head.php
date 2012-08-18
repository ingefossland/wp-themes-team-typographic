<table class="stats" id="head2head">
  <caption>
  <?php echo $team->name; ?> v <?php echo $opponent->name; ?>
  </caption>
  <thead>
    <tr>
      <td scope="col" class="comp" rowspan="2"></td>
      <th scope="col" class="pld" rowspan="2"><span>pld</span></th>
      <th scope="col" class="win"><strong>Win</strong></th>
      <th scope="col" class="draw"><strong>Draw</strong></th>
      <th scope="col" class="loss"><strong>Loss</strong></th>
      <th scope="col" class="gdf" rowspan="2"><span>gdf</span></th>
      <th scope="col" class="gdf" rowspan="2"><span>+/-</span></th>
    </tr>
    <tr>
      <?php $stats->totals->win_pct = round(($stats->totals->totalWins) / ($stats->totals->totalApps) * 100, 0); ?>
      <?php $stats->totals->draw_pct = round(($stats->totals->totalDraws) / ($stats->totals->totalApps) * 100, 0); ?>
      <?php $stats->totals->loss_pct = round(($stats->totals->totalLosses) / ($stats->totals->totalApps) * 100, 0); ?>
      <td><?php echo get_graph($stats->totals->win_pct); ?></td>
      <td><?php echo get_graph($stats->totals->draw_pct); ?></td>
      <td><?php echo get_graph($stats->totals->loss_pct); ?></td>
    </tr>
  </thead>
  <tfoot>
  <th><strong>Total</strong></th>
    <td><span><?php echo $stats->totals->totalApps; ?></span></td>
    <td><span><?php echo $stats->totals->totalWins; ?></span></td>
    <td><span><?php echo $stats->totals->totalDraws; ?></span></td>
    <td><span><?php echo $stats->totals->totalLosses; ?></span></td>
    <td><span><?php echo $stats->totals->totalGF; ?>&ndash;<?php echo $stats->totals->totalGA; ?></span></td>
    <td><span><?php echo $stats->totals->totalGF-$stats->totals->totalGA; ?></span></td>
    </tfoot>
  <tbody>
    <?php foreach ($stats->comps as $comp) { ?>
    <?php if ($comp->totalApps) { ?>
    <tr>
      <th scope="row" class="comp"><a href="<?php echo get_term_link($comp->slug, 'competition'); ?>"><?php echo $comp->name; ?></a></th>
      <td><span><?php echo $comp->totalApps; ?></span></td>
      <td><span><?php echo $comp->totalWins; ?></span></td>
      <td><span><?php echo $comp->totalDraws; ?></span></td>
      <td><span><?php echo $comp->totalLosses; ?></span></td>
      <td><span><?php echo $comp->totalGF; ?>&ndash;<?php echo $comp->totalGA; ?></span></td>
      <td><span><?php echo $comp->totalGF-$comp->totalGA; ?></span></td>
    </tr>
    <?php } ?>
    <?php } ?>
  </tbody>
</table>
