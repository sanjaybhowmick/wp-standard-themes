<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
<?php wp_title('&laquo;', true, 'right'); ?>
<?php bloginfo('name'); ?>
</title>
<?php wp_head(); ?>
</head>
<body>
<?php
//$general_info_options = get_option( 'general_info_option_name' );
?>	
<!-- Header -->
<div class="container-fluid topBorderBottom">
<div class="container">
<div class="row">
<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-12">
<div class="logo"><a href="<?php echo get_home_url();?>"><img src="https://www.projects.headerguru.com/zedds/wp-content/uploads/2020/01/logo.png" alt="logo"></a></div>
</div>
<div class="col-xl-10 col-lg-10 col-md-8 col-sm-12 col-12">
<div class="container topRight">
<div class="row">
<div class="col-xl-7 col-lg-7 col-md-4 col-sm-12 col-12">
<div class="navContainer">
<div id="NavigationCont">
<nav id="primary_nav_wrap">
<ul>
<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => false ) );?>
</ul>
</nav>
</div>
</div>
</div>
<div class="col-xl-3 col-lg-3 col-md-6 col-sm-8 col-8">
<div class="loginPart">
<?php
if ( is_user_logged_in() )
{
?>	
<p><a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a> / <a href="<?php echo get_home_url();?>/my-account/">My Account</a></p>
<?php
}
else {
?>
<p><a href="<?php echo get_home_url();?>/my-account/">Login</a> / <a href="<?php echo get_home_url();?>/my-account/">Register</a></p>
<?php	
}
?>
</div>
</div>
<div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-4">
<div class="cart"><a href="<?php echo wc_get_cart_url(); ?>"><i class="fas fa-shopping-cart"></i><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></a></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Header -->
