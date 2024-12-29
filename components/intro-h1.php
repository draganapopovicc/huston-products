<?php
$prefix_title = get_field('prefix_title');
$title = get_field('title');
$intro_text = get_field('intro_title');
?>

<?php if($intro_text || $title || $prefix_title): ?>
	<div class="b-title b-title-h1">
		<?php if( $prefix_title ): ?>
			<p class="b-title__prefix"> 				
				<?php echo $prefix_title ?>
			</p>
		<?php endif ?>
		<?php if( $title ): ?>
			<h1 class="b-title__main title-1"> <?php echo $title ?> </h1>
		<?php endif ?>
		<?php if($intro_text): ?>
			<div  class="b-title__intro"> <?php echo $intro_text; ?> </div>
		<?php endif ?>
	</div>
<?php endif ?>