<?php
get_header();
?>
<div class="container">
<div class="row">
<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
<div class="commonInnerContainer">
<?php

      if ( is_category() ) {
    $title  = single_cat_title( '', false );
    $prefix = _x( 'Category:', 'category archive title prefix' );
  } elseif ( is_tag() ) {
    $title  = single_tag_title( '', false );
    $prefix = _x( 'Tag:', 'tag archive title prefix' );
  } elseif ( is_author() ) {
    $title  = get_the_author();
    $prefix = _x( 'Author:', 'author archive title prefix' );
  } elseif ( is_year() ) {
    /* translators: See https://www.php.net/manual/datetime.format.php */
    $title  = get_the_date( _x( 'Y', 'yearly archives date format' ) );
    $prefix = _x( 'Year:', 'date archive title prefix' );
  } elseif ( is_month() ) {
    /* translators: See https://www.php.net/manual/datetime.format.php */
    $title  = get_the_date( _x( 'F Y', 'monthly archives date format' ) );
    $prefix = _x( 'Month:', 'date archive title prefix' );
  } elseif ( is_day() ) {
    /* translators: See https://www.php.net/manual/datetime.format.php */
    $title  = get_the_date( _x( 'F j, Y', 'daily archives date format' ) );
    $prefix = _x( 'Day:', 'date archive title prefix' );
  } elseif ( is_tax( 'post_format' ) ) {
    if ( is_tax( 'post_format', 'post-format-aside' ) ) {
      $title = _x( 'Asides', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
      $title = _x( 'Galleries', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
      $title = _x( 'Images', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
      $title = _x( 'Videos', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
      $title = _x( 'Quotes', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
      $title = _x( 'Links', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
      $title = _x( 'Statuses', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
      $title = _x( 'Audio', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
      $title = _x( 'Chats', 'post format archive title' );
    }
  } elseif ( is_post_type_archive() ) {
    $title  = post_type_archive_title( '', false );
    $prefix = _x( 'Archives:', 'post type archive title prefix' );
  } elseif ( is_tax() ) {
    $queried_object = get_queried_object();
    if ( $queried_object ) {
      $tax    = get_taxonomy( $queried_object->taxonomy );
      $title  = single_term_title( '', false );
      $prefix = sprintf(
        /* translators: %s: Taxonomy singular name. */
        _x( '%s:', 'taxonomy term archive title prefix' ),
        $tax->labels->singular_name
      );
    }
  }

  $original_title = $title;
  ?>  
<h1 class="pageHeading"><?php echo $original_title;?></h1>		
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
