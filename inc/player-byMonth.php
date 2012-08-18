<div class="stats" id="season-leagueByMonth">
  <table width="100%">
  <caption>League performance <?php echo $season->name; ?></caption>
    <thead>
      <tr>
        <th class="season">Month</th>
        <?php foreach ($seasons->{$season_id}->comp->{$league_id}->month as $month) { ?>
        <th scope="col" class="month"><?php echo $month->month_id; ?></th>
        <?php } ?>
        <th scope="col" class="total comp"><a href="#">Total</a></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="season">Team pts</th>
        <?php foreach ($seasons->{$season_id}->comp->{$league_id}->month as $month) { ?>
        <td class="month"><?php echo $month->totalWins; ?>/<?php echo $month->totalApps; ?></td>
        <?php } ?>
        <td class="totals"><?php echo $totals->totalWins; ?>/<?php echo $totals->totalApps; ?></td>
      </tr>
      <tr>
        <th class="season">Matches played</th>
        <?php foreach ($seasons->{$season_id}->comp->{$league_id}->month as $month) { ?>
        <td class="month"><?php echo $month->totalApps; ?></td>
        <?php } ?>
        <td>x</th>
      </tr>
    </tbody>
  </table>
</div>