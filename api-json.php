<?php
/**
 * Template Name: API json
 * Description: A page that interprets jso
 */

echo '<pre>';
print_r($wp_query);
echo '</pre>';

global $post, $teamdata;

$team_id = get_option('teamdata_team_id');
$league_id = get_option('teamdata_competition_id');

// get results
$results = $teamdata->get_matches(array(
	'team_id' => $team_id,
	'type' => 'results',
	'limit' => '5'
));

$results_array = array();

foreach ($results as $match) {
	array_push($results_array, array(
		'hometeam' => $match->hometeam->name,
		'awayteam' => $match->awayteam->name,
		'result' => $match->result
	));
}

// build json
$json = array(
	'matches' => $results_array
);

// decode json
$results_json = json_encode($json);


?>
<?php print_r($results_json); ?>