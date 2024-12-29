<?php
if (is_post_type_archive('product')) {
    $bg_img = get_field('desktop_image_archive_product','option');
    $bg_img_mob = get_field('mobile_image_archive_product','option');
    $size = 'full';

    $title = get_field('title_archive_product', 'option');
    $prefix_title = get_field('prefix_archive_product', 'option');

    $btn1 = get_field('button_1_archive_product','option');
    $btn2 = get_field('button_2_archive_product','option');
}
else if(is_home()) {
    $bg_img = get_field('desktop_image_archive_blog','option');
    $bg_img_mob = get_field('mobile_image_archive_blog','option');
    $size = 'full';

    $title = get_field('title_archive_blog', 'option');
    $prefix_title = get_field('prefix_archive_blog', 'option');
    
    $btn1 = get_field('button_1_archive_blog','option');
    $btn2 = get_field('button_2_archive_blog','option');
}
else if (is_tax('product-category')) { 
    $current_term = get_queried_object(); 

    $bg_img = get_field('desktop_hero_image_category', $current_term);
    $bg_img_mob = get_field('mobile_hero_image_category', $current_term);
    $size = 'full';
    
    $title = $current_term->name;
    $prefix_title = 'Category';

    $btn1 = get_field('hero_button_1_category', $current_term);
    $btn2 = get_field('hero_button_2_category', $current_term);
}

?>

<div class="st_inner-hero" >
    <?php if($bg_img || $bg_img_mob ) { ?>
        <div class="block_bg" >
            <?php
            if( $bg_img ) {
                echo wp_get_attachment_image( $bg_img, $size, "",array( 'class' => 'bg_img  desk_bg' ) );
            }
            if( $bg_img_mob ) {
                echo wp_get_attachment_image( $bg_img_mob, $size, "",array( 'class' => 'bg_img  mob_bg' ) );
            }
            ?>
        </div>
    <?php } ?>

    <div class="container st_hero__container">
        <div class="st_inner-hero__content">
            <?php if( $title || $prefix_title): ?>
                <div class="b-title b-title-h1">
                    <?php if( $prefix_title ): ?>
                        <p class="b-title__prefix"> 				
                            <?php echo $prefix_title ?>
                        </p>
                    <?php endif ?>
                    <?php if( $title ): ?>
                        <h1 class="b-title__main title-1"> <?php echo $title ?> </h1>
                    <?php endif ?>
                </div>
            <?php endif ?>
            <?php if( !empty($btn1 || $btn2) ) : ?>
                <div class="btns">
                    <?php
                    if( $btn1 ):
                        $btn1_url = $btn1['url'];
                        $btn1_title = $btn1['title'];
                        $btn1_target = $btn1['target'] ? $btn1['target'] : '_self';
                        ?>
                        <a class="btn btn-1" href="<?php echo esc_url( $btn1_url ); ?>" target="<?php echo esc_attr( $btn1_target ); ?>"><?php echo esc_html( $btn1_title ); ?> </a>
                    <?php endif; ?>
                    <?php
                    if( $btn2 ):
                        $btn2_url = $btn2['url'];
                        $btn2_title = $btn2['title'];
                        $btn2_target = $btn2['target'] ? $btn2['target'] : '_self';
                        ?>
                        <a class="btn btn-2" href="<?php echo esc_url( $btn2_url ); ?>" target="<?php echo esc_attr( $btn2_target ); ?>"><?php echo esc_html( $btn2_title ); ?> </a>
                    <?php endif; ?>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>