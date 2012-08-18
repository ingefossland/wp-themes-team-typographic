<?php get_header(); ?>

<h1><?php echo single_cat_title( '', false )?>:</h1>

<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part('story', get_post_type()); ?>
<?php endwhile; ?>

<?php twentyeleven_content_nav( 'nav-below' ); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>