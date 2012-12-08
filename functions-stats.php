<?php

// get team stats

function get_team_stats($node) {
	
	// pts pct
	$node->team_pts = ($node->totalWins * 3) + ($node->totalDraws * 1);
	$node->total_pts = $node->totalApps * 3;

	// pts
	$node->pts = $node->team_pts . '/' . $node->total_pts;
	
	// pct
	if ($node->team_pts) {
		$node->pts_pct = round($node->team_pts / $node->total_pts * 100, 0);
	} else {
		$node->pts_pct = 0;
	}

	if ($node->totalGF) {
		$node->average_gf = round($node->totalGF / $node->totalApps, 2);	
	} else {
		$node->average_gf = 0;
	}
	
	
	if ($node->totalGA) {
		$node->average_ga = round($node->totalGA / $node->totalApps, 2);	
	} else {
		$node->average_ga = 0;
	}
	
	return $node;

}

// get player stats

function get_player_stats($player) {
	
	// apps
	if (isset($player->totalAppsStart) && isset($player->totalAppsSub)) {
		$player->apps = $player->totalAppsStart . '<em>+' . $player->totalAppsSub . '</em>';
	} else if (isset($player->totalAppsStart)) {	
		$player->apps = $player->totalAppsStart . '<em>+0</em>';
	} else if (isset($player->totalAppsSub)) {
		$player->apps = '0<em>+' . $player->totalAppsSub . '</em>';
	} else {
		$player->apps = '';
	}

	// goals
	if (isset($player->totalGoals) && $player->totalGoals > 0) {
		$player->goals = '<span>' . $player->totalGoals . '</span>';
	} else {
		$player->goals = '';
	}
	
	// goal average
	if ($player->totalApps > 0) {
		$player->goal_average = round($player->totalGoals / $player->totalApps, 2);
	} else {
		$player->goal_average = '';
	}

	// cards
	if ($player->totalRC > 0 && $player->totalYC > 0) {
		$player->cards = '<span class="rc">' . $player->totalRC . '</span> <span class="yc">' . $player->totalRC . '</span>';
	} else if ($player->totalRC) {
		$player->cards = '<span class="rc">' . $player->totalRC . '</span>';
	} else if ($player->totalYC) {
		$player->cards = '<span class="yc">' . $player->totalYC . '</span>';
	} else {
		$player->cards = '';
	}
	
	// class
	if ($player->goals && $player->cards) {
		$player->class = 'goals cards';
	} else if ($player->goals) {
		$player->class = 'goals';
	} else if ($player->cards) {
		$player->class = 'cards';
	} else {
		$player->class = '';
	}
	
	
	return $player;
	
}

// sort players by apps

function sort_players_by_apps($a, $b) {

	if ($a->totalApps == $b->totalApps) {
		if ($a->totalAppsStart < $b->totalAppsStart) { return 1; }
		if ($a->totalAppsStart > $b->totalAppsStart) { return -1; }
	}

	if ($a->totalApps < $b->totalApps) { return 1; }
	if ($a->totalApps > $b->totalApps) { return -1; }

	return 0;

}

// get match player

function get_match_player($player) {

	if ($player->position == 1) {
		$check = "+"; 
		$class = 'gk';
	} else if ($player->position < 5) {
		$check = "+"; 
		$class = 'on';
	} else if ($player->position == 5) {
		$check = "+"; 
		$class = 'sub';
	} else if ($player->position == 6) {
		$check = ''; 
		$class = '';
	}

	if ($player->goals > 0) {
		$check .= ' ' . $player->goals;
	}
	
	if ($player->rc > 0) {
		$class .= " rc";
		$check .= " r";
	} else if ($player->yc > 0) {
		$class .= " yc";
		$check .= " y"; 
	}

	if (isset($player) && $player->position < 5) {
		$mark = '<strong class="'.$class.'">'.$check.'</strong>';
	} else if (isset($player) && $player->position == 5) {
		$mark = '<span class="'.$class.'">'.$check.'</span>';
	} else {
		$mark = '<span>&nbsp;</span>';
	}

	return $mark;

}


// get graph

function get_graph($pct) {

	if ($pct >= 50) {
    	$graph = '<span class="graph"><span class="pct high" style="height:'.$pct.'%"><em>'.$pct.'%</em></span></span>';
	} else {
    	$graph = '<span class="graph"><span class="pct low" style="height:'.$pct.'%"><em>'.$pct.'%</em></span></span>';
	}

	return $graph;

}


?>