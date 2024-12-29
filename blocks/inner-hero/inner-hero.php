<?php
$class = 'st_inner-hero';
if ( ! empty( $block['className'] ) ) {
    $class .= ' ' . $block['className'];
}
?>

<div class="<?php echo $class; ?>" >
    <?php get_template_part('components/background'); ?>

    <div class="container st_hero__container">
        <div class="st_inner-hero__content">
            <?php get_template_part('components/intro-h1'); ?> 
            <?php get_template_part('components/buttons'); ?> 
        </div>
     </div>
</div>
