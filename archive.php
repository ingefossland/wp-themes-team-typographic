<?php get_header(); ?>

<?php if (have_posts()) { the_post(); } ?>

<?php if (is_day()) { ?>
	<h1><a href="<?php echo home_url('/') . get_the_date('Y/'); ?>"><?php echo get_the_date('Y'); ?></a>/<a href="<?php echo home_url('/') . get_the_date('Y/m/'); ?>"><?php echo get_the_date('m'); ?></a>/<a href="<?php echo home_url('/') . get_the_date('Y/m/d/'); ?>"><?php echo get_the_date('d'); ?></a></h1>
<?php } else if (is_month()) { ?>
	<h1><a href="<?php echo home_url('/') . get_the_date('Y/'); ?>"><?php echo get_the_date('Y'); ?></a>/<a href="<?php echo home_url('/') . get_the_date('Y/m/'); ?>"><?php echo get_the_date('m'); ?></a>/</h1>
<?php } else if ( is_year() ) { ?>
	<h1><a href="<?php echo home_url('/') . get_the_date('Y/'); ?>"><?php echo get_the_date('Y'); ?></a></h1>
<?php } else if (is_category() || is_tag()) { ?>
	<h1><?php single_term_title(); ?></h1>
<?php } else if (is_author()) { ?>
	<h1><?php echo get_the_author(); ?></h1>
<?php } else { ?>
	<h1>Archives</h1>
<?php } ?>
        
<?php rewind_posts(); ?>


<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'story', get_post_type() ); ?>
<?php endwhile; ?>


<?php twentyeleven_content_nav( 'nav-below' ); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>