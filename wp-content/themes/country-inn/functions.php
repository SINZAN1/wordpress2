<?php
/**
 * Country Inn functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 */
if ( !function_exists( 'country_inn_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function country_inn_setup()
    {
        /*
         * Make theme available for translation.
        */
        load_theme_textdomain( 'country-inn' );

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
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        //Add Excerpt field in page
        add_post_type_support( 'page', 'excerpt' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(

            'primary'     => esc_html__('Primary', 'country-inn'),
            'social'      => esc_html__('Social Icons', 'country-inn'),
        ));

        /*
             * Switch default core markup for search form, comment form, and comments
             * to output valid HTML5.
             */
        add_theme_support('html5', array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('country_inn_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
        //Add theme support for WooCommerce
        add_theme_support('woocommerce');

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
    }
endif;
add_action('after_setup_theme', 'country_inn_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function country_inn_content_width()
{
    $GLOBALS['content_width'] = apply_filters('country_inn_content_width', 640);
}
add_action('after_setup_theme', 'country_inn_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function country_inn_widgets_init()
{
    register_sidebar(array(
        'name'         => esc_html__('Sidebar', 'country-inn'),
        'id'           => 'sidebar-1',
        'description'  => esc_html__('Add widgets here.', 'country-inn'),
        'before_title' => '<h2 class="widget-title">',
        'after_title'  => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Home Page Widget Area', 'country-inn'),
        'id'            => 'country-inn-home-page',
        'description'   => esc_html__('Add widgets here to appear in Home Page. First Select Front Page and Blog Page From Appearance > Homepage Settings', 'country-inn'),
        'before_widget' => '',
        'after_widget'  => '',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 1', 'country-inn'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here.', 'country-inn'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',

    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 2', 'country-inn'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets here.', 'country-inn'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 3', 'country-inn'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Add widgets here.', 'country-inn'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 4', 'country-inn'),
        'id'            => 'footer-4',
        'description'   => esc_html__('Add widgets here.', 'country-inn'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'country_inn_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function country_inn_scripts()
{
    $enable_animation = esc_html(country_inn_get_option('country_inn_animation_option'));

    /*Bootstrap*/
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '4.5.1');
    
     /* Animation CSS Enqueue */
    $animation_options = ('country_inn_animation_option');
    if( $enable_animation == 0 ){
        wp_enqueue_style('animacountry_inn_get_optionte', get_template_directory_uri() . '/assets/css/animate.css', array(), '4.5.0');
    }

    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.css', array(), '4.5.0');

    wp_enqueue_style('slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '4.5.0');

    wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), '4.5.0');

    
    /*google font  */
    wp_enqueue_style('country-inn-googleapis', 'https://fonts.googleapis.com/css?family=Cutive+Mono%7CFira+Sans:300,300i,400,400i,500,500i,600,600i,700,800%7CRoboto+Condensed:400,700%7CRock+Salt%7CDawning+of+a+New+Day', array(), null);
    
    wp_enqueue_style('country-inn-style', get_stylesheet_uri());
    
    wp_enqueue_style('country-inn-skin', get_template_directory_uri() . '/assets/css/skin.css', array(), '4.5.0');

    wp_enqueue_style('country-inn-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '4.5.0');

    
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), '20151215', true);
 

    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), '20151215', true); 

    wp_enqueue_script('jarallax', get_template_directory_uri() . '/assets/js/jarallax.js', array('jquery'), '20151215', true);

    wp_enqueue_script('jquery-sticky', get_template_directory_uri() . '/assets/js/jquery.sticky.js', array('jquery'), '20151216', true);

    wp_enqueue_script('jquery-waypoints', get_template_directory_uri() . '/assets/js/jquery.waypoints.js', array('jquery'), '20151215', true);

   if( $enable_animation !=1 )
   {
         
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.js', array('jquery'), '20151215', true);

    wp_enqueue_script('country-inn-custom-wow', get_template_directory_uri() . '/assets/js/custom-owl.js', array('jquery'), '20151215', true);
    
   }

    wp_enqueue_script('country-inn-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '201512169', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'country_inn_scripts');

/**
 * Load custom files load files php file
 */
require get_template_directory() . '/xclusivethemes/core/load-files.php';