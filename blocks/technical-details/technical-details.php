<?php
$toggle_title = get_field('specification_toggle_title') ;

$class = 'st-details';
if ( ! empty( $block['className'] ) ) {
	$class .= ' ' . $block['className'];
}

$padding = get_field_object('padding');
if ( ! empty( $padding) ) {
    $class .=  ' ' . $padding['value'];
}
?>

<section class="<?php echo $class ?>">
		<div class="container"> 
			<?php get_template_part('components/intro'); ?>

			<div class="st-details__wrap">
				<?php if( have_rows('specifications') ): ?>
					<?php if($toggle_title): ?>
						<div class="st-details__toggle-title"> <span><?php echo $toggle_title ?></span>   <small></small> </div>
					<?php endif ?>
					
					<div class="st-details__body">
						<?php while( have_rows('specifications') ) : the_row();
							$name = get_sub_field('specification_name'); 
							$properties = get_sub_field('specification_properties');  
							?>
						
							<div class="st-specification">
								<?php if($name): ?>
									<p class="st-specification__name"> <?php echo $name ?> </p>
								<?php endif ?>
							
								<?php if($properties): ?>
								<div class="st-specification__properties">
									<?php echo $properties ?> 
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

