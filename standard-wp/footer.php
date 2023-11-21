<div class="container-fluid footerContainer">
<div class="container">
<div class="row">
<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
<p>Email – <a href="mailto:info@dutchlink.co.uk">info@dutchlink.co.uk</a> <br>
Phone – Elizabeth <a href="tel:+4407923482112">+44 (0)7923 482112</a> | Marion <a href="tel:+4407919593932">+44 (0)7919 593932</a></p>
<p>Copyright © <?php echo date('Y');?> DUTCHLINK. All Rights Reserved.</p>
</div>
<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
<div class="footerNav">
<ul>
<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container' => false ) );?>
</ul>
</div>
</div>
</div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>