<?php
/*
Template Name: Home
*/
get_header();
?>
<!-- Body -->
<!-- Banner -->

<div class="header banner">
<div id="banner" class="carousel slide" data-ride="carousel">

<ul class="carousel-indicators">
<?php
$count = -1;
$args = array(
'posts_per_page' => -1,
'post_type' => 'sliding_banner',
'post_status' => 'publish'
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
$post_thumbnail_id    = get_post_thumbnail_id();
$sliding_banner    = wp_get_attachment_image_src($post_thumbnail_id, $size='full');
$sliding_banner_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );	
$count = $count + 1;
if ($count == 0)
{
$carClass = 'active';
}	
else {
$carClass = '';
}
?>	
<li data-target="#banner" data-slide-to="<?php echo $count;?>" class="<?php echo $carClass;?>"></li>
<?php endwhile;  wp_reset_query(); ?>
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
<?php
$count = 0;
$args = array(
'posts_per_page' => -1,
'post_type' => 'sliding_banner',
'post_status' => 'publish'
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
$post_thumbnail_id    = get_post_thumbnail_id();
$sliding_banner    = wp_get_attachment_image_src($post_thumbnail_id, $size='full');
$sliding_banner_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );	
$count = $count + 1;
if ($count == 1)
{
$carClass = 'active';
}	
else {
$carClass = '';
}
?>	
<div class="carousel-item <?php echo $carClass;?>">
<img src="<?php echo $sliding_banner[0];?>" alt="<?php echo $sliding_banner_alt;?>">
<div class="bannerText">
    <h5>Dutch to English</h5>
    <p>Legal & Commercial Translations</p>
</div>
</div>

<?php endwhile;  wp_reset_query(); ?>
</div>

</div>
</div>

<!-- Banner -->
<div class="container">
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="servicesContainer">
<ul>
<!-- Services loop -->
<?php
$args = array(
'posts_per_page' => 3,
'post_type' => 'service',
'post_status' => 'publish'
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
$post_thumbnail_id    = get_post_thumbnail_id();
$service_image    = wp_get_attachment_image_src($post_thumbnail_id, $size='medium');
$service_image_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );	
?>
<li>
<h4><?php the_title();?></h4>
<img src="<?php echo $service_image[0];?>" alt="<?php echo $service_image_alt;?>">
<div class="serviceContent">
<p><?php echo excerpt(35);?></p>
</div>

<div class="more"><a href="<?php echo get_home_url();?>/services/">More</a></div>
</li>
<?php endwhile;  wp_reset_query(); ?>
<!-- Services loop -->

</ul>
</div>
</div>
</div>
<div class="row">
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
<div class="recentBlog">
<h3>Recent Blog Articles</h3>
<ul>
<!-- Posts loop -->
<?php
$args = array(
'posts_per_page' => 2,
'post_type' => 'post',
'post_status' => 'publish'
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
$post_thumbnail_id    = get_post_thumbnail_id();
$featured_image    = wp_get_attachment_image_src($post_thumbnail_id, $size='thumbnail');
$featured_image_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );	
?>
<li>
<h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
<div class="recentBlogImg float-left"><img src="<?php echo $featured_image[0];?>" alt="<?php echo $featured_image_alt;?>"></div>
<div class="recentBlogContain">
<div class="blogDate"><p><?php the_time('F jS, Y') ?></p></div>
<div class="blogText">
<p><?php echo excerpt(15);?></p>
</div>
</div>
<div class="clearfix"></div>
</li>
<?php endwhile;  wp_reset_query(); ?>
<!-- Posts loop -->

</ul>
<div class="more"><a href="<?php echo get_home_url();?>/blog/">more</a></div>
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
<div class="testimonialContainer">
<h3>Client Testimonials</h3>
<ul>

<!-- Testimonials loop -->
<?php
$args = array(
'posts_per_page' => 3,
'post_type' => 'testimonial',
'post_status' => 'publish'
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
?>
<li>
<?php the_content();?>
<h6><?php the_title();?></h6>
</li>
<?php endwhile;  wp_reset_query(); ?>
<!-- Testimonials loop -->

</ul>
<div class="more"><a href="<?php echo get_home_url();?>/testimonials/">more</a></div>
</div>
</div>
</div>
</div>

<!-- Body -->
<?php get_footer(); ?>