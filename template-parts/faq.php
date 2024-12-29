<?php
if ( have_rows('faq_toggles', 'option') ) :
	$btn1 = get_field('faq_button_1', 'option');
	$btn2 = get_field('faq_button_2', 'option');

    $prefix_title = get_field('faq_prefix', 'option');
    $title = get_field('faq_title', 'option');
    $intro_text = get_field('faq_subtitle', 'option');

    $bg_color = get_field('background_color_faq');
    $style = "background-color: $bg_color";
?>

<section class="st_accordion space_1" style="<?php echo $style ?>">
	<div class="container">
		<div class="st_accordion__intro-wrap">
            <?php if($intro_text || $title || $prefix_title): ?>
                <div class="b-title b-title-section">
                    <?php if( $prefix_title ): ?>
                        <p class="b-title__prefix"> 
                            <?php echo $prefix_title ?>
                        </p>
                    <?php endif ?>

                    <?php if( $title ): ?>
                        <h2 class="b-title__main title-2"> <?php echo $title ?> </h2>
                    <?php endif ?>
                    <?php if($intro_text): ?>
                        <div  class="b-title__intro"> <?php echo $intro_text; ?> </div>
                    <?php endif ?>
                </div>
            <?php endif ?>

			<?php if( !empty($btn1 || $btn2) ) : ?>
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
			<?php while( have_rows('faq_toggles', 'option') ) : the_row();
				$accordion_title = get_sub_field('faq_question');
				$accordion_content = get_sub_field('faq_answer');

				if($item == 1 && get_field('first_open', 'option') ){
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