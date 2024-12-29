<?php
if (is_post_type_archive('product')) {
    $prefix_title_action = get_field('archive_action_prefix', 'option');
    $title_action = get_field('archive_action_title', 'option');
    $video_iframe = get_field('video_action_iframe', 'option');
}

else if (is_tax('product-category')) { 
    $current_term = get_queried_object();
    $prefix_title_action = get_field('category_action_prefix',  $current_term);
    $title_action = get_field('category_action_title',  $current_term);
    $video_iframe = get_field('category_video_action_iframe',  $current_term);
}
?>

<?php if($video_iframe): ?>
<section class="st-product-action space_1">
		<div class="container"> 
			<?php if($title_action|| $prefix_title_action ): ?>
				<div class="b-title b-title-section">
					<?php if( $prefix_title_action ): ?>
						<p class="b-title__prefix"> 
							<?php echo $prefix_title_action ?>
						</p>
					<?php endif ?>
					<?php if( $title_action ): ?>
						<h2 class="b-title__main title-2"> <?php echo $title_action ?> </h2>
					<?php endif ?>
				</div>
			<?php endif ?>

			<?php if ($video_iframe ): ?>
			 <div class="st-product-action__video">
				<?php echo $video_iframe ?>
			 </div>	
			<?php endif ?>
		</div>
	</section>
<?php endif ?>