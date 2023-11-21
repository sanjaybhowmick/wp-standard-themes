<?php
defined( 'ABSPATH' ) || exit;

get_header();
?>
<div class="container col-container woocommerce">
<div class="row">
<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
<div class="pageName">
<ul>
<li><p><a href="<?php echo get_home_url();?>">Home</a> /</p></li>
<li><p><span class="pageNameselect"><?php the_title();?></span></p></li>
</ul>
</div>
<?php
do_action( 'woocommerce_archive_description' );
?>
<?php
if ( woocommerce_product_loop() ) {
?>
<div class="row">
<?php
do_action( 'woocommerce_before_shop_loop' );
?>
</div> 

<?php
woocommerce_product_loop_start();

if ( wc_get_loop_prop( 'total' ) ) {
while ( have_posts() ) {
the_post();

do_action( 'woocommerce_shop_loop' );
wc_get_template_part( 'content', 'product' );
}
}woocommerce_product_loop_end();

do_action( 'woocommerce_after_shop_loop' );
} else {
do_action( 'woocommerce_no_products_found' );
}


//do_action( 'woocommerce_after_main_content' );

?>
</div>

<!-- Sidebar -->
<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 sideBar">
<h6>Follow Us</h6>
<div class="sideBarSocial">
<ul>
<li><a href="https://www.facebook.com/zedds.kolkata/?ref=aymt_homepage_panel&eid=ARCXPTepulGHeNekKZIHr34uN6U49VrNZyDEiRfMQqB53qUT1Sy_ppcW_tq0b_F9VlLZMNKk8gIwScqO" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
<li><a href="https://twitter.com/Zedds13" target="_blank"><i class="fab fa-twitter"></i></a></li>
<li><a href="https://www.instagram.com/zedds_fashion/" target="_blank"><i class="fab fa-instagram"></i></a></li>
</ul>
</div>	
<?php
do_action( 'woocommerce_sidebar' );
?>
</div>	
<!-- Sidebar -->
</div>
<!-- </div> -->
</div>
<?php echo get_footer();?>