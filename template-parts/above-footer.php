
<!-- Testimonials -->
<?php
$testimonial_prefix = get_field('testimonials_prefix', 'option');
$testimonial_title = get_field('testimonials_title', 'option');

?>
<section class="st-testimonials space_1 no-flickity">
	<div class="container">
        <?php if($testimonial_prefix || $testimonial_title) :?>
            <div class="b-title b-title-section">
                <?php if($testimonial_prefix): ?>
                    <p class="b-title__prefix"><?php echo $testimonial_prefix ?></p>
                <?php endif ?>
                <?php if($testimonial_title): ?>
                    <h2 class="b-title__main title-2"><?php echo $testimonial_title ?></h2>
                <?php endif ?>
            </div>
        <?php endif ?>

        <?php 
            $args = array(
                'post_type' => 'testimonial',
                'posts_per_page' => -1, 
            );
            $query = new WP_Query($args);

            if ( $query->have_posts() ) : ?>
                <div class="st-testimonials__all">
                    <?php while ( $query->have_posts() ) :
                        $query->the_post();
                        get_template_part( 'template-parts/content', get_post_type() );
                    endwhile; ?>
                </div>
            <?php endif; ?>

        <div class="st-testimonials__buttons">
            <button class="slider-btn prevButton">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                <path d="M10.5709 21.3384L12.4251 19.4842L5.10663 12.1658L21.0539 12.1658L21.0539 9.545L5.10663 9.545L12.4251 2.22656L10.5709 0.372378L0.0878954 10.8554L10.5709 21.3384Z" fill="currentColor"/>
                </svg>
                <small class="hidden">Previous Button</small> 
            </button>
            <button class="slider-btn nextButton">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                <path d="M11.4291 0.661621L9.57493 2.5158L16.8934 9.83425H0.946106V12.455H16.8934L9.57493 19.7734L11.4291 21.6276L21.9121 11.1446L11.4291 0.661621Z" fill="currentColor"/>
                </svg>
                <small class="hidden">Next Button</small> 
            </button>
        </div>
	</div>
</section>


<?php
$customer_logos = get_field('customer_logos', 'option');
?>

<!-- Customers -->
<section class="st-customers space_3">
    <div class="container">
        <div class="st-customers__logos-wrap">
            <?php if( $customer_logos  ): ?>
                <div class="st-customers__logos">
                    <?php foreach( $customer_logos  as $logo ): ?>
                        <figure>
                        <?php echo wp_get_attachment_image( $logo, 'full' ); ?>
                        </figure>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>