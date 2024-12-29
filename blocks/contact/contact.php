<?php
$contact_short_code = get_field('contact_short_code');
$info_title = get_field('contact_information_title');

$class = 'st-contact space_1';
if ( ! empty( $block['className'] ) ) {
	$class .= ' ' . $block['className'];
}
?>

<section class="<?php echo $class ?>">
	<div class="container">
        <div class="st-contact-wrap">
            <div class="st-contact__form-wrapper">
                <?php get_template_part('components/intro'); ?> 

                <div class="st-contact__form-shortcode">
                    <?php echo do_shortcode($contact_short_code);?>
                </div>
            </div>

            <div class="st-contact__info">
                <?php if ($info_title): ?>
                    <p class="st-contact__info-title"><?php echo $info_title ?></p>
                <?php endif?>
                
                <?php get_template_part('template-parts/contact-info'); ?>
                <?php get_template_part('template-parts/socials'); ?>
            </div>
        </div>
	</div>
</section>

