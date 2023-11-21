<?php
// WooCommerce
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );  

// Enable product gallery features
function mytheme_add_woocommerce_gallery() {
  add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_gallery' );

// product price display order change
if (!function_exists('my_commonPriceHtml')) {

    function my_commonPriceHtml($price_amt, $regular_price, $sale_price) {
        $html_price = '<p class="price">';
        //if product is in sale
        if (($price_amt == $sale_price) && ($sale_price != 0)) {
            $html_price .= '<ins>' . wc_price($sale_price) . '</ins>';
            $html_price .= '<del>' . wc_price($regular_price) . '</del>';
        }
        //in sale but free
        else if (($price_amt == $sale_price) && ($sale_price == 0)) {
            $html_price .= '<ins>Free!</ins>';
            $html_price .= '<del>' . wc_price($regular_price) . '</del>';
        }
        //not is sale
        else if (($price_amt == $regular_price) && ($regular_price != 0)) {
            $html_price .= '<ins>' . wc_price($regular_price) . '</ins>';
        }
        //for free product
        else if (($price_amt == $regular_price) && ($regular_price == 0)) {
            $html_price .= '<ins>Free!</ins>';
        }
        $html_price .= '</p>';
        return $html_price;
    }

}

add_filter('woocommerce_get_price_html', 'my_simple_product_price_html', 100, 2);

function my_simple_product_price_html($price, $product) {
    if ($product->is_type('simple')) {
        $regular_price = $product->get_regular_price();
        $sale_price = $product->get_sale_price();
        $price_amt = $product->get_price();
        return my_commonPriceHtml($price_amt, $regular_price, $sale_price);
    } else {
        return $price;
    }
}

add_filter('woocommerce_variation_sale_price_html', 'my_variable_product_price_html', 10, 2);
add_filter('woocommerce_variation_price_html', 'my_variable_product_price_html', 10, 2);

function my_variable_product_price_html($price, $variation) {
    $variation_id = $variation->variation_id;
    //creating the product object
    $variable_product = new WC_Product($variation_id);

    $regular_price = $variable_product->get_regular_price();
    $sale_price = $variable_product->get_sale_price();
    $price_amt = $variable_product->get_price();

    return my_commonPriceHtml($price_amt, $regular_price, $sale_price);
}

add_filter('woocommerce_variable_sale_price_html', 'my_variable_product_minmax_price_html', 10, 2);
add_filter('woocommerce_variable_price_html', 'my_variable_product_minmax_price_html', 10, 2);

function my_variable_product_minmax_price_html($price, $product) {
    $variation_min_price = $product->get_variation_price('min', true);
    $variation_max_price = $product->get_variation_price('max', true);
    $variation_min_regular_price = $product->get_variation_regular_price('min', true);
    $variation_max_regular_price = $product->get_variation_regular_price('max', true);

    if (($variation_min_price == $variation_min_regular_price) && ($variation_max_price == $variation_max_regular_price)) {
        $html_min_max_price = $price;
    } else {
        $html_price = '<p class="price">';
        $html_price .= '<ins>' . wc_price($variation_min_price) . '-' . wc_price($variation_max_price) . '</ins>';
        $html_price .= '<del>' . wc_price($variation_min_regular_price) . '-' . wc_price($variation_max_regular_price) . '</del>';
        $html_min_max_price = $html_price;
    }

    return $html_min_max_price;
}


// Change number of products per page
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 12;
  return $cols;
}


//Change number or products per row to 3
 
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 3; // 3 products per row
  }
}


// Add WooCommerce default style
function woocommmerce_style() {
   wp_enqueue_style('woocommerce_stylesheet', WP_PLUGIN_URL. '/woocommerce/assets/css/woocommerce.css',true,'1.0',"all");
}
add_action( 'wp_head', 'woocommmerce_style' );

