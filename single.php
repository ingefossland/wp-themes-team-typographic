<?php get_header(); ?>
<article id="article">
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <h1>
    <?php the_title(); ?>
  </h1>
  <div class="byline"> <?php echo get_avatar(get_the_author_meta('user_email'), '40'); ?>
    <h4>By
      <?php the_author(); ?>
    </h4>
    <h5>Published:
      <?php the_time('d.m.Y'); ?>
      . Posted in:
      <?php the_category(','); ?>
      . Tags:
      <?php the_tags(','); ?>
      <?php edit_post_link('Edit', ' <span class="wp-edit">', '</span>' ); ?>
    </h5>
  </div>
  <?php the_content(); ?>
  <?php comments_template( '', true ); ?>
  <?php endwhile; // end of the loop. ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
