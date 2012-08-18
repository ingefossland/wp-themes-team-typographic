<?php if ($stats->seasons->{$season_id}->comp->{$league_id}->totalApps > 0) { ?>

<table width="100%" class="stats" id="monthly">
    <caption>League performance</caption>
    <thead>
      <tr>
        <td sope="col" class="title" rowspan="2"></td>
        <?php foreach ($stats->seasons->{$season_id}->comp->{$league_id}->month as $month) { ?>
          <?php $month = get_team_stats($month); ?>
        <th scope="col" class="month"><strong><?php echo $month->shortname; ?></strong></th>
        <?php } ?>
          <?php $league = get_team_stats($stats->comps->{$league_id}); ?>
        <th scope="col" class="total"><strong>Total</strong></th>
      </tr>
    
      <tr>
        <?php foreach ($stats->seasons->{$season_id}->comp->{$league_id}->month as $month) { ?>
          <td><?php echo get_graph($month->pts_pct); ?></td>
        <?php } ?>
        <td><?php echo get_graph($league->pts_pct); ?></td>
      </tr>
    </thead>
    <tbody>
      <tr class="pts">
        <th><strong>Team pts</strong></th>
        <?php foreach ($stats->seasons->{$season_id}->comp->{$league_id}->month as $month) { ?>
        <td class="month"><span><?php echo $month->pts; ?></span></td>
        <?php } ?>
        <td class="total"><span><?php echo $league->pts; ?></span></td>
      </tr>
      <tr class="gf">
        <th><strong>Avg goals scored</strong></th>
        <?php foreach ($stats->seasons->{$season_id}->comp->{$league_id}->month as $month) { ?>
        <td class="month"><span><?php echo $month->average_gf; ?></span></td>
        <?php } ?>
        <td class="total"><span><?php echo $league->average_gf; ?></span></td>
      </tr>
      <tr class="ga">
        <th><strong>Avg goals conceded</strong></th>
        <?php foreach ($stats->seasons->{$season_id}->comp->{$league_id}->month as $month) { ?>
        <td class="month"><span><?php echo $month->average_ga; ?></span></td>
        <?php } ?>
        <td class="total"><span><?php echo $league->average_ga; ?></span></td>
      </tr>
    </tbody>
</table>

<?php } ?>