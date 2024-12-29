<?php
get_header();
//About us
$prefix_title = get_field('prefix_title', 'option');
$title = get_field('title', 'option');
$intro_text = get_field('intro_title', 'option');
$btn1 = get_field('button_1', 'option');
$btn2 = get_field('button_2', 'option');

//Product in Action
$prefix_title_action = get_field('archive_action_prefix', 'option');
$title_action = get_field('archive_action_title', 'option');
$video_iframe = get_field('video_action_iframe', 'option');

$product_categories = get_terms([
	'taxonomy' => 'product-category',
	'parent' => 0,
	'hide_empty' => 'false',
	'orderby' => 'name', 
    'order' => 'DESC', 
]);

$current_term = get_queried_object();


?>

<main id="primary" class="site-main">
    <?php get_template_part('template-parts/archive', 'hero'); ?>

	<!-- about us -->
    <section class="st-about-us space_1_2" >
		<div class="container "> 
			<div class="st-about-us__wrap">
				<?php if($intro_text || $title || $prefix_title): ?>
					<div class="b-title b-title-section">
						<div class="b-title__wrap">
							<?php if( $prefix_title ): ?>
								<p class="b-title__prefix"> 
									<?php echo $prefix_title ?>
								</p>
							<?php endif ?>

							<?php if( $title ): ?>
								<h2 class="b-title__main title-2"> <?php echo $title ?> </h2>
							<?php endif ?>
						</div>
						<div class="st-about-us__btn-wrap">
							<?php if($intro_text): ?>
								<div  class="b-title__intro"> <?php echo $intro_text; ?> </div>
							<?php endif ?>
                            <?php if( !empty($btn1 || $btn2) ) : ?>
								<div class="btns">
									<?php
									if( $btn1 ):
										$btn1_url = $btn1['url'];
										$btn1_title = $btn1['title'];
										$btn1_target = $btn1['target'] ? $btn1['target'] : '_self';
										?>
										<a class="btn btn-5" href="<?php echo esc_url( $btn1_url ); ?>" target="<?php echo esc_attr( $btn1_target ); ?>"><?php echo esc_html( $btn1_title ); ?> </a>
									<?php endif; ?>
									<?php
									if( $btn2 ):
										$btn2_url = $btn2['url'];
										$btn2_title = $btn2['title'];
										$btn2_target = $btn2['target'] ? $btn2['target'] : '_self';
										?>
										<a class="btn btn-5" href="<?php echo esc_url( $btn2_url ); ?>" target="<?php echo esc_attr( $btn2_target ); ?>"><?php echo esc_html( $btn2_title ); ?> </a>
									<?php endif; ?>
								</div>
							<?php endif?>
						</div> 
					</div>
				<?php endif ?>
			</div>
		</div>
    </section>

	<!-- main categories -->
    <section class="st-products space_3_1">
        <div class="container">
            <?php if( $product_categories  ): ?>
                <div class="st-products__all cols-4 tab-cols-2 mob-cols-1">
                    <?php  foreach($product_categories as $category): ?>
                        <?php set_query_var('category', $category) ?>
                        <?php get_template_part('template-parts/content', 'category');?>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        </div>
    </section>

	<!-- Product in Action -->
	<?php get_template_part('template-parts/archive', 'product-action'); ?>

    <?php get_template_part('template-parts/faq'); ?>
    <?php get_template_part('template-parts/above-footer'); ?>
</main><!-- #main -->

<?php get_footer(); ?>

