<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package s-tier
 */

?>
<?php
$cta_text = get_field('cta_text', 'option');
$cta_button = get_field('cta_button', 'option');
if($cta_button) {
	$cta_button_url = $cta_button['url'];
	$cta_button_title = $cta_button['title'];
	$cta_button_target = $cta_button['target'] ? $cta_button['target'] : '_self';
};

$btn1 = get_field('footer_button_1','option');
$btn2 = get_field('footer_button_2','option');

$footer_logo = get_field('footer_logo', 'option');
$copyright = get_field('footer_copyright_text', 'option');

$contact__link = get_field('footer_contact_link', 'option');
if($contact__link) {
	$contact__link_url = $contact__link['url'];
	$contact__link_title = $contact__link['title'];
	$contact__link_target = $contact__link['target'] ? $contact__link['target'] : '_self';
};
?>

<!-- CTA  -->
<?php if($cta_text || $cta_button): ?>
	<div class="st-cta">
		<div class="container">
			<div class="st-sta__wrap space_1">
				<?php if($cta_text): ?>
					<div class="st-cta__text"><?php echo $cta_text ?></div>
				<?php endif ?>
				<?php if($cta_button): ?>
					<a class="btn btn-4" href="<?php echo esc_url($cta_button_url) ?>"  target="<?php echo esc_attr( $cta_button_target ); ?>">
						<?php echo $cta_button_title ?>
					</a>
				<?php endif ?>
			</div>
		</div>
	</div>
<?php endif ?>

<!-- Footer -->
<footer id="colophon" class="site-footer footer">
	<div class="footer__top">
		<div class="container footer__wrapper">
			<?php if($footer_logo): ?>
				<figure class="footer__logo">
					<?php echo wp_get_attachment_image( $footer_logo, 'full'); ?>
				</figure>
			<?php endif ?>

			<?php if( !empty($btn1 || $btn2 || $btn3) ) : ?>
				<div class="btns">
					<?php
					if( $btn1 ):
						$btn1_url = $btn1['url'];
						$btn1_title = $btn1['title'];
						$btn1_target = $btn1['target'] ? $btn1['target'] : '_self';
						?>
						<a aria-label="Visit our Product Page" class="btn btn-1" href="<?php echo esc_url( $btn1_url ); ?>" target="<?php echo esc_attr( $btn1_target ); ?>"><?php echo esc_html( $btn1_title ); ?> </a>
					<?php endif; ?>
					<?php
					if( $btn2 ):
						$btn2_url = $btn2['url'];
						$btn2_title = $btn2['title'];
						$btn2_target = $btn2['target'] ? $btn2['target'] : '_self';
						?>
						<a aria-label="Visit our Contact Page" class="btn btn-3" href="<?php echo esc_url( $btn2_url ); ?>" target="<?php echo esc_attr( $btn2_target ); ?>">
							<?php echo esc_html( $btn2_title ); ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<div class="footer__box-wrap">
				<div class="footer__box ">
					<div class="footer__box-title">
						Company
						<div class="footer__box-title-svg">
							<svg xmlns="http://www.w3.org/2000/svg" width="32" height="19" viewBox="0 0 32 19" fill="none">
								<path d="M32 2.84648L29.17 -1.27506e-06L18 11.235L16 13.3467L14 11.235L2.83004 -2.42642e-06L4.37446e-05 2.84647L16 18.9396L32 2.84648Z" fill="currentColor"/>
							</svg>
						</div>
					</div>

					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer',
								'menu_id'        => 'footer-menu',
							)
						);
					?>
				</div>

				<div class="footer__box">
					<div class="footer__box-title">Products
						<div class="footer__box-title-svg">
							<svg xmlns="http://www.w3.org/2000/svg" width="32" height="19" viewBox="0 0 32 19" fill="none">
								<path d="M32 2.84648L29.17 -1.27506e-06L18 11.235L16 13.3467L14 11.235L2.83004 -2.42642e-06L4.37446e-05 2.84647L16 18.9396L32 2.84648Z" fill="currentColor"/>
							</svg>
						</div>
					</div>

					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'products',
								'menu_id'        => 'footer-menu',
							)
						);
					?>
				</div>
				
				<div class="footer__box">
					<div class="footer__box-title">Information
						<div class="footer__box-title-svg">
							<svg xmlns="http://www.w3.org/2000/svg" width="32" height="19" viewBox="0 0 32 19" fill="none">
								<path d="M32 2.84648L29.17 -1.27506e-06L18 11.235L16 13.3467L14 11.235L2.83004 -2.42642e-06L4.37446e-05 2.84647L16 18.9396L32 2.84648Z" fill="currentColor"/>
							</svg>
						</div>

					</div>

					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'information',
								'menu_id'        => 'footer-menu',
							)
						);
					?>
				</div>

				<div class="footer__box footer__box--contact">
					<div class="footer__box-title">Contact
					</div>
					<?php if($contact__link): ?>
						<a href="<?php echo esc_url( $contact__link_url ); ?>" target="<?php echo esc_attr( $contact__link_target ); ?>"  class="footer__box-message"><?php echo esc_html( $contact__link_title ); ?></a>
						
					<?php endif ?>
					
					<?php get_template_part('template-parts/contact-info'); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="footer__bottom">
		<div class="container">
			<div class="footer__wrap">
				<?php if($copyright): ?>
					<div class="footer__copyright"><?php echo $copyright ?></div>
				<?php endif ?>

				<div class="footer__socials">
					<p class="footer__box-message">Socials:</p>

					<?php get_template_part('template-parts/socials'); ?>
				</div>
			</div>
		</div>
	</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
<!--
	         (__)
     `\------(oo)
       ||    (__) <(What are you looking for?)
       ||w--||
-->
<?php echo get_field('body_bottom_script', 'option'); ?> <!-- Body Bottom External Code -->
</body>
</html>
