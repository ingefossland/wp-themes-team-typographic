<?php

function get_player($player) {

	if ($player->shirt > 0) {
		$check = $player->shirt;
	} else {
		$check = "+";
	}

	if ($player->position == 1) {
		$class = 'on gk';
	} else if ($player->position < 5) {
		$class = 'on';
	} else if ($player->position == 5) {
		$class = 'sub';
	} else if ($player->position == 6) {
		$check = ''; 
		$class = '';
	}

	if ($player->rc > 0) {
		$class .= " rc";
		$check .= " r";
	} else if ($player->yc > 0) {
		$class .= " yc";
		$check .= " y"; 
	}
		
	if ($player->sub_on && $player->sub_off) {
		$subs = ' (' .$player->sub_on. ',' .$player->sub_off. ')';
	} else if ($player->sub_on) {
		$subs = ' (' .$player->sub_on. ')';
	} else if ($player->sub_off) {
		$subs = ' (' .$player->sub_off. ')';
	} else {
		$subs = '';
	}
	
	if ($player->goals) {
		$goals = $player->goals;
		//$goals = str_repeat("&bull;", $player->goals);
	} else {
		$goals;
	}
	
	return array($class, $check, $subs, $goals);

}

?>

<?php if ($matchfacts_players->players) { ?>

<div id="match-players">

	<ul>

	<?php foreach ($matchfacts_players->players as $player) { ?>
		<?php list($class, $check, $subs, $goals) = get_player($player); ?>
		<li class="<?php echo $class; ?>"><a href="<?php echo get_permalink($player->player_id); ?>"><span><?php echo $check; ?></span> <?php echo $player->player->name; ?> <?php echo $subs; ?> <?php echo $goals; ?></a></li>
	<?php } ?>

	</ul>

</div>

<?php } ?>