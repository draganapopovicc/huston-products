<?php
$class = 'st_home-carousel';
if ( ! empty( $block['className'] ) ) {
    $class .= ' ' . $block['className'];
}
$video= get_field('video_hero');
?>

<div  class="<?php echo $class; ?>">
	<div class="home_carousel_text space_1">
		<div class="container">
			<div class="home_carousel_text_inner">
				<?php get_template_part('components/intro-h1'); ?>
				<?php get_template_part('components/buttons'); ?>
			</div>
		</div>
	</div>
    <div class="st_hero_carousel_inner main-carousel"
	data-flickity='{
	"cellAlign": "left",
	"contain": true,
	"wrapAround": true,
	"prevNextButtons": false,
	"autoPlay": true }'>
        <?php

		if( have_rows('slides') ): ?>
			<?php while( have_rows('slides') ) : the_row(); ?>

				<div class="carousel-cell st_hero_slide">
					<?php
					$image = get_sub_field('slide_image');
					$size = 'full';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, "", array( "class" => "image" ) );
					} ?>
				</div>

			<?php endwhile; ?>
		<?php endif; ?>
    </div>
</div>
