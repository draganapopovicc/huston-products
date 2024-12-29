<?php
if ( have_rows('accordion') ) :

	$class = 'st_accordion';
	if ( ! empty( $block['className'] ) ) {
		$class .= ' ' . $block['className'];
	}

	$padding = get_field_object('padding');
	if ( ! empty( $padding) ) {
		$class .=  ' ' . $padding['value'];
	}

	$bg_color = get_field('background_color_accordion');
	$style = "background-color: $bg_color";

	$btn1 = get_field('button_1');
	$btn2 = get_field('button_2');
?>

<section class="<?php echo $class ?>" style="<?php echo $style ?>">
	<div class="container">
		<div class="st_accordion__intro-wrap">
			<?php get_template_part('components/intro');?>
			<?php if( !empty($btn1 || $btn2 || $btn3) ) : ?>
				<div class="btns">
				<?php if( $btn1 ):
					$btn1_url = $btn1['url'];
					$btn1_title = $btn1['title'];
					$btn1_target = $btn1['target'] ? $btn1['target'] : '_self';
					?>
						<a class="btn btn-5" href="<?php echo esc_url( $btn1_url ); ?>" target="<?php echo esc_attr( $btn1_target ); ?>"><?php echo esc_html( $btn1_title ); ?> </a>
				<?php endif; ?>
				<?php if( $btn2 ):
					$btn2_url = $btn2['url'];
					$btn2_title = $btn2['title'];
					$btn2_target = $btn2['target'] ? $btn2['target'] : '_self';
					?>
					<a class="btn btn-5" href="<?php echo esc_url( $btn2_url ); ?>" target="<?php echo esc_attr( $btn2_target ); ?>"><?php echo esc_html( $btn2_title ); ?> </a>
				<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	
		<?php $item=1;?>

		<div class="st_accordion__wrap">
			<?php while( have_rows('accordion') ) : the_row();
				$accordion_title = get_sub_field('title');
				$accordion_content = get_sub_field('content');

				if($item == 1 && get_field('first_open') ){
					$open = 'open';
					$display = 'display: block';

					}else{
						$open = '';
						$display = 'display: none';
					}
				?>
				<div class="st_accordion-item <?php echo $open ?>">
					<div class="st_accordion-header">
						<?php echo $accordion_title; ?>

						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="19" viewBox="0 0 32 19" fill="none">
							<path d="M32 2.84648L29.17 -1.27506e-06L18 11.235L16 13.3467L14 11.235L2.83004 -2.42642e-06L4.37446e-05 2.84647L16 18.9396L32 2.84648Z" fill="currentColor"/>
						</svg>
					</div>

					<div class="st_accordion-body" style="<?php echo $display ?>">
						<div class="st_accordion-body-wrap">
							<span>A.</span>
							<div>
							<?php echo $accordion_content; ?>
							</div>
						</div>
					</div>
				</div>
				<?php $item++;?>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php endif; ?>
