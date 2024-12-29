<?php
$class = "st-single-product";
if ( ! empty( $block['className'] ) ) {
    $class .= ' ' . $block['className'];
}

$padding = get_field_object('padding');
if ( ! empty( $padding) ) {
    $class .=  ' ' . $padding['value'];
}

$product_id = get_the_ID(); 
$product_gallery = get_field('single_product_gallery');

$cta_btn = get_field('single_product_cta_button');
if($cta_btn ) {
	$cta_btn_url = $cta_btn['url'];
	$cta_btn_title = $cta_btn['title'];
	$cta_btn_target = $cta_btn['target'] ? $cta_btn['target'] : '_self';
}

$download_buttons = get_field('download_buttons');
$buttons_num = 0;
if($download_buttons) {
	$buttons_num = count($download_buttons);
}

$bg_color = get_field('background_color_single_product');
$style = "background-color: $bg_color";
?>

<?php get_template_part('template-parts/breadcrumbs'); ?>
<section class="<?php echo $class; ?>">
	<div class="container st-single-product__wrap">

		<?php if ( $product_gallery  ) :?>
			<div class="st-single-product__gallery">
				<?php foreach( $product_gallery  as $image ): ?>
					<figure class="carousel-cell">
					<?php echo wp_get_attachment_image( $image, 'full' ); ?>
					</figure>
				<?php endforeach; ?>
			</div>
		<?php else:  ?>
		
		<?php if ( has_post_thumbnail( $product_id ) ) :?>
		    <figure class="st-single-product__image"> <?php echo get_the_post_thumbnail( $product_id, 'full' );  ?> </figure>   
		<?php endif ?>

	<?php endif ?>

		<div class="st-single-product__text">
			<?php get_template_part('components/intro'); ?>

			<div class="st-single-product__buttons <?php echo $buttons_num !== 2 ? 'row' : 'column'?>">

				<?php if ($buttons_num == 2) :?>
					<?php if($cta_btn): ?>
						<a class="btn btn-1" href="<?php echo esc_url($cta_btn_url) ?>"  target="<?php echo esc_attr( $cta_btn_target ); ?>">
							<?php echo $cta_btn_title ?>
						</a>
					<?php endif ?>
					<div class="btns">
						<?php if ( have_rows('download_buttons') ) :
							while( have_rows('download_buttons') ) : the_row();
								$down_btn = get_sub_field('down_button');
								if($down_btn) {
									$down_btn_url = $down_btn['url']; 
									$down_btn_title = $down_btn['title'] ? $down_btn['title'] : 'Download PDF';
									$down_btn_target = '_blank'; 
								}
							?>
								<a class="btn-3 btn btn-download" href="<?php echo esc_url($down_btn_url); ?>" target="<?php echo esc_attr($down_btn_target); ?>" >
									<?php echo esc_html($down_btn_title); ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="32" height="39" viewBox="0 0 32 39" fill="none"><g clip-path="url(#clip0_1605_3980)"><path d="M15.4997 24.7455C15.0997 24.7455 14.8397 24.7845 14.6797 24.8235V29.913C14.8397 29.952 15.0797 29.952 15.2997 29.952C16.9397 29.952 17.9997 29.094 17.9997 27.222C17.9997 25.6035 17.0397 24.7455 15.4797 24.7455H15.4997Z" fill="currentColor"/><path d="M8.5398 24.726C8.1798 24.726 7.9198 24.765 7.7998 24.804V27.105C7.9598 27.144 8.1398 27.144 8.3998 27.144C9.3598 27.144 9.9398 26.676 9.9398 25.8765C9.9398 25.155 9.4398 24.726 8.5398 24.726Z" fill="currentColor"/><path d="M20 0H0V39H32V11.7L20 0ZM11 27.6705C10.38 28.236 9.46 28.4895 8.4 28.4895C8.2 28.4895 7.98 28.4895 7.78 28.4505V31.239H6V23.556C6.8 23.439 7.62 23.3805 8.44 23.4C9.56 23.4 10.34 23.6145 10.88 24.024C11.38 24.414 11.74 25.0575 11.74 25.818C11.74 26.5785 11.48 27.222 11 27.6705ZM18.62 30.303C17.78 30.9855 16.5 31.317 14.94 31.317C14 31.317 13.34 31.2585 12.9 31.2V23.556C13.7 23.439 14.52 23.3805 15.34 23.4C16.86 23.4 17.84 23.673 18.6 24.2385C19.44 24.843 19.96 25.7985 19.96 27.1635C19.96 28.6455 19.4 29.679 18.64 30.303H18.62ZM26.02 24.9015H22.96V26.676H25.82V28.0995H22.96V31.2195H21.14V23.439H26.02V24.882V24.9015ZM20.02 13.65H18.02V3.9L28.02 13.65H20.02Z" fill="currentColor"/></g><defs><clipPath id="clip0_1605_3980"><rect width="32" height="39" fill="transparent"/></clipPath></defs></svg>
								</a>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>

				<?php else: ?>
					<?php if($cta_btn): ?>
						<a class="btn btn-1" href="<?php echo esc_url($cta_btn_url) ?>"  target="<?php echo esc_attr( $cta_btn_target ); ?>">
							<?php echo $cta_btn_title ?>
						</a>
					<?php endif ?>
					<?php if ( have_rows('download_buttons') ) :
						while( have_rows('download_buttons') ) : the_row();
							$down_btn = get_sub_field('down_button');
							if($down_btn) {
								$down_btn_url = $down_btn['url']; 
								$down_btn_title = $down_btn['title'] ? $down_btn['title'] : 'Download PDF';
								$down_btn_target = '_blank'; 
							}
						?>
							<a class="btn-3 btn btn-download" href="<?php echo esc_url($down_btn_url); ?>" target="<?php echo esc_attr($down_btn_target); ?>" >
								<?php echo esc_html($down_btn_title); ?>
								<svg xmlns="http://www.w3.org/2000/svg" width="32" height="39" viewBox="0 0 32 39" fill="none"><g clip-path="url(#clip0_1605_3980)"><path d="M15.4997 24.7455C15.0997 24.7455 14.8397 24.7845 14.6797 24.8235V29.913C14.8397 29.952 15.0797 29.952 15.2997 29.952C16.9397 29.952 17.9997 29.094 17.9997 27.222C17.9997 25.6035 17.0397 24.7455 15.4797 24.7455H15.4997Z" fill="currentColor"/><path d="M8.5398 24.726C8.1798 24.726 7.9198 24.765 7.7998 24.804V27.105C7.9598 27.144 8.1398 27.144 8.3998 27.144C9.3598 27.144 9.9398 26.676 9.9398 25.8765C9.9398 25.155 9.4398 24.726 8.5398 24.726Z" fill="currentColor"/><path d="M20 0H0V39H32V11.7L20 0ZM11 27.6705C10.38 28.236 9.46 28.4895 8.4 28.4895C8.2 28.4895 7.98 28.4895 7.78 28.4505V31.239H6V23.556C6.8 23.439 7.62 23.3805 8.44 23.4C9.56 23.4 10.34 23.6145 10.88 24.024C11.38 24.414 11.74 25.0575 11.74 25.818C11.74 26.5785 11.48 27.222 11 27.6705ZM18.62 30.303C17.78 30.9855 16.5 31.317 14.94 31.317C14 31.317 13.34 31.2585 12.9 31.2V23.556C13.7 23.439 14.52 23.3805 15.34 23.4C16.86 23.4 17.84 23.673 18.6 24.2385C19.44 24.843 19.96 25.7985 19.96 27.1635C19.96 28.6455 19.4 29.679 18.64 30.303H18.62ZM26.02 24.9015H22.96V26.676H25.82V28.0995H22.96V31.2195H21.14V23.439H26.02V24.882V24.9015ZM20.02 13.65H18.02V3.9L28.02 13.65H20.02Z" fill="currentColor"/></g><defs><clipPath id="clip0_1605_3980"><rect width="32" height="39" fill="transparent"/></clipPath></defs></svg>
							</a>
						<?php endwhile; ?>
					<?php endif; ?>
				<?php endif ?>
			</div>
		</div>
	</div>
</section>
