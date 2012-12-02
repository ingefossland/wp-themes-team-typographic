<?php

global $post, $teamdata;

// get seasons & competitions
$seasons = $teamdata->get_seasons();
$comps = $teamdata->get_competitions();

?>
<nav id="search">
    <ul>
    <?php foreach ($seasons as $s) { ?>
        <?php if ($s->season_id == $season_id) { ?>
        <li><strong><?php echo $s->name; ?></strong>
            <ul>
        <li><a href="<?php echo $s->link; ?>">Alle turneringer</a></li>
            <?php foreach ($comps as $c) { ?>
                <li><a href="<?php echo get_term_link($s->slug, 'season') . $c->slug . '/'; ?>"><?php echo $c->name; ?></a></li>
            <?php } ?>
            </ul>
        </li>
        <?php } else { ?>
        <li><a href="<?php echo $s->link; ?>"><?php echo $s->name; ?></a></li>
        <?php } ?>
    <?php } ?>
    </ul>
</nav>
