

<?php get_header(); ?>

<section id="searchresults">

		<hgroup id="title">

  <form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <input type="text" class="field" name="s" id="s" placeholder="Søk etter hva som helst" value="<?php echo $_REQUEST['s']; ?>"/> <input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />
  </form>

		</hgroup>


	<?php if (have_posts()) : ?>

	<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				/* Include the Post-Format-specific template for the content.
				 * If you want to overload this in a child theme then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part('content', get_post_format());
			?>

		<?php endwhile; ?>

	<?php else : ?>

		<article id="post-0" class="post no-results not-found">
				<h1 class="entry-title">Ingen treff</h1>
                <p>Fant ingenting. Prøv igjen.</p>
		</article><!-- #post-0 -->

	<?php endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>