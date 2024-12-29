<?php

$prefix_title = get_field('prefix_title');
$title = get_field('title');
$intro_text = get_field('intro_title');
$btn1 = get_field('button_1');
$btn2 = get_field('button_2');

$class = 'st-about-us';
if ( ! empty( $block['className'] ) ) {
	$class .= ' ' . $block['className'];
}

$padding = get_field_object('padding');
if ( ! empty( $padding) ) {
    $class .=  ' ' . $padding['value'];
}

$bg_color = get_field('background_color_about');

$style = "background-color: $bg_color";
?>

<section class="<?php echo $class ?>" style="<?php echo $style ?>">
		<div class="container"> 
			<div class="st-about-us__wrap">
				<?php if($intro_text || $title || $prefix_title): ?>
					<div class="b-title b-title-section">
						<div class="b-title__wrap">
							<?php if( $prefix_title ): ?>
								<p class="b-title__prefix"> 
									<?php echo $prefix_title ?>
								</p>
							<?php endif ?>

							<?php if( $title ): ?>
								<h2 class="b-title__main title-2"> <?php echo $title ?> </h2>
							<?php endif ?>
						</div>

						<div class="st-about-us__btn-wrap">
							<?php if($intro_text): ?>
								<div  class="b-title__intro"> <?php echo $intro_text; ?> </div>
							<?php endif ?>

							<?php if( !empty($btn1 || $btn2) ) : ?>
								<div class="btns">
									<?php
									if( $btn1 ):
										$btn1_url = $btn1['url'];
										$btn1_title = $btn1['title'];
										$btn1_target = $btn1['target'] ? $btn1['target'] : '_self';
										?>
										<a class="btn btn-5" href="<?php echo esc_url( $btn1_url ); ?>" target="<?php echo esc_attr( $btn1_target ); ?>"><?php echo esc_html( $btn1_title ); ?> </a>
									<?php endif; ?>
									<?php
									if( $btn2 ):
										$btn2_url = $btn2['url'];
										$btn2_title = $btn2['title'];
										$btn2_target = $btn2['target'] ? $btn2['target'] : '_self';
										?>
										<a class="btn btn-5" href="<?php echo esc_url( $btn2_url ); ?>" target="<?php echo esc_attr( $btn2_target ); ?>"><?php echo esc_html( $btn2_title ); ?> </a>
									<?php endif; ?>
								</div>
							<?php endif?>
						</div> 
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</section>

