
<?php
$product_args = array(
    'post_type'      => 'product',
    'posts_per_page' => 10,
    's'              => get_search_query(),
    'post_status'    => 'publish',
);

$post_args = array(
    'post_type'      => 'post',
    'posts_per_page' => 10,
    's'              => get_search_query(),
    'post_status'    => 'publish',
);

$product_query = new WP_Query( $product_args );
$post_query = new WP_Query( $post_args );

get_header();
?>

	<main id="primary" class="site-main search-results space_1">
        <div class="container">
            <div class="b-title b-title-h1">
                <h1 class="b-title__main title-1">
                    <?php printf( esc_attr__( 'Search results: %s', 'huston-products' ), '<span>' . get_search_query() . '</span>' );?>
                </h1>
            </div>

            <div class="search-results__content">
                <!-- Product Section-->
                <?php if ( $product_query->have_posts() ) : ?>
                    <section class="search-results__products">
                        <p class="number-of-results">
                            <?php
                            printf(
                                _n(
                                    'Product (%s)', 
                                    'Products (%s)',   
                                    $product_query->found_posts, 
                                    'stier' 
                                ),
                                number_format_i18n( $product_query->found_posts ) 
                            );
                            ?>
                        </p>
                        <div class="st-products__all cols-4 tab-cols-2 mob-cols-1"">
                            <?php
                            while ( $product_query->have_posts() ) : $product_query->the_post();?>
                                <?php  get_template_part('template-parts/content', 'product');  ?>
                            <?php endwhile; ?>
                        </div>
                    </section>
                <?php endif;
                ?>

                <!-- Posts Section-->
                <?php if ( $post_query->have_posts() ) : ?>
                    <section class="search-results-posts">
                        <p class="number-of-results">
                            <?php
                            printf(
                                _n(
                                    'Post (%s)', 
                                    'Posts (%s)',   
                                    $product_query->found_posts, 
                                    'stier' 
                                ),
                                number_format_i18n( $post_query->found_posts )
                            );
                            ?>
                        </p>
                        <div class="posts_grid__all">
                            <?php
                            while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
                                <?php get_template_part( 'template-parts/content', get_post_type() );?>
                            <?php endwhile; ?>
                        </div>
                    </section>
                <?php endif; ?>

                <!-- If No Results -->
                <?php if ( !$product_query->have_posts() && !$post_query->have_posts() ) : ?>
                    <div class="no-results">
                        <h2>0 results</h2>
                        <p>Sorry, but nothing matched your search terms. Please try again with different keywords.</p>
                        <a href="<?php echo get_home_url(); ?>" class="btn btn-1">Go Home <span></span> </a>
                    </div>
                <?php endif; ?>

                <?php wp_reset_postdata(); ?>
            </div>
        </div>
	</main><!-- #main -->
<?php
get_footer();