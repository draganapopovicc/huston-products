<?php
$class = 'st-mission';
if ( ! empty( $block['className'] ) ) {
	$class .= ' ' . $block['className'];
}

$padding = get_field_object('padding');
if ( ! empty( $padding) ) {
    $class .=  ' ' . $padding['value'];
}

$bg_color = get_field('background_color_mission');
$style = "background-color: $bg_color";
?>

<section class="<?php echo $class ?>" style="<?php echo $style ?>">
		<div class="container"> 
			<div class="st-mission__wrap">
				<?php get_template_part('components/intro'); ?>
				<?php get_template_part('components/buttons'); ?>

				<?php if( have_rows('missions') ): ?>
					<div class="st-missions__all">
						<?php while( have_rows('missions') ) : the_row();
							$icon = get_sub_field('mission_icon'); 
							$title = get_sub_field('mission_title'); 
							$description = get_sub_field('mission_description');  
							?>
						
							<div class="st-mission">
								<?php if( $icon ) : ?>
									<?php echo $icon ?>
								<?php endif ?>

								<?php if($title): ?>
									<p class="st-mission__title"> <?php echo $title ?> </p>
								<?php endif ?>
							
								<?php if($description): ?>
								<div class="st-mission__desc">
									<?php echo $description ?> 
								</div>
								<?php endif ?>
							</div>
						<?php endwhile ?>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</section>

