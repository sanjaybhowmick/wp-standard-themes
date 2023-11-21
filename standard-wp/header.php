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

<div class="container-fluid topContainer">
<div class="container">
<div class="row">
<div class="col-xl-2 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="logoContainer"><a href="<?php echo get_home_url();?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.jpg" alt="dutchlink-logo"></a></div>
</div>
<div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="topContact">

<ul>
	<li><p>Elizabeth: <a href="tel:+4407923482112">+44 (0)7923 482112</a></p></li>
	<li><p>Marion: <a href="tel:+4407919593932">+44 (0)7919 593932</a></p></li>
	<li><p><a href="mailto:info@dutchlink.co.uk">info@dutchlink.co.uk</a></p></li>
	<li><div class="topSocial"><a href="https://www.linkedin.com/company/dutchlink-translations" target="_blank"><i class="fab fa-linkedin-in"></i></a></div></li>
</ul>
</div>
</div>
</div>
</div>
</div>

<div class="container-fluid navContainer">
<div class="container">
<div class="row">
<div class="col-xl-12">
<div id="NavigationCont">
<nav id="primary_nav_wrap">
<ul>
<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => false ) );?>
</ul>
</nav>
</div>
</div>
</div>
</div>
</div>