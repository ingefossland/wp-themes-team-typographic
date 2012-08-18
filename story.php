<article class="story" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <h5>By <?php the_author(); ?>, <?php the_time('d.m.Y'); ?><?php edit_post_link('Edit', ' <span class="wp-edit">', '</span>' ); ?></h5>
  <?php the_excerpt(); ?>
</article>
