<?php
/*
Template Name: Contact
*/
get_header();
$post_thumbnail_id    = get_post_thumbnail_id();
$inner_banner    = wp_get_attachment_image_src($post_thumbnail_id, $size='full');
$inner_banner_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );
?>

<?php if ($inner_banner):?>
<div class="header banner">
<img src="<?php echo $inner_banner[0];?>" alt="<?php echo $inner_banner_alt;?>">
</div>
<?php endif;?>

<div class="container">
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="contactContainer">
<h3><?php the_title();?></h3>
<div class="contactPage">
<div class="container">
<div class="row">
<div class="col-xl-6 col-lg-6 col-md-12 col-xs-12 col-12">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php the_content();?>
<?php endwhile; endif; ?>
</div>
<div class="col-xl-6 col-lg-6 col-md-12 col-xs-12 col-12">
<div class="contactInfo">
<div class="container">
<div class="row">
<div class="col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2"><i class="fas fa-map-marker-alt contactIcon"></i></div>
<div class="col-xl-10 col-lg-10 col-md-10 col-xs-10 col-10">
<p>316 Beulah Hill, London SE19 3HF</p>
</div>
</div>
</div>
</div>
<div class="contactInfo">
<div class="container">
<div class="row">
<div class="col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2"><i class="fas fa-mobile-alt contactIcon"></i></div>
<div class="col-xl-10 col-lg-10 col-md-10 col-xs-10 col-10">
<p>
Elizabeth <a href="tel:+4407923482112">+44(0)7923 48 2112</a><br>
Marion <a href="tel:+4407919593932">+44(0)7919 593932</a>
</p>
</div>
</div>
</div>
</div>
<div class="contactInfo">
<div class="container">
<div class="row">
<div class="col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2"><i class="fas fa-envelope contactIcon"></i></div>
<div class="col-xl-10 col-lg-10 col-md-10 col-xs-10 col-10">
<p><a href="mailto:info@dutchlink.co.uk">info@dutchlink.co.uk</a></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>

<?php get_footer(); ?>