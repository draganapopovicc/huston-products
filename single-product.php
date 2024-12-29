<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package stier
 */

get_header();

?>
<?php
while ( have_posts() ) :
the_post(); ?>
	<main id="primary" class="site-main st_single-product">
		<article class="post_main">
			<?php the_content(); ?>
		</article>
		
		<?php get_template_part('template-parts/faq'); ?>
		<?php get_template_part('template-parts/above-footer'); ?>
	</main><!-- #main -->

<?php endwhile; // End of the loop.?>
<?php
get_footer();
