<?php
$contact_short_code = get_field('quote_short_code');

$class = 'st-quote';
if ( ! empty( $block['className'] ) ) {
	$class .= ' ' . $block['className'];
}

$padding = get_field_object('padding');
if ( ! empty( $padding) ) {
    $class .=  ' ' . $padding['value'];
}

$bg_color = get_field('background_color_quote');
$style = "background-color: $bg_color";
?>

<section class="<?php echo $class ?>" style="<?php echo $style ?>">
	<div class="container st-quote__wrap">
        <?php get_template_part('components/intro'); ?> 

        <div class="st-contact__form-shortcode">
            <?php echo do_shortcode($contact_short_code);?>
        </div>
	</div>
</section>

