<?php

/**
 * Template Name: XML api
 * Description: A page that loads xml stats
 */
 
setlocale(LC_ALL, "no_NO");

global $teamdata;

// settings

$export_dir = WP_CONTENT_DIR . '/export';

// team and league
$team_id = get_option('teamdata_team_id');
$league_id = get_option('teamdata_competition_id');

// echo list
echo '<ul>';

// COMPETITIONS

global $wpdb;

// get top competition sorted by order
$comps_rows = $wpdb->get_col("
	SELECT $wpdb->terms.term_id FROM $wpdb->terms
	LEFT JOIN $wpdb->termmeta ON (
		$wpdb->terms.term_id = $wpdb->termmeta.term_id
		AND $wpdb->termmeta.meta_key = 'competition_order'
	)
	LEFT JOIN $wpdb->term_taxonomy ON (
		$wpdb->terms.term_id = $wpdb->term_taxonomy.term_id
	)
	WHERE $wpdb->term_taxonomy.taxonomy = 'competition'
	ORDER BY $wpdb->termmeta.meta_value ASC
");

// create comps class
$comps = new StdClass();

// collect comps
foreach ($comps_rows as $comp_id) {
	
	$comps->$comp_id = $teamdata->get_competition(array(
		'competition_id' => $comp_id,
	));
	
}

$comps_xml = new SimpleXMLElement('<array></array>');

foreach ($comps as $comp) {

	$comps_dict = $comps_xml->addChild('dict');

	$comps_dict->addChild('key', 'compID');
	$comps_dict->addChild('integer', $comp->term_id);

	$comps_dict->addChild('key', 'compGroupID');
	$comps_dict->addChild('integer', $comp->group->term_id);
	
	$comps_dict->addChild('key', 'compSlug');
	$comps_dict->addChild('string', $comp->slug);

	$comps_dict->addChild('key', 'compName');
	$comps_dict->addChild('string', $comp->name);

}

// export competitions
$export = $comps_xml->asXML($export_dir . '/competitions.plist');
echo '<li>EXPORTED COMPETITIONS: ' . $export . '</li>';

// PLAYERS

$players = $teamdata->get_players();
$players_xml = new SimpleXMLElement('<array></array>');

foreach ($players as $player) {
	
	// add season info as child of seasons_xml
	$player_dict = $players_xml->addChild('dict');

	$player_dict->addChild('key', 'playerID');
	$player_dict->addChild('integer', $player->ID);

	$player_dict->addChild('key', 'playerName');
	$player_dict->addChild('string', $player->name);

}

// export players
$export = $players_xml->asXML($export_dir . '/players.plist');
echo '<li>EXPORTED PLAYERS: ' . $export . '</li>';

// TEAMS

$teams = $teamdata->get_teams();
$teams_xml = new SimpleXMLElement('<array></array>');

foreach ($teams as $team) {
	
	// add season info as child of seasons_xml
	$team_dict = $teams_xml->addChild('dict');

	$team_dict->addChild('key', 'teamID');
	$team_dict->addChild('integer', $team->ID);

	$team_dict->addChild('key', 'teamName');
	$team_dict->addChild('string', $team->name);

}

// export teams
$export = $teams_xml->asXML($export_dir . '/teams.plist');
echo '<li>EXPORTED TEAMS: ' . $export . '</li>';

// GROUNDS

$grounds = $teamdata->get_grounds();
$grounds_xml = new SimpleXMLElement('<array></array>');

foreach ($grounds as $ground) {
	
	// add season info as child of seasons_xml
	$ground_dict = $grounds_xml->addChild('dict');

	$ground_dict->addChild('key', 'groundID');
	$ground_dict->addChild('integer', $ground->ID);

	$ground_dict->addChild('key', 'groundName');
	$ground_dict->addChild('string', $ground->name);

}

// export grounds
$export = $grounds_xml->asXML($export_dir . '/grounds.plist');
echo '<li>EXPORTED GROUNDS: ' . $export . '</li>';

// SEASONS AND SEASON STATS

$seasons = $teamdata->get_seasons();
$seasons_xml = new SimpleXMLElement('<array></array>');

// loop seasons
foreach ($seasons as $season) {
	
	// add season info as child of seasons_xml
	$seasons_xml_dict = $seasons_xml->addChild('dict');

	$seasons_xml_dict->addChild('key', 'seasonID');
	$seasons_xml_dict->addChild('integer', $season->term_id);

	$seasons_xml_dict->addChild('key', 'seasonSlug');
	$seasons_xml_dict->addChild('string', $season->slug);

	$seasons_xml_dict->addChild('key', 'seasonName');
	$seasons_xml_dict->addChild('string', $season->name);
	
	// build season xml
	$season_dict = new SimpleXMLElement('<dict></dict>');

	$season_dict->addChild('key', 'seasonID');
	$season_dict->addChild('integer', $season->term_id);

	$season_dict->addChild('key', 'seasonSlug');
	$season_dict->addChild('string', $season->slug);

	$season_dict->addChild('key', 'seasonName');
	$season_dict->addChild('string', $season->name);
	
	// get stats by season
	// add stats by season
	$stats = $teamdata->get_stats(array(
		'team_id' => $team_id,
		'season_id' => $season->term_id,
	));

	$season_dict->addChild('key', 'Competitons');
	$comps_array = $season_dict->addChild('array');

	foreach ($stats->comps as $comp) {
		
	 	if ($comp->totalApps > 0) {
		
			$comps_dict = $comps_array->addChild('dict');
	
			$comps_dict->addChild('key', 'compGroupID');
			$comps_dict->addChild('integer', $comp->competition_id);
			
			$comps_dict->addChild('key', 'compGroupSlug');
			$comps_dict->addChild('string', $comp->slug);
	
			$comps_dict->addChild('key', 'compGroupName');
			$comps_dict->addChild('string', $comp->name);

		}
		
	}


	// players by season

	$season_dict->addChild('key', 'Players');
	$players_array = $season_dict->addChild('array');

	foreach ($stats->players as $player) { 

		$player_dict = $players_array->addChild('dict');

		$player_dict->addChild('key', 'playerID');
		$player_dict->addChild('integer', $player->ID);
	
        $player = get_player_stats($player);

		$player_dict->addChild('key', 'playerName');
		$player_dict->addChild('string', $player->name);

		$player_dict->addChild('key', 'apps');
		$player_dict->addChild('integer', $player->totalApps);

		$player_dict->addChild('key', 'goals');
		$player_dict->addChild('integer', $player->totalGoals);
		

	}

	// matches by season

	$season_dict->addChild('key', 'Matches');
	$matches_array = $season_dict->addChild('array');

   	foreach ($stats->matches as $match) {

		$match_dict = $matches_array->addChild('dict');
		
		$date = gmdate("c", strtotime($match->match_date));
		$date = str_replace('+00:00', 'Z', $date);

		$match_dict->addChild('key', 'date');
		$match_dict->addChild('date', $date);

		$match_dict->addChild('key', 'compGroupID');
		$match_dict->addChild('integer', $match->competition->group->competition_id);

		$match_dict->addChild('key', 'compGroupSlug');
		$match_dict->addChild('string', $match->competition->group->term_id);

		$match_dict->addChild('key', 'compGroupName');
		$match_dict->addChild('string', $match->competition->group->name);
		
		$match_dict->addChild('key', 'compSlug');
		$match_dict->addChild('string', $match->competition->slug);

		$match_dict->addChild('key', 'compName');
		$match_dict->addChild('string', $match->competition->name);

		$match_dict->addChild('key', 'compID');
		$match_dict->addChild('string', $match->competition->competition_id);
		
		$match_dict->addChild('key', 'opponentName');
		$match_dict->addChild('string', $match->team->opponent->name);

		$match_dict->addChild('key', 'groundCode');
		$match_dict->addChild('string', $match->team->ground_code);

		$match_dict->addChild('key', 'resultCode');
		$match_dict->addChild('string', $match->team->result_code);

		$match_dict->addChild('key', 'resultGF');
		$match_dict->addChild('integer', $match->team->gf);

		$match_dict->addChild('key', 'resultGA');
		$match_dict->addChild('integer', $match->team->ga);
		
		// match players

		$match_dict->addChild('key', 'matchPlayers');
		$players_array = $match_dict->addChild('array');
			
		foreach ($match->players as $player) {
			
			//print_r($player);
			
			$player_dict = $players_array->addChild('dict');

			$player_dict->addChild('key', 'playerID');
			$player_dict->addChild('integer', $player->player_id);

			$player_dict->addChild('key', 'playerName');
			$player_dict->addChild('string', $player->player->name);

			$player_dict->addChild('key', 'pos');
			$player_dict->addChild('real', $player->position);

			$player_dict->addChild('key', 'shirt');
			$player_dict->addChild('integer', $player->shirt);

			$player_dict->addChild('key', 'subOn');
			$player_dict->addChild('integer', $player->sub_on);

			$player_dict->addChild('key', 'subOff');
			$player_dict->addChild('integer', $player->sub_on);

			$player_dict->addChild('key', 'yc');
			$player_dict->addChild('integer', $player->yc);

			$player_dict->addChild('key', 'rc');
			$player_dict->addChild('integer', $player->rc);

			$player_dict->addChild('key', 'goals');
			$player_dict->addChild('integer', $player->goals);
			
			
		}
		
	}		

	// export single season
//	$season_xml = new SimpleXMLElement('<array>'.$season_dict.'</array>');
	$export = $season_dict->asXML($export_dir . '/seasons-'.$season->term_id.'.plist');
	echo '<li>EXPORTED SEASON: ' . $export . '</li>';

}

// export seasons
$export = $seasons_xml->asXML($export_dir . '/seasons.plist');
echo '<li>EXPORTED SEASONS: ' . $export . '</li>';
echo '</ul>';
?>