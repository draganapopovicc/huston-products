<?php
/* Template Name: Page Additions
   Template Post Type: page
*/

get_header();
?>
	<main id="primary" class="site-main">
		<article>
			<?php the_content(); ?>
		</article>

		<?php get_template_part('template-parts/above-footer'); ?>
	</main><!-- #main -->
<?php
get_footer();
