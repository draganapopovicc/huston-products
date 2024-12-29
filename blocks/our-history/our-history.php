<?php
$image = get_field('our_history_image');
$image_desc = get_field('our_history_description');

$class = "st-history";
if ( ! empty( $block['className'] ) ) {
    $class .= ' ' . $block['className'];
}

$padding = get_field_object('padding');
if ( ! empty( $padding) ) {
    $class .=  ' ' . $padding['value'];
}

$bg_color = get_field('background_color_history');
$style = "background-color: $bg_color";
?>

<section class="<?php echo $class; ?>">
	<div class="container st-history__wrap">
		<?php get_template_part('components/intro'); ?>

		<?php if( $image ): ?>
			<div class="st-history__image">
				<figure>
					<?php echo wp_get_attachment_image( $image, 'large' ); ?>
				</figure>

				<?php if($image_desc) : ?>
					<div class="st-history__image-desc"><?php echo $image_desc ?></div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
