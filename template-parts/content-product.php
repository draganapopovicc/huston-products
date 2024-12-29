<?php
$product_id = get_the_ID();
$title = get_the_title();
$excerpt = get_the_excerpt();
$image = get_the_post_thumbnail($product_id  , 'large');
?>

<div class="st-product st-product--layer">
    <a class="st-product__link" aria-label="Look our product - <?php echo $title ?>" href="<?php the_permalink(); ?>">
        <small class="hidden">Look our product</small>
    </a>

    <?php if ($image) : ?>
        <figure class="st-product__image">
            <?php echo $image; ?>
        </figure>
    <?php endif; ?>

    <div class="st-product__desc">
        <?php if ($title) : ?>
            <p class="st-product__title"><?php echo $title ?></p>
        <?php endif; ?>
        <?php if ($excerpt) : ?>
            <div class="st-product__excerpt"><?php echo $excerpt ?></div>
        <?php endif; ?>
    </div>

    <?php if ($image) : ?>
        <div class="st-product__btn btn btn-1">View Product</div>
    <?php endif; ?>
</div> 
