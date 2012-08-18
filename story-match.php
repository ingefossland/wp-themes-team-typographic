<article class="story" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h4><a href="<?php the_permalink(); ?>"><?php the_competition(); ?>, <?php the_time('d.m.Y'); ?>: <?php the_match(); ?></a><?php edit_post_link('Edit', ' <span class="wp-edit">', '</span>' ); ?></h4>
</article>
