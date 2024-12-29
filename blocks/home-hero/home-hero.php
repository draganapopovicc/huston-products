<?php
$class = 'st_home-hero';
if ( ! empty( $block['className'] ) ) {
    $class .= ' ' . $block['className'];
}
$video= get_field('video_hero');
?>

<div  class="<?php echo $class; ?>">
    <?php get_template_part('components/background'); ?>

    <div class="st_hero__video-wrapper">
        <video width="960" height="540" autoplay="autoplay" muted playsinline loop>
			<source src="<?php echo $video ?>" type="video/mp4" >
		</video>
    </div>

    <div class="container st_hero__container">
        <div class="st_home-hero__content">
            <?php get_template_part('components/intro-h1'); ?>
            <?php get_template_part('components/buttons'); ?>
        </div>
    </div>
</div>


