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

// get comp stats

function get_comp_stats($comp) {
	
	// apps
	if (isset($comp->totalApps)) {
		$comp->apps = '<span>' . $comp->totalApps . '</span>';
	} else {
		$comp->apps = '';
	}

	// goals for
	if (isset($comp->totalGF) && $comp->totalGF > 0) {
		$comp->goals = '<span>' . $comp->totalGF . '</span>';
	} else {
		$comp->goals = '';
	}
	
	// goal average
	if ($comp->totalGoals > 0) {
		$comp->goal_average = '<span>' . round($comp->totalGF / $comp->totalApps, 2) . '</span>';
	} else {
		$comp->goal_average = '';
	}

	// cards
	if ($comp->totalRC > 0 && $comp->totalYC > 0) {
		$comp->cards = '<span class="rc">' . $comp->totalRC . '</span> <span class="yc">' . $comp->totalYC . '</span>';
	} else if ($comp->totalRC) {
		$comp->cards = '<span class="rc">' . $comp->totalRC . '</span>';
	} else if ($comp->totalYC) {
		$comp->cards = '<span class="yc">' . $comp->totalYC . '</span>';
	} else {
		$comp->cards = '';
	}
	
	// class
	if ($comp->goals && $comp->cards) {
		$comp->class = 'goals cards';
	} else if ($comp->goals) {
		$comp->class = 'goals';
	} else if ($comp->cards) {
		$comp->class = 'cards';
	} else {
		$comp->class = '';
	}
	
	
	return $comp;
	
}

// get player stats

function get_player_stats($player) {
	
	// apps
	if (isset($player->totalAppsStart) && isset($player->totalAppsSub)) {
		$player->apps = '<span>' . $player->totalAppsStart . '<em>+' . $player->totalAppsSub . '</em></span>';
	} else if (isset($player->totalAppsStart)) {	
		$player->apps = '<span>' . $player->totalAppsStart . '<em>+0</em></span>';
	} else if (isset($player->totalAppsSub)) {
		$player->apps = '<span>0<em>+' . $player->totalAppsSub . '</em></span>';
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
	if ($player->totalGoals > 0) {
		$player->goal_average = '<span>' . round($player->totalGoals / $player->totalApps, 2) . '</span>';
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

// get graph

function get_goalscorer_graph($max, $goals) {

//	$pct = floor($goals / $max * 100, 0);
	$pct = ($goals / $max) * 100;
	$pct = str_replace(',', '.', $pct);

	if ($goals > 0) {
		if ($pct >= 50) {
	    	$graph = '<strong class="pct high" style="width:'.$pct.'%"><em class="goals-'.$goals.'">'.$goals.'</em></strong>';
    	} else {
	    	$graph = '<strong class="pct low" style="width:'.$pct.'%"><em class="goals-'.$goals.'">'.$goals.'</em></strong>';
    	}
	}

	return $graph;

}


?>