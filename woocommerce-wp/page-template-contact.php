<?php
/*
Template Name: Contact
*/
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
</div>
<div class="container-fluid grayBackground">
<div class="container">
<div class="row">
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
<h4><?php the_title();?></h4>
<h5>Get In Touch</h5>
<?php echo do_shortcode ('[contact-form-7 id="87" title="Contact form"]');?>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
<h5>Here to Help</h5>
<p>We are always here to help so if you have any questions or just need a little help feel free to call or email.</p>
<p><strong>Address:</strong> 21B, Fern Road Rudrasheela Apartment (Ground Floor)<br>Near Ballygunge Station,Kolkata-700019. </p>
<p><strong>Phone:</strong> 9830460803</p>
<p><strong>Business Hours:</strong> 10:00 - 21:00 Monday to Sunday</p>
</div>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="mapContainer">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3685.5285518611654!2d88.36239831436507!3d22.521864940508113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0276d5d9fc004d%3A0x5a26d3225496ac3f!2s14%2C+48%2F3%2C+Gariahat+Rd%2C+Dover+Terrace%2C+Ballygunge%2C+Kolkata%2C+West+Bengal+700019!5e0!3m2!1sen!2sin!4v1559652954899!5m2!1sen!2sin" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
</div>
</div>
</div>
<!-- Body -->
<?php get_footer(); ?>