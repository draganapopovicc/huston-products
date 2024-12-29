<?php
$testimony_id = get_the_ID();
$logo = get_field('testimonial_client_logo',$testimony_id );
$testimony = get_field('testimonial_testimony',$testimony_id );
$author = get_field('testimonial_author',$testimony_id );
$business_area = get_field('testimonial_business_area',$testimony_id);
?>

<div class="st-testimonial carousel-cell">
    <?php if( $logo ) : ?>
        <figure class="st-testimonial__logo">
            <?php
                echo wp_get_attachment_image( $logo, 'full', "");
            ?>
        </figure>
    <?php endif ?>

    <?php if($testimony): ?>
        <div class="st-testimonial__testimony"> <?php echo $testimony ?> </div>
    <?php endif ?>

    <?php if($author): ?>
        <p class="st-testimonial__author"> <?php echo $author ?> </p>
    <?php endif ?>
        
    <?php if($business_area): ?>
        <p class="st-testimonial__business-area"> <?php echo $business_area ?> </p>
    <?php endif ?>
</div>