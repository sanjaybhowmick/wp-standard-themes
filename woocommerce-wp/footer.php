<?php
//$general_info_options = get_option( 'general_info_option_name' );
?>
<!-- Footer -->
<div class="container-fluid footerContainer">
<div class="container">
<div class="row">
<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
<div class="footerNav">
<ul>
<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container' => false ) );?>
</ul>
</div>
<div class="copyright"><p>Copyright <?php echo date('Y');?> Zeds Fashion. All Rights Reserved</p></div>
</div>
<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
<div class="footerSocial">
<ul>
<li><a href="https://www.facebook.com/zedds.kolkata/?ref=aymt_homepage_panel&eid=ARCXPTepulGHeNekKZIHr34uN6U49VrNZyDEiRfMQqB53qUT1Sy_ppcW_tq0b_F9VlLZMNKk8gIwScqO" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
<li><a href="https://twitter.com/Zedds13" target="_blank"><i class="fab fa-twitter"></i></a></li>
<li><a href="https://www.instagram.com/zedds_fashion/" target="_blank"><i class="fab fa-instagram"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<!-- Footer --> 
<?php wp_footer(); ?>
</body>
</html>