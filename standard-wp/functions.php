<?php
ob_clean();
ob_start();
// WP Nav Menu Function
// Usage: wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => false ) );
add_action( 'init', 'register_my_menus' );
function register_my_menus()
{
	register_nav_menus(
	array(
		'header-menu' => __( 'Header Menu' ),
		'footer-menu' => __( 'Footer Menu' ),
	)
	);
}

// Removes ul class from wp_nav_menu
function remove_ul ( $menu )
{
   return preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
}
add_filter( 'wp_nav_menu', 'remove_ul' );

// Featured Image Function
add_theme_support( 'post-thumbnails');
if (function_exists('add_image_size'))
{
	//add_image_size( 'blog_thumbnail', 550, 250,true );
	add_image_size('medium', get_option( 'medium_size_w' ), get_option( 'medium_size_h' ), true );
}

// Image compression while uploading
add_filter('jpeg_quality', 'jpeg_quality_callback');
function jpeg_quality_callback($arg)
{
	return (int)80; // 80% quality
}

//Remove width and height attributes from inserted images
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

// Sidebar Function
/* Usage:
 if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar')) :  endif;
*/

if ( function_exists('register_sidebar') )
{
	register_sidebar(array(
	'name'=>'Sidebar',
	'id' => 'sidebar',
	'description' => 'Sidebar Widget',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	));

}

// Enable Excerpt for Pages
add_post_type_support('page', 'excerpt');

// Shorten Post/Page title by word
/* Usage: echo short_title('...', 8); Shorten title by 8 words */
function short_title($after = '', $length)
{
	$mytitle = explode(' ', get_the_title(), $length);
	if (count($mytitle)>=$length)
	{
		array_pop($mytitle);
		$mytitle = implode(" ",$mytitle). $after;
	}
	else
	{
		$mytitle = implode(" ",$mytitle);
	}
	return $mytitle;
}



// Excerpt word limit function
/* Usage: echo excerpt(25);  in loop for 25 words limit*/
function excerpt($limit)
{
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit)
	{
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	}
	else
	{
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
}

// Content word limit function
/* Usage: echo content(25); in loop for 25 words limit*/
function content($limit)
{
	$content = explode(' ', get_the_content(), $limit);
	if (count($content)>=$limit)
	{
		array_pop($content);
		$content = implode(" ",$content).'...';
	}
	else
	{
		$content = implode(" ",$content);
	}
	$content = preg_replace('/(<)([img])(\w+)([^>]*>)/','', $content);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

// Anti Spam Email Shorcode inside content
/*Usage: [email]you@you.com[/email]*/
function email_encode_function( $atts, $content )
{
	return '<a href="'.antispambot("mailto:".$content).'">'.antispambot($content).'</a>';
}
add_shortcode( 'email', 'email_encode_function' );

// Remove Images from WorPress content
/* Usage: remove_filter( 'the_content', 'remove_images' );*/
function remove_images( $content )
{
   $postOutput = preg_replace('/<img[^>]+./','', $content);
   return $postOutput;
}

// Display the content of a page by page ID
/* Usage: echo get_page_content_id(15); 15 is the id of the page */
function get_page_content_id($page_id)
{
	$page_data = get_page($page_id);
	$content = apply_filters('the_content', $page_data->post_content);
	return $content;
}

// Display the content of a page by page slug
/* Usage: echo get_page_content_slug(get_page_id("about-me")); 'about-me' is the sluf of the page */
function get_page_content_slug($page_slug)
{
	$page = get_page_by_path($page_slug);
	$page_data = get_page($page->ID);
	$content = apply_filters('the_content', $page_data->post_content);
	return $content;
}


// WordPress Security Measures
// Remove WordPress version from Head
function remove_version_from_head()
{
	return '';
}
add_filter('the_generator', 'remove_version_from_head');


// Custom JavaScript load
function wp_custom_scripts_load()
{
	wp_register_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array( 'jquery' ), null, true  );
	wp_register_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array( 'jquery' ), null, true  );
	wp_register_script( 'meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.js', array( 'jquery' ), null, true );
	wp_register_script( 'custom-js', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), null, true );

	wp_enqueue_script( 'popper' );
	wp_enqueue_script( 'bootstrap' );
	wp_enqueue_script( 'meanmenu' );
	wp_enqueue_script( 'custom-js' );

}
if (!is_admin())
//add_action( 'wp_footer', 'wp_custom_scripts_load' );
add_action( 'wp_enqueue_scripts', 'wp_custom_scripts_load' );

// Custom CSS load
function wp_custom_css_load()
{
	wp_register_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), '07012020', 'all' );
	wp_register_style( 'googlefont1', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i,800,800i&display=swap', array(), '07012020', 'all' );
	wp_register_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css', array(), '07012020', 'all' );
	wp_register_style( 'maincss', get_template_directory_uri() . '/style.css', array(), '07012020', 'all' );
	wp_register_style( 'media-responsive', get_template_directory_uri() . '/assets/css/media-responsive.css', array(), '07012020', 'all' );
	wp_register_style( 'meanmenu', get_template_directory_uri() . '/assets/css/meanmenu.css', array(), '07012020', 'all' );

	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'googlefont1' );
	wp_enqueue_style( 'fontawesome' );
	wp_enqueue_style( 'maincss' );
	wp_enqueue_style( 'media-responsive' );
	wp_enqueue_style( 'meanmenu' );
}
if (!is_admin())
add_action( 'wp_enqueue_scripts', 'wp_custom_css_load' );


/* Disable WordPress Admin Bar for all users but admins. */
  show_admin_bar(false);

// Include functions file

require_once(TEMPLATEPATH . '/functions/yourfunctionfile.php');  
?>