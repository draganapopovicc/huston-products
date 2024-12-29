<?php if( have_rows('socials', 'option') ): ?>
    <div class="st-socials">
        <?php while( have_rows('socials','option') ) : the_row();
            $social_name = get_sub_field('social_name');
            $social_url = get_sub_field('url_social');
            $icon = get_sub_field('icon_social');
            ?>
            <a aria-label="Visit us" class="st_icon" target="_blank" href="<?php echo $social_url; ?>">
                 <?php echo $icon ?>
                 
                 <?php if ($social_name): ?>
                    <span> <?php echo $social_name ?></span>
                 <?php endif ?>
            </a>
        <?php endwhile ?>
    </div>
<?php endif ?>