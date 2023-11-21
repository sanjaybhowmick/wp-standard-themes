<?php
/*
Template Name: Home
*/
get_header();
global $woocommerce;
$currency = get_woocommerce_currency_symbol();
?>
<!-- Banner -->
<div class="header">
<div class="banner">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
<?php
$count = -1;
$args = array(
'posts_per_page' => -1,
'post_type' => 'homebanner',
'post_status' => 'publish'
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
$count = $count + 1;
if ($count == 0)
{
$carClass = 'active';
} 
else {
$carClass = '';
}
?>  
<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $count;?>" class="<?php echo $carClass;?>"></li>
<?php endwhile;  wp_reset_query(); ?>
</ol>
<div class="carousel-inner">
<?php
$count = -1;
$args = array(
'posts_per_page' => -1,
'post_type' => 'homebanner',
'post_status' => 'publish'
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
$post_thumbnail_id    = get_post_thumbnail_id();
$sliding_banner    = wp_get_attachment_image_src($post_thumbnail_id, $size='full');
$sliding_banner_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );
$homebanner_link = get_post_meta( get_the_ID(), '_ewm_homebanner_link', true );
$count = $count + 1;
if ($count == 0)
{
$carClass = 'active';
} 
else {
$carClass = '';
}
?>
<div class="carousel-item <?php echo $carClass;?>">
<a href="<?php echo $homebanner_link;?>"><img src="<?php echo $sliding_banner[0];?>" alt="<?php echo $sliding_banner_alt;?>" class="d-block w-100 img-fluid"></a>
</div>

<?php endwhile;  wp_reset_query(); ?>
</div>


<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>
</div>
</div>
<!-- Banner -->

<!-- Body -->
<div class="container">
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="ourCollection">
<h4>Our Collections</h4>
<ul>

<!-- Home collection loop -->	
<?php
$args = array(
'posts_per_page' => -1,
'post_type' => 'homecollection',
'post_status' => 'publish'
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
$post_thumbnail_id    = get_post_thumbnail_id();
$featured_image    = wp_get_attachment_image_src($post_thumbnail_id, $size='full');
$featured_image_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );
$collection_link = get_post_meta( get_the_ID(), '_zedds_collection_link', true );
?>
<li>
<a href="<?php echo $collection_link;?>"><img src="<?php echo $featured_image[0];?>" alt="<?php echo $featured_image_alt;?>"></a>
<p><a href="<?php echo $collection_link;?>"><?php the_title();?></a></p> 
</li>
<?php endwhile;  wp_reset_query(); ?>
<!-- Home collection loop -->

</ul>
</div>
</div>
</div>
</div>

<div class="container-fluid eventBox">


<?php
$count = 0;
$args = array(
'posts_per_page' => -1,
'post_type' => 'promotionalbanner',
'post_status' => 'publish'
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
$post_thumbnail_id    = get_post_thumbnail_id();
$featured_image    = wp_get_attachment_image_src($post_thumbnail_id, $size='full');
$featured_image_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );
$promotionalbanner_link = get_post_meta( get_the_ID(), '_ewm_promotionalbanner_link', true );
$count = $count + 1;

if ($count % 2 == 0)
{
?>
<div class="row">
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 px-0"><img src="<?php echo $featured_image[0];?>" alt="<?php echo $featured_image_alt;?>" class="img-fluid space"></div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
<div class="eventBoxContain">
<h4><?php the_title();?></h4>
<?php the_content();?>
<div class="eventBoxBtn"><a href="<?php echo $promotionalbanner_link;?>">Shop More</a></div>
</div>
</div>
</div>
</div>
<?php
}
else {
?>
<div class="row">
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
<div class="eventBoxContain">
<h4><?php the_title();?></h4>
<?php the_content();?>
<div class="eventBoxBtn"><a href="<?php echo $promotionalbanner_link;?>">Shop More</a></div>
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 px-0"><img src="<?php echo $featured_image[0];?>" alt="<?php echo $featured_image_alt;?>" class="img-fluid space"></div>
</div>

<?php	
}
?>
<?php endwhile;  wp_reset_query(); ?>

<?php
$homepage_shop_title= get_post_meta( get_the_ID(), '_zedds_homepage_shop_title', true );
$homepage_shop_content= get_post_meta( get_the_ID(), '_zedds_homepage_shop_content', true );
$homepage_shop_url= get_post_meta( get_the_ID(), '_zedds_homepage_shop_url', true );
?> 
<div class="container-fluid ourShop">
<div class="row">
<div class="ourShopIn">               
<h3><?php echo $homepage_shop_title;?></h3>
<p><?php echo $homepage_shop_content;?></p>
<div class="ourShopBtn">
<a href="<?php echo $homepage_shop_url;?>">Shop More</a>
</div> 
</div>
</div>
</div>

<div class="container">
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="populerIteam">
<h4>Our Most Popular Items</h4>
<div class="populerIteamIn">
<div class="row">


<!-- Product loop -->
<?php
$args = array(
'posts_per_page' => 4,
'post_type' => 'product',
'post_status' => 'publish'
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
$post_thumbnail_id    = get_post_thumbnail_id();
$product_thumbnail    = wp_get_attachment_image_src($post_thumbnail_id, $size='full');
$product_thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );

$regular_price = get_post_meta( get_the_ID(), '_regular_price', true);
?>
<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
<img src="<?php echo $product_thumbnail[0];?>" alt="<?php echo $product_thumbnail_alt;?>" class="img-fluid">
<p><a href="<?php the_permalink();?>"><?php the_title();?></a></p>
<h6><?php echo $regular_price;?></h6>
</div>
<?php endwhile;  wp_reset_query(); ?>
<!-- Product loop -->



</div>
</div>
</div>
</div>
</div>
</div>
<!-- Body -->
<?php get_footer(); ?>
