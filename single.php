<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package stier
 */

get_header();
$post_id = get_the_ID();
$publish_date = get_the_date('F j, Y', $post_id) . ' ' . strtolower(get_the_time('g:i A', $post_id));

?>
<?php
while ( have_posts() ) :
the_post(); ?>

<?php get_template_part('template-parts/breadcrumbs'); ?>
<main id="primary" class="site-main container st_single-post">
	<article class="post_main">
		<?php
			the_title( '<h1 class="title-3">', '</h1>' );
		?>
	    <div class="post-author-date">
			Posted by  <span class="post-author"> <?php echo get_the_author()  ?></span> 
			on <?php echo $publish_date; ?>
		</div>
		<?php the_content(); ?>
	</article>
</main>

 <div class="container">
	<?php the_post_navigation(
		array(
			'prev_text' => '<span class="prev nav-subtitle ">' . esc_html__( 'Previous Blog', 'stier' ) . '</span> ',
			'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next Blog', 'stier' ) .'</span>',
		)
	);
	endwhile; // End of the loop.
	?>
</div> 

<?php
get_footer();
