<?php
if(!defined('GP_THEME_DIR')) {
	define('GP_THEME_DIR', get_theme_root().'/'.get_template());
}


function gp_styles() {
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('carousel', get_template_directory_uri().'/dist/css/owl.carousel.min.css');
	wp_enqueue_style('lightgallery', get_template_directory_uri().'/dist/css/lightgallery.min.css');
	// wp_enqueue_style('grid', get_template_directory_uri().'/dist/css/grid.min.css');
	wp_enqueue_style('splide', get_template_directory_uri().'/dist/css/splide.min.css');
	wp_enqueue_style('my-global-style', get_template_directory_uri().'/dist/css/global-styles.min.css?v=28022024:3');
}
add_action('wp_enqueue_scripts', 'gp_styles');

function gp_scripts() {
	wp_enqueue_script('gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js', array(), false, true);
	wp_enqueue_script('gsap-st', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollTrigger.min.js', array('gsap-js'), false, true);
	wp_enqueue_script('carousel-js', get_template_directory_uri().'/dist/js/owl.carousel.min.js', array(), '2.3.4', true);
	wp_enqueue_script('gp-lightgallery-js', get_template_directory_uri().'/dist/js/lightgallery-all.min.js', array(), '1.6.0', true);
  wp_enqueue_script('gp-progressbar-js', get_template_directory_uri() . '/dist/js/progressbar.min.js', array(), '1.0', true);
	wp_enqueue_script('gp-splide-js', get_template_directory_uri(). '/dist/js/splide.min.js', array(), '3.6.12', true);
	wp_enqueue_script('gp-scripts-js', get_template_directory_uri().'/dist/js/scripts.min.js', array('jquery'), filemtime( get_template_directory().'/dist/js/scripts.min.js'), true);
	wp_enqueue_script('gp-animation-js', get_template_directory_uri().'/dist/js/animation.min.js', array('gsap-js'), filemtime( get_template_directory(). '/dist/js/animation.min.js'), true);
  // wp_enqueue_script('gp-gpcookies-js', get_template_directory_uri().'/dist/js/gpcookies.min.js', array(), filemtime( get_template_directory().'/dist/js/gpcookies.min.js'), true);
}
add_action('wp_enqueue_scripts', 'gp_scripts');

function my_login_stylesheet() {
	wp_register_style( 'my-login-style', get_template_directory_uri(). '/dist/css/my-login-style.css', false, '1.0.0' );
	wp_enqueue_style( 'my-login-style' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


require_once GP_THEME_DIR.'/libs/theme_style.php';
require_once  GP_THEME_DIR.'/libs/acfsettings.php';
require_once  GP_THEME_DIR.'/libs/utils.php';
// require_once  GP_THEME_DIR.'/libs/posttypes.php';
// require_once GP_THEME_DIR.'/woocommerce/woocommerce.php';




// login 

function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );



function wpdoc_customize_login_headertext( $headertext ) {
	$headertext = bloginfo( 'name' );
	return $headertext;
}
add_filter( 'login_headertext', 'wpdoc_customize_login_headertext' );



add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
    load_theme_textdomain('bjsrenovation', get_template_directory() . '/languages');
}

//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

// add_filter( 'body_class', 'my_custom_class' );
// function my_custom_class( $classes ) {
//     if (is_page('strona-glowna') or is_page('home-page')) {
//         $classes[] = 'my-home-page';
//     }
//     return $classes;
// }

add_post_type_support( 'page', 'excerpt' );

add_theme_support('post-thumbnails');


/* ADD CUSTOM IMAGE SIZES FOR POST FEATURED IMAGE
================================================== */

add_theme_support( 'post-thumbnails' );

add_action( 'after_setup_theme', 'my_custom_add_image_sizes' );
function my_custom_add_image_sizes() {
    add_image_size( 'medium', 500, 9999 ); // 500px wide unlimited height
    add_image_size( 'medium-absolute', 800, 450, ['left', 'top'] ); // 600px wide 400px height
    add_image_size( 'gallery', 800, 800, ['center', 'center'] ); // 600px wide 400px height
    add_image_size( 'xl', 1200, 9999 ); // 1200px wide unlimited height
    add_image_size( 'sliders', 1920, 900, ['left', 'top'] ); // 1920px tall 900px width
    add_image_size( 'listing', 300, 220, ['center', 'center'] ); // 1920px tall 900px width

}

add_filter( 'image_size_names_choose', 'my_custom_add_image_size_names' );
function my_custom_add_image_size_names( $sizes ) {
  return array_merge( $sizes, array(
    'medium' => __( 'Medium' ),
    'medium-absolute' => __( 'Medium Absolute' ),
    'gallery' => __( 'Galeria Gutenberg' ),
    'xl' => __( 'XL' ),
    'sliders' => __( 'Sliders and carousels' ),
    'listing' => __( 'Listing' ),
  ) );
}


// NAV MENU

function register_my_menus() {
	register_nav_menus(
		array(
			'header-menu' => ('Główne menu'),
      'footer-menu-nasza-oferta' => ('Menu w stopce nasza oferta'),
      'footer-menu-przydatne-linki' => ('Menu w stopce przydatne linki'),
		)
	);
}
add_action( 'init', 'register_my_menus' );


// Sidebar

if(function_exists('register_sidebar')) {

	$sidebar_list = array(
		array(
			'name' => 'Top koszyk info',
			'id' => 'widget-basket-top',
			'description' => 'Widget z koszykiem u góry strony.'
		),
		array(
			'name' => 'Sklep',
			'id' => 'shop',
			'description' => 'Widget po lewej stronie lista produktów.'
		)
	);

	$sidebar_opts = array(
		'before_widget' => '<div id="%1$s" class="box widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	);

	foreach($sidebar_list as $sidebar) {
		register_sidebar(array_merge($sidebar, $sidebar_opts));
	}
}



// Commend off
function gp_no_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
add_action( 'init', 'gp_no_comment_support' );


add_filter( 'widget_text', 'do_shortcode');

// Remove generator

remove_action('wp_head', 'wp_generator');

global $sitepress;
remove_action( 'wp_head', array( $sitepress, 'meta_generator_tag' ) );

// Archive title

function my_archive_title($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'my_archive_title' );

add_action( 'pre_get_posts', 'my_change_sort_order'); 
function my_change_sort_order($query){
    if(is_archive()):
      //If you wanted it for the archive of a custom post type use: is_post_type_archive( $post_type )
        //Set the order ASC or DESC
        $query->set( 'order', 'ASC' );
        //Set the orderby
        // $query->set( 'orderby', 'title' );
    endif;    
};

// if(!function_exists('shipping_cart_dynamic_fragment')) :
//   function shipping_cart_dynamic_fragment($fragments) {
//     $output = '';
//     $output .= '<span class="project-cart-info">';
//     $output .= sprintf(
//         _n( 
//             '%d', '%d', 
//             WC()->cart->cart_contents_count,
//             'azstyl'
//         ), 
//         WC()->cart->cart_contents_count, 
//         WC()->cart->get_cart_total()
//     ); 
//     $output .= '</span>';

//     $fragments['.project-cart-info'] = $output;

//     return $fragments;
//   }

//   add_filter('woocommerce_add_to_cart_fragments', 'shipping_cart_dynamic_fragment');
// endif;

// add_action('after_setup_theme', 'mytheme_add_woocommerce_support');
// function mytheme_add_woocommerce_support()
// {
//   add_theme_support('woocommerce');
// }

// add_action('after_setup_theme', 'woocommerce_gallery');
// function woocommerce_gallery()
// {
//   // add_theme_support('wc-product-gallery-zoom');
//   add_theme_support('wc-product-gallery-lightbox');
//   add_theme_support('wc-product-gallery-slider');
// }