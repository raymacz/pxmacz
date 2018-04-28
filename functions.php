<?php
/**
 * Pxmacz functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Pxmacz
 */

if (! function_exists('pxmacz_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function pxmacz_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Pxmacz, use a find and replace
         * to change 'pxmacz' to the name of your theme in all the template files.
         */
        load_theme_textdomain('pxmacz', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *post-thumbnails
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        // add custom image sizes
        add_image_size( 'pxmacz-full-bleed', 2000, 1200, true );
        add_image_size( 'pxmacz-index-image', 1140, 550, true );
        add_image_size( 'pxmacz-thumbnail', 400, 300, true );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'pxmacz'),
            'menu-2' => esc_html__('Footer', 'pxmacz'),
            'menu-3' => esc_html__('Secondary', 'pxmacz'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

      /* note: Supported in other themes like Popper & Twentyseventeen
    	 * Enable support for Post Formats.
    	 *
    	 * See: https://codex.wordpress.org/Post_Formats
    	 */
    	add_theme_support( 'post-formats', array(
    		'aside',
    		'image',
    		'video',
    		'quote',
    		'link',
    		'gallery',
    		'audio',
    	) );

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('pxmacz_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ));

        // Post types supports

                add_post_type_support( 'attachment:audio', 'thumbnail' );
                add_post_type_support( 'attachment:video', 'thumbnail' );
                add_post_type_support( 'attachment', 'custom-fields' );
                add_post_type_support( 'page', 'excerpt' );

        /* Editor styles */ /// 092 Add editor styles to match front-end styles
	      add_editor_style( array( 'inc/editor-styles.css', pxmacz_fonts_url() ) );
    }
endif;
add_action('after_setup_theme', 'pxmacz_setup');

/**
 * Register custom fonts.
 */
function pxmacz_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by fonts set below, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$source_4th_font = _x( 'on', 'Source Sans Pro font: on or off', 'pxmacz' );
	$source_3rd_font = _x( 'on', 'Roboto Slab font: on or off', 'pxmacz' );
	$source_2nd_font = _x( 'on', 'Kaushan Script font: on or off', 'pxmacz' );
	$source_base_font = _x( 'on', 'PT Serif font: on or off', 'pxmacz' );
  //echo "base font: "; print_r($source_base_font);
	$font_families = array();

	if ( 'off' !== $source_4th_font ) {
		$font_families[] = 'Source Sans Pro:400,400i,700,900';
	}

	if ( 'off' !== $source_3rd_font ) {
		$font_families[] = 'Roboto Slab:100,300,400,700';
	}

	if ( 'off' !== $source_2nd_font ) {
		$font_families[] = 'Kaushan Script';
	}

	if ( 'off' !== $source_base_font ) {
		$font_families[] = 'PT Serif:400,400i,700,700i';
	}


	if ( in_array( 'on', array($source_2nd_font, $source_base_font) ) ) {

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}


/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function pxmacz_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'pxmacz-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
//Prints resource hints to browsers for pre-fetching, pre-rendering and pre-connecting to web sites.
add_filter( 'wp_resource_hints', 'pxmacz_resource_hints', 10, 2 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pxmacz_content_width()
{
    $GLOBALS['content_width'] = apply_filters('pxmacz_content_width', 640);
}
add_action('after_setup_theme', 'pxmacz_content_width', 0);



/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @origin Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function pxmacz_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 992 <= $width ) {
		$sizes = '(min-width: 992px) 750px, 992px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_active_sidebar( 'sidebar-3' ) ) {
		$sizes = '(min-width: 992px) 650px, 992px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'pxmacz_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @origin Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function pxmacz_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'pxmacz_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @origin Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function pxmacz_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {

	if ( !is_singular() ) {
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$attr['sizes'] = '(max-width: 992px) 90vw, 850px';
		} else {
			$attr['sizes'] = '(max-width: 1100px) 90vw, 1100px';
		}
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'pxmacz_post_thumbnail_sizes_attr', 10, 3 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pxmacz_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'pxmacz'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add sidebar widgets here.', 'pxmacz'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar( array(
		'name'          => esc_html__( 'Page Sidebar', 'pxmacz' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add page sidebar widgets here.', 'pxmacz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
    		'name'          => esc_html__( 'Footer Widget', 'pxmacz' ),
    		'id'            => 'footer-1',
    		'description'   => esc_html__( 'Add footer widgets here.', 'pxmacz' ),
    		'before_widget' => '<section id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</section>',
    		'before_title'  => '<h2 class="widget-title">',
    		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
    		'name'          => esc_html__( 'Backup Inactive Widgets', 'pxmacz' ),
    		'id'            => 'sidebar-2',
    		'description'   => esc_html__( 'Copy code of inactive widgets here and paste to PHP Code widget.', 'pxmacz' ),
    		'before_widget' => '<section id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</section>',
    		'before_title'  => '<h2 class="widget-title">',
    		'after_title'   => '</h2>',
	) );

}
add_action('widgets_init', 'pxmacz_widgets_init');

// Enable this to add classes to <a> for Menus
// function add_menuclass($ulclass) {
//   return preg_replace('/<a /', '<a class="list-group-item"', $ulclass);
// }
//
// add_filter('wp_nav_menu','add_menuclass');


/**
 * Enqueue scripts and styles.
 */

 function pxmacz_replace_jquery() {
 	if (!is_admin()) { // comment out the next two lines to load the local copy of jQuery
 		wp_deregister_script('jquery');
 		wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.min.js', true, '3.2.1');
 		wp_enqueue_script('jquery');
 	}
 }

 //jQuery
 add_action( 'wp_enqueue_scripts', 'pxmacz_replace_jquery' );

function pxmacz_scripts()
{
		// Set Fonts
		wp_enqueue_style( 'pxmacz-fonts', pxmacz_fonts_url() );
    // bootstrap css
   //wp_enqueue_style( 'pxmacz-style-bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    wp_enqueue_style('pxmacz-style-bootstrap', get_template_directory_uri()  . '/bootstrap.css');
    // font awesome
    wp_enqueue_style('pxmacz-style-fawesome', get_template_directory_uri()  . '/vendor/font-awesome/css/font-awesome.min.css');
    // style.css
    wp_enqueue_style('pxmacz-style', get_stylesheet_uri()); // style.css

    // bootstrap 4 requirement
    wp_enqueue_script('pxmacz-script-tether', '//cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js', array('jquery'), '20171225', true);
    wp_enqueue_script('pxmacz-script-popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array('jquery'), '20171225', true);
    wp_enqueue_script('pxmacz-script-bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'), '20171225', true);

    // navigation
    wp_enqueue_script('pxmacz-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true);

    // check if svg is browser supported & other general functions
    wp_enqueue_script('pxmacz-functions-svg', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20171225', true );
    wp_enqueue_script('pxmacz-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    // Easing Plugin JavaScript
    wp_enqueue_script('pxmacz-script-easing', get_template_directory_uri() . '/vendor/jquery-easing/jquery.easing.min.js', array(jquery), '20151215', true);

    // Custom scripts - Bootstrap 4 multilevel dropdown inside navigation
    wp_enqueue_script('pxmacz-script-b4nav', get_template_directory_uri() . '/js/b4multinav.js', array('jquery'), '20151215', true);

    // Custom scripts - Agency
    wp_enqueue_script('pxmacz-script-agency', get_template_directory_uri() . '/js/agency.js', array('jquery'), '20151215', true);


    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'pxmacz_scripts');

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
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load SVG icon functions.
 */
require get_template_directory() . '/inc/icon-functions.php';
