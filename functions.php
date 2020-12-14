<?php
/**
 * Glass Cannon functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Glass_Cannon
 */

if ( ! function_exists( 'glass_cannon_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function glass_cannon_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Glass Cannon, use a find and replace
	 * to change 'glass-cannon' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'glass-cannon', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'podcast_preview', 536, 352, true );

	add_image_size( 'title_bg', 1376, 774, true );
	
	add_image_size( 'podcast_nav_bg', 780, 620, true );

	add_image_size( 'about-img', 625, 9999, false );


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'glass-cannon' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'glass_cannon_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
endif;
add_action( 'after_setup_theme', 'glass_cannon_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function glass_cannon_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'glass_cannon_content_width', 1050 );
}
add_action( 'after_setup_theme', 'glass_cannon_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function glass_cannon_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'glass-cannon' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'glass-cannon' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Store Sidebar', 'glass-cannon' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'glass-cannon' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'glass_cannon_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function glass_cannon_scripts() {
	wp_enqueue_style( 'glass-cannon-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'glass-cannon-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'glass-cannon-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'glass-cannon-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '20151215', true );
	
wp_enqueue_script( 'masonry' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'glass_cannon_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



//* Enqueue Animate.CSS and WOW.js
add_action( 'wp_enqueue_scripts', 'sk_enqueue_scripts' );
function sk_enqueue_scripts() {
	wp_enqueue_style( 'animate', get_stylesheet_directory_uri() . '/css/animate.min.css' );
	wp_enqueue_script( 'wow', get_stylesheet_directory_uri() . '/js/wow.min.js', array(), '', true );
}
//* Enqueue script to activate WOW.js
add_action('wp_enqueue_scripts', 'sk_wow_init_in_footer');
function sk_wow_init_in_footer() {
	add_action( 'print_footer_scripts', 'wow_init' );
}
//* Add JavaScript before </body>
function wow_init() { ?>
	<script type="text/javascript">
		new WOW().init();
	</script>
<?php }

// Add ACF Options Page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

/**
 * Enqueue Google Fonts.
 */
function wpb_add_google_fonts() {

wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:700|Rubik|Karla|Playfair+Display:700i,900i|Special+Elite|Patrick+Hand', false );
}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );


//enqueues our external font awesome stylesheet
/*
function enqueue_our_required_stylesheets(){
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); 
}
add_action('wp_enqueue_scripts','enqueue_our_required_stylesheets');
*/


//Page Slug Body Class
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );


// Add Category to Body Class
function pn_body_class_add_categories( $classes ) {
 
	// Only proceed if we're on a single post page
	if ( !is_single() )
		return $classes;
 
	// Get the categories that are assigned to this post
	$post_categories = get_the_category();
 
	// Loop over each category in the $categories array
	foreach( $post_categories as $current_category ) {
 
		// Add the current category's slug to the $body_classes array
		$classes[] = 'category-' . $current_category->slug;
 
	}
 
	// Finally, return the $body_classes array
	return $classes;
}
add_filter( 'body_class', 'pn_body_class_add_categories' );


// Woocommerce Support and Wrappers for Underscores
add_theme_support( 'woocommerce' ); 
 
function _s_wrapper_start() {  
    echo '<div id="primary" class="content-area">';
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );  
add_action( 'woocommerce_before_main_content', '_s_wrapper_start', 10 );

function _s_wrapper_end() {  
    echo '</div>';
}
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );  
add_action( 'woocommerce_after_main_content', '_s_wrapper_end', 10 );  


// Wrap Woo Images in Div
add_action( 'woocommerce_before_shop_loop_item_title', function(){
    echo '<div class="imagewrapper">';
}, 9 );
add_action( 'woocommerce_before_shop_loop_item_title', function(){
    echo '</div>';
}, 11 );

// Exlude Events from Shop Page
function custom_pre_get_posts_query( $q ) {

    $tax_query = (array) $q->get( 'tax_query' );

    $tax_query[] = array(
           'taxonomy' => 'product_cat',
           'field' => 'slug',
           'terms' => array( 'event' ), // Don't display products in the clothing category on the shop page.
           'operator' => 'NOT IN'
    );
    $q->set( 'tax_query', $tax_query );
}
add_action( 'woocommerce_product_query', 'custom_pre_get_posts_query' );


// Remove Woo Breadcrumbs
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);


// Add div before single product title/ price wrap
remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);
add_action('woocommerce_single_product_summary', 'woocommerce_my_single_title',5);

if ( ! function_exists( 'woocommerce_my_single_title' ) ) {
   function woocommerce_my_single_title() {
?>
            <div id="single-product-title-price-wrap"> <h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1>
<?php
    }
}

/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */ 
function woo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 3;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 1; // arranged in 2 columns
	return $args;
}


// add taxoonomy term to body_class
function woo_custom_taxonomy_in_body_class( $classes ){
  if( is_singular( 'product' ) )
  {
    $custom_terms = get_the_terms(0, 'product_cat');
    if ($custom_terms) {
      foreach ($custom_terms as $custom_term) {
        $classes[] = 'product_cat_' . $custom_term->slug;
      }
    }
  }
  return $classes;
}
add_filter( 'body_class', 'woo_custom_taxonomy_in_body_class' );


// Closing tag for single product title/price wrap
add_action( 'woocommerce_before_add_to_cart_form', function(){
    echo '</div>';
}, 9 );


// Product Description Above Button
function woocommerce_template_product_description() {
woocommerce_get_template( 'single-product/tabs/description.php' );
}
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_template_product_description', 10 );

// Wrap full description
add_action( 'woocommerce_after_single_product_summary', function(){
    echo '<div class="description-wrap">';
}, 9 );
add_action( 'woocommerce_after_single_product_summary', function(){
    echo '</div>';
}, 11 );



/** 
 * Change the heading title on the "Product Description" tab section for single products.
 */
add_filter( 'woocommerce_product_description_heading', 'isa_product_description_heading' );
 
function isa_product_description_heading() {
    return 'What is it?';
}

// Remove Top Admin Bar
add_filter('show_admin_bar', '__return_false');




add_action( 'pre_get_posts', 'exclude_specific_cats' );
function exclude_specific_cats( $wp_query ) {   
    if( !is_admin() && is_archive() ) {
        $wp_query->set( 'cat', '-26' );
    }
}

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );





// Hide Out Of Stock
add_action( 'pre_get_posts', 'iconic_hide_out_of_stock_products' );

function iconic_hide_out_of_stock_products( $q ) {

    if ( ! $q->is_main_query() || is_admin() ) {
        return;
    }

    if ( $outofstock_term = get_term_by( 'name', 'outofstock', 'product_visibility' ) ) {

        $tax_query = (array) $q->get('tax_query');

        $tax_query[] = array(
            'taxonomy' => 'product_visibility',
            'field' => 'term_taxonomy_id',
            'terms' => array( $outofstock_term->term_taxonomy_id ),
            'operator' => 'NOT IN'
        );

        $q->set( 'tax_query', $tax_query );

    }

    remove_action( 'pre_get_posts', 'iconic_hide_out_of_stock_products' );

}


//  Output: removes woocommerce tabs
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

// Remove "Select options" button from (variable) products on the main WooCommerce shop page.
add_filter( 'woocommerce_loop_add_to_cart_link', function( $product ) {

	global $product;

	if ( is_shop() && 'variable' === $product->product_type ) {
		return '';
	} else {
		sprintf( '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
			esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
			isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
			esc_html( $product->add_to_cart_text() )
		);
	}

} );



