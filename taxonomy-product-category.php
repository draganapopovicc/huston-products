<?php
/**
 * The template for displaying all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package stier
 */

get_header();

$current_term = get_queried_object();
$show_products = get_field('show_products', 'product-category_' . $current_term->term_id); 

$bg_img = get_field('desktop_hero_image_category', $current_term);
$bg_img_mob = get_field('desktop_hero_image_category', $current_term);
?>

<main id="primary" class="site-main">
    <?php get_template_part('template-parts/archive', 'hero'); ?>
    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <div class="st-products st-products-category space_3_1">
        <div class="container">
            <div class="st-products__all cols-3 tab-cols-2 mob-cols-1">

                <?php if($show_products) :
                    $term_ids = get_term_children( $current_term->term_id, 'product-category' );
                    $term_ids[] = $current_term->term_id;
                    
                    $query = new WP_Query(array(
                        'post_type'      => 'product',
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'product-category',   
                                'field'    => 'term_id',          
                                'terms'    => $term_ids,            
                                'operator' => 'IN',             
                            ),
                        ),
                        'posts_per_page' => -1, 
                    ));

                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            get_template_part('template-parts/content', 'product'); 
                        }
                    };
                    wp_reset_postdata(); // Restore original post data

                    else: ?>

                    <?php $current_term_child_categories = get_terms([
                        'taxonomy' => $current_term ->taxonomy,
                        'parent' => $current_term->term_id,
                        'hide_empty'=> false
                    ]); ?>

                    <?php if($current_term_child_categories): ?>
                        <?php  foreach($current_term_child_categories as $category): ?>
                            <?php set_query_var('category', $category) ?>
                            <?php get_template_part('template-parts/content', 'category');?>
                        <?php endforeach ?>
                    <?php endif ?> 

                <?php endif?>
            </div>
        </div>
    </div>
    <!-- Product in Action -->
	<?php get_template_part('template-parts/archive', 'product-action'); ?>

<?php get_template_part('template-parts/faq'); ?>
<?php get_template_part('template-parts/above-footer'); ?>
</main><!-- #main -->

<?php
get_footer();




