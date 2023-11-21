<?php
get_header();
?>
<div class="container">
<div class="row">
<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
<div class="commonInnerContainer">
<h1 class="pageHeading">Archive</h1>		
<?php 
if (have_posts()) : while (have_posts()) : the_post(); 
$post_thumbnail_id    = get_post_thumbnail_id();
$featured_image    = wp_get_attachment_image_src($post_thumbnail_id, $size='full');
$featured_image_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );
?>
<div class="postEntry">
<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
<?php if ($featured_image):?>
<div class="blogFeaturedImage"><img src="<?php echo $featured_image[0];?>" alt="<?php echo $featured_image_alt;?>"></div>
<?php endif;?>	
<p>
<small><?php the_time('F jS, Y') ?> by <?php the_author() ?></small>
</p>
<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>

<?php the_excerpt();?>
<div class="more"><a href="<?php the_permalink();?>">Read more</a></div>
</div>
<?php endwhile; endif; ?>

<div class="postNavigation">
<div class="alignleft"><?php next_posts_link('&laquo; Older Posts') ?></div>
<div class="alignright"><?php previous_posts_link('Newer Posts &raquo;') ?></div>
</div>

</div>
</div>


<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
<?php get_sidebar();?>
</div>	


</div>
</div>
<?php get_footer(); ?>