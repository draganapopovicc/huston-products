<?php
$post_id = get_the_ID();
$title = get_the_title();
$excerpt = get_the_excerpt();
$publish_date = get_the_date('F j, Y', $post_id) . ' ' . strtolower(get_the_time('g:i A', $post_id));
$author = get_the_author();

$categories_list = get_the_category();
$filtered_categories = array_filter($categories_list, function($category) {
    return $category->slug !== 'uncategorized'; 
});
?>

<div class="grid_item">
    <a class="grid_item__link" href="<?php the_permalink(); ?>"><small class="hidden">Visit our blog</small></a>

    <?php if ($title) : ?>
        <div class="heading-secondary"><?php echo $title; ?> </div>
    <?php endif; ?>

    <div class="post-author-date">
        Posted by    
        <?php if ($author) : ?>
            <span class="post-author"> <?php echo $author ?></span> 
        <?php endif; ?>
        on <?php echo $publish_date; ?>
    </div>

    <?php if ($excerpt) :
        if (strlen($excerpt) <= 400){
        $trimmed_excerpt = $excerpt;
        }else{
            $trimmed_excerpt = substr($excerpt, 0, strpos($excerpt, ' ', 400));
            $trimmed_excerpt.="...";
        }

        $excerpt = sprintf("%s %s", $trimmed_excerpt, null);
        ?>
        <div class="entry-content"> <?php echo $excerpt;  ?> </div>
    <?php endif; ?>

    <!-- categories -->
    <?php if( !empty($filtered_categories) ) :?>
        <div class="post-categories-wrap">
            <p>Tags:</p>
            <div class="post-categories">
                <?php foreach ( $filtered_categories  as $category ) : ?>    
                    <div class="post-category">
                        <span><?php echo $category->name;?></span> 
                        <small class="divider">,</small>
                    </div>                
                <?php endforeach ?>
            </div>
        </div>
    <?php endif; ?>
</div>
