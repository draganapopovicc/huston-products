<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package s-tier
 */

get_header();

$title = get_field('title', 'option');
$intro_text = get_field('intro_title' ,'option');
$prefix_title = get_field('prefix_title', 'option');
$use_bg = get_field('use_background','option');
$bg_color = get_field('background_color','option');
$bg_img = get_field('background_image','option');
$bg_img_mob = get_field('background_image_mob','option');
$size = 'full';

$btn1 = get_field('button_1','option');
$btn2 = get_field('button_2','option');
$btn3 = get_field('button_3','option');

$class = 'st_inner-hero';
if ( ! empty( $block['className'] ) ) {
    $class .= ' ' . $block['className'];
}
?>

<main id="primary" class="site-main">
<?php get_template_part('template-parts/archive', 'hero'); ?>

	<div class="container blogs__wrapper space_1">
		<div class="b-title b-title-section">
			<h2 class="b-title__main title-2"> Latest Posts </h2>
		</div>

		<?php 
		if ( have_posts() ) : ?>
			<div class="archive_posts posts_grid " >
				<div class="posts_grid__all">
					<?php while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile; ?>
				</div>
				<?php the_posts_navigation(); ?>
			</div>
		<?php endif; ?>
	</div>
</main><!-- #main -->
<?php
get_footer();
