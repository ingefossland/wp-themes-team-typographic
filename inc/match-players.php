<?php

function get_player($player) {

	if ($player->shirt > 0) {
		$shirt = $player->shirt;
	} else {
		$shirt = "-";
	}

	if ($player->position < 5) {
		$class = 'on pos-' . $player->position;
	} else if ($player->position == 5) {
		$class = 'sub';
	} else if ($player->position == 6) {
		$class = '';
	}

	if ($player->rc > 0) {
		$cards = "rc";
	} else if ($player->yc > 0) {
		$cards = "yc"; 
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
	
	return array($class, $shirt, $subs, $goals, $cards);

}

?>

<?php if ($matchfacts_players->players) { ?>

<section id="match-players">

	<ul>

	<?php foreach ($matchfacts_players->players as $player) { ?>
		<?php list($class, $shirt, $subs, $goals, $cards) = get_player($player); ?>
		<?php if ($class != 'sub') { ?>
		<li class="<?php echo $class; ?>"><a href="<?php echo get_permalink($player->player_id); ?>"><span><?php echo $shirt; ?></span> <strong><?php echo $player->player->name; ?></strong> <?php echo $subs; ?> <?php echo $goals; ?></a></li>
		<?php } else { ?>
		<li class="<?php echo $class; ?>"><a href="<?php echo get_permalink($player->player_id); ?>"><span><?php echo $shirt; ?></span> <?php echo $player->player->name; ?> <?php echo $subs; ?> <?php echo $cards; ?> <?php echo $goals; ?></a></li>
		<?php } ?>
	<?php } ?>

	</ul>

</section>

<?php } ?>