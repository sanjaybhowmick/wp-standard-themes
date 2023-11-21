<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header();
?>
<div class="container col-container woocommerce singleProduct">
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="pageName">
<ul>
<li><p><a href="<?php echo get_home_url();?>">Home</a> /</p></li>
<li><p><a href="<?php echo get_home_url();?>/collections/">Collections</a> /</p></li>
<li><p><span class="pageNameselect"><?php the_title();?></span></p></li>
</ul>
</div>
<?php while ( have_posts() ) : the_post(); ?>
<?php wc_get_template_part( 'content', 'single-product' ); ?>
<?php endwhile; // end of the loop. ?>
<?php //do_action( 'woocommerce_after_main_content' );?>

</div>

</div>
<!-- </div> -->
</div>
<?php echo get_footer();?>





































	