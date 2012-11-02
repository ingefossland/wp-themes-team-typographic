<?php if ($matchfacts_players->players) { ?>

<section id="players">

	<h2>Brann (<?php echo $matchfacts_players->formation; ?>)</h2>

	<ul class="team formation-<?php echo $matchfacts_players->formation; ?>">

<?php foreach ($matchfacts_players->players as $player) { ?>

<?php

if ($player->shirt > 0) {
	$shirt = '<span class="shirt">'.$player->shirt.'</span>';
} else {
	$shirt = '';
}

if ($player->position == 1) {
	$class = 'gk';
} else if ($player->position == 2) {
	$class = 'def';
} else if ($player->position == 3) {
	$class = 'mid';
} else if ($player->position == 4) {
	$class = 'att';
} else if ($player->position == 5) {
	$class = 'sub';
} else if ($player->position == 6) {
	$class = 'res';
}

if ($player->sub_on && $player->sub_off) {
	$subs = '<span class="subs">(' .$player->sub_on. ',' .$player->sub_off. ')</span>';
} else if ($player->sub_on) {
	$subs = '<span class="subs">(' .$player->sub_on. ')</span>';
} else if ($player->sub_off) {
	$subs = '<span class="subs">(' .$player->sub_off. ')</span>';
} else {
	$subs = '';
}
	
$extra = ' ' . $subs;

if ($player->yc > 0 && $player->rc > 0) {
	$cards = '<span class="card yc">G</span> <span class="card rc">R</span>';
} else if ($player->rc > 0) {
	$cards = '<span class="card rc">R</span>';
} else if ($player->yc > 0) {
	$cards = '<span class="card yc">G</span>';
} else {
	$cards = '';
}

if ($cards) {
	$extra = $extra . ' ' . $cards;
} 

if ($player->goals > 0) {
	$goals = '<em class="goals">'.$player->goals.'</em>';
} else {
	$goals = '';
}

if ($goals) {
	$extra = $extra . ' ' . $goals;
} 

?>

<?php if ($player->position < 5) {  ?>

		<li class="<?php echo $class; ?>"><strong><a href="<?php echo get_permalink($player->player_id); ?>"><?php echo $shirt; ?> <?php echo $player->player->name; ?><?php echo $extra; ?></a></strong></li>

<?php } else { ?>

	<?php if (!$team_subs) { ?>
	</ul>
    
    <h2>Innbyttere</h2>
	<ul class="subs subs-<?php echo $matchfacts_players->substitutes; ?>">
	<?php } ?>

		<li class="<?php echo $class; ?>"><a href="<?php echo get_permalink($player->player_id); ?>"><?php echo $shirt; ?> <?php echo $player->player->name; ?><?php echo $extra; ?></a></li>

<?php $team_subs++; ?>

<?php } ?>

<?php } ?>

	</ul>

</section>

<?php } ?>