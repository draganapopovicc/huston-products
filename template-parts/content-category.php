<?php
if (!isset($category) || empty($category)) {
    return;
}

$category_id = $category->term_id;
$category_name = $category->name;
$category_desc = $category->description;
$category_link = get_term_link($category);
$category_image = get_field('category_image', 'product-category_' . $category_id); 

// Category link directly on single product
$show_product_card = get_field('go_on_product', $category->taxonomy . '_' . $category->term_id);
$product_link = get_field('product_link_cat',  $category->taxonomy . '_' . $category->term_id);
if ($product_link) {
    $product_link_url = $product_link['url'];
}
?>

   <div class="st-product">
        <?php if ($product_link && $show_product_card): ?>
            <a class="st-product__link" aria-label="Look our product" href="<?php echo esc_url($product_link_url); ?>">
                <small class="hidden">Look our Product</small>
            </a>
        <?php else: ?>
            <a class="st-product__link" aria-label="Look our subcategories" href="<?php echo esc_url($category_link); ?>">
                <small class="hidden">Look our categories</small>
            </a>
        <?php endif ?>

        <?php if ($category_image) : ?>
             <figure class="st-product__image">
                <img src="<?php echo esc_url($category_image['url']); ?>" alt="<?php echo esc_attr($category_name); ?>">
            </figure>
        <?php endif; ?>

        <div class="st-product__desc">
           <?php if ($category_name) : ?>
                <p class="st-product__title"><?php echo $category_name?></p>
          <?php endif; ?>

            <?php if ($category_desc) : ?>
                <div class="st-product__excerpt"><?php echo $category_desc ?></div>
            <?php endif; ?>
        </div>
             
       <?php if ($product_link && $show_product_card): ?>
            <div class="st-product__btn btn btn-1">View Product</div>
        <?php else: ?>
            <div class="st-product__btn btn btn-1">View All</div>
        <?php endif ?>
   </div>