// Gallery image function
   //remove_action( 'wc_get_gallery_image_html', 'woocommerce_show_product_images', 20);
   //add_action( 'wc_get_gallery_image_html', 'wc_get_gallery_image_html_update', 20);


// function wc_get_gallery_image_html_update( $attachment_id, $main_image = false ) {
//   $flexslider        = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );
//   $gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
//   $thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
//   $image_size        = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size );
//   $full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
//   $thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
//   $full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
//   $alt_text          = trim( wp_strip_all_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );
//   $image             = wp_get_attachment_image(
//     $attachment_id,
//     $image_size,
//     false,
//     apply_filters(
//       'woocommerce_gallery_image_html_attachment_image_params',
//       array(
//         'title'                   => _wp_specialchars( get_post_field( 'post_title', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
//         'data-caption'            => _wp_specialchars( get_post_field( 'post_excerpt', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
//         'data-src'                => esc_url( $full_src[0] ),
//         'data-large_image'        => esc_url( $full_src[0] ),
//         'data-large_image_width'  => esc_attr( $full_src[1] ),
//         'data-large_image_height' => esc_attr( $full_src[2] ),
//         'class'                   => esc_attr( $main_image ? 'wp-post-image img-fluid' : '' ),
//       ),
//       $attachment_id,
//       $image_size,
//       $main_image
//     )
//   );

//   return '<div data-thumb="' . esc_url( $thumbnail_src[0] ) . '" data-thumb-alt="' . esc_attr( $alt_text ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_src[0] ) . '">' . $image . '</a></div>';
// }

// Cart function
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    ?>
    <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></a>   
    <?php

    $fragments['a.cart-contents'] = ob_get_clean();

    return $fragments;
}

// Re-order sorting option
add_filter( 'woocommerce_catalog_orderby', 'zedds_change_sorting_options_order', 5 );
function zedds_change_sorting_options_order( $options ){
	$options = array(
 
        'menu_order' => __( 'Default sorting', 'woocommerce' ), // you can change the order of this element too
        'popularity' => __( 'Sort by Trending', 'woocommerce' ),
        'date'       => __( 'Sort by New', 'woocommerce' ), // Let's make "Sort by latest" the second one
        'price-desc' => __( 'Sort by High Price', 'woocommerce' ),
        'price'      => __( 'Sort by Low Price', 'woocommerce' ), // I need sorting by price to be the first		
	);
	return $options;
}

// Add sort by discount
add_filter( 'woocommerce_get_catalog_ordering_args', 'zedds_woocommerce_add_salediscount_to_catalog_ordering_args' );
function zedds_woocommerce_add_salediscount_to_catalog_ordering_args( $args ) {
	$orderby_value = isset( $_GET['orderby'] ) ? woocommerce_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
	if ( 'discount' == $orderby_value ) {
		$args['orderby'] 	= 'meta_value_num';
		$args['order'] 		= 'DESC';
		$args['meta_key'] 	= '_sale_price';
	}
	return $args;
}
add_filter( 'woocommerce_default_catalog_orderby_options', 'zedds_woocommerce_add_salediscount_to_catalog_orderby' );
add_filter( 'woocommerce_catalog_orderby', 'zedds_woocommerce_add_salediscount_to_catalog_orderby' );
function zedds_woocommerce_add_salediscount_to_catalog_orderby( $sortby ) {
	$sortby['discount'] 	= 'Sort by Discount';
	return $sortby;
}

// Add Navigation Arrows in WooCommerce Product Gallery Slider 
add_filter( 'woocommerce_single_product_carousel_options', 'sf_update_woo_flexslider_options' );
function sf_update_woo_flexslider_options( $options ) {

    $options['animation'] = 'slide';
    $options['smoothHeight'] = true;
    $options['directionNav'] = true;
    $options['controlNav'] = 'thumbnails';
    $options['slideshow'] = false;
    $options['animationSpeed'] = 500;
    $options['animationLoop'] = true;
    $options['allowOneSlide'] = false;

    return $options;
}
?>