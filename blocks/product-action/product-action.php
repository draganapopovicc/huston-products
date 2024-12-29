<?php

$class = 'st-product-action';

$video = get_field('video_action_iframe');
if ( ! empty( $block['className'] ) ) {
	$class .= ' ' . $block['className'];
}

$padding = get_field_object('padding');
if ( ! empty( $padding) ) {
    $class .=  ' ' . $padding['value'];
}

$bg_color = get_field('background_color_action');
$style = "background-color: $bg_color";
?>

<section class="<?php echo $class ?>" style="<?php echo $style ?>">
		<div class="container"> 
			<?php get_template_part('components/intro'); ?>

			<?php if ($video): ?>
				<div class="st-product-action__video">
					<?php echo $video?>
				</div>	
			<?php endif ?>
		</div>
	</div>
</section>


