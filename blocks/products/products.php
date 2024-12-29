<?php
$col_class = 'st-products__all';

$cols = get_field_object('desktop_columns');
$tab_cols = get_field_object('tab_columns');
$mob_cols = get_field_object('mob_columns');
if ( ! empty( $cols ) ) {
	$col_class .=  ' ' . $cols['value'];
}
if ( ! empty( $tab_cols ) ) {
    $col_class .=  ' ' . $tab_cols['value'];
}
if ( ! empty( $mob_cols ) ) {
    $col_class .=  ' ' . $mob_cols['value'];
}

$class = 'st-products';
if ( ! empty( $block['className'] ) ) {
	$class .= ' ' . $block['className'];
}

$padding = get_field_object('padding');
if ( ! empty( $padding) ) {
    $class .=  ' ' . $padding['value'];
}

$bg_color = get_field('background_color_products');
$style = "background-color: $bg_color"; 

$product_categories = get_terms([
	'taxonomy' => 'product-category',
	'parent' => 0,
	'hide_empty' => 'false',
	'orderby' => 'name', 
    'order' => 'DESC', 
]);
?>

<section class="<?php echo $class ?>" style="<?php echo $style ?>">
	<div class="container">
		<?php get_template_part('components/intro'); ?>

		<?php if( $product_categories  ): ?>
			<div class="<?php echo $col_class ?>">
				<?php  foreach($product_categories as $category): ?>
					<?php set_query_var('category', $category) ?>
					<?php get_template_part('template-parts/content', 'category');?>
				<?php endforeach ?>
			</div>
		<?php endif ?>
	</div>
</section>









