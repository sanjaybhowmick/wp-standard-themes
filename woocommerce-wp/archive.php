<?php
get_header();
?>
<!-- Body -->
<div class="container">
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="pageName">
<ul>
<li><p><a href="<?php echo get_home_url();?>">Home</a> /</p></li>
<li><p><span class="pageNameselect"><?php the_title();?></span></p></li>
</ul>
</div>
</div>
</div>
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<h4><?php the_title();?></h4>
</div>
</div>
</div>
<div class="container-fluid grayBackground">
<div class="container">
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
<?php the_content();?>
<?php endwhile; endif; ?>
</div>
</div>
</div>
</div>
<div class="container innerPageSocial">
<div class="row">
<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
<div class="innerPageSocialIcon"><i class="fab fa-facebook-f"></i></div>
<h6>Facebook</h6>
<p>Follow us on Facebook and be the first to know about new products and amazing VIP offers.</p>
</div>
<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
<div class="innerPageSocialIcon"><i class="fab fa-instagram"></i></div>
<h6>Instagram</h6>
<p>Connect with us on Instagram for Shabby Chic inspiration and ideas straight to your mobile device.</p>
</div>
<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
<div class="innerPageSocialIcon"><i class="fas fa-hands"></i></div>
<h6>Customer Support</h6>
<p>First class customer support is our absolute priority if your not happy we are not happy.</p>
</div>
</div>
</div>
<!-- Body -->
<?php get_footer(); ?>