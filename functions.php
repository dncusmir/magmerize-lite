<?php
/**
 * Magmerize Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Magmerize_Lite
 */

if ( ! function_exists( 'magmerize_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function magmerize_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Magmerize Lite, use a find and replace
		 * to change 'magmerize' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'magmerize', get_template_directory() . '/languages' );

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

		// remove width & height attributes from images
		function remove_img_attr( $html ) {
		    return preg_replace( '/(width|height)="\d+"\s/', "", $html );
		}
		add_filter( 'post_thumbnail_html', 'remove_img_attr' );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu Location', 'magmerize' ),
			'footer_menu' => esc_html__( 'Footer Menu Location', 'magmerize' ),
			'header_social_menu' => esc_html__( 'Header Social Menu Location', 'magmerize' ),
			'footer_social_menu' => esc_html__( 'Footer Social Menu Location', 'magmerize' )
		) );

		/*
		 * Add nav-item class to primary menu li
		 * Add nav-item class to header social menu li
		 * Add list-inline-item class to footer menu li
		 * Add list-inline-item class to footer social menu li
		 *
		 * @link https://developer.wordpress.org/reference/hooks/nav_menu_css_class/
		*/
		function mgmr_menu_li_classes( $classes, $item, $args ) {
			if( $args->theme_location == 'primary' ) {
				$classes[] = 'nav-item';
			}
			if( $args->theme_location == 'header_social_menu' ) {
				$classes[] = 'nav-item';
			}
			if( $args->theme_location == 'footer_menu' ) {
				$classes[] = 'list-inline-item';
			}
			if( $args->theme_location == 'footer_social_menu' ) {
				$classes[] = 'list-inline-item';
			}
			return $classes;
		}
		add_filter('nav_menu_css_class', 'mgmr_menu_li_classes', 1, 3);

		/*
		 * Add nav-link class to  header menu a
		 * Add nav-link class to social header menu a
		 *
		 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/nav_menu_link_attributes
		*/
		function mgmr_menu_a_classes( $attributes, $item, $args ) {
			if( $args->theme_location == 'primary' ) {
				$attributes[ 'class' ] = 'nav-link';
			}
			if( $args->theme_location == 'header_social_menu' ) {
				$attributes[ 'class' ] = 'nav-link';
			}
			return $attributes;
		}
		add_filter('nav_menu_link_attributes', 'mgmr_menu_a_classes', 10, 3);

		// Add Fontawesome icons to social urls in menus
		function mgmr_add_icons_to_social_menu( $items, $args ) {
			$mgmr_social_icons = array(
				array( 'url' => 'behance.net', 'icon' => 'fab fa-behance' ),
				array( 'url' => 'bitbucket.org', 'icon' => 'fab fa-bitbucket' ),
				array( 'url' => 'codepen.io', 'icon' => 'fab fa-codepen' ),
				array( 'url' => 'deviantart.com', 'icon' => 'fab fa-deviantart' ),
				array( 'url' => 'discord.gg', 'icon' => 'fab fa-discord' ),
				array( 'url' => 'dribbble.com', 'icon' => 'fab fa-dribbble' ),
				array( 'url' => 'etsy.com', 'icon' => 'fab fa-etsy' ),
				array( 'url' => 'facebook.com', 'icon' => 'fab fa-facebook-f' ),
				array( 'url' => 'flickr.com', 'icon' => 'fab fa-flickr' ),
				array( 'url' => 'foursquare.com', 'icon' => 'fab fa-foursquare' ),
				array( 'url' => 'github.com', 'icon' => 'fab fa-github' ),
				array( 'url' => 'instagram.com', 'icon' => 'fab fa-instagram' ),
				array( 'url' => 'kickstarter.com', 'icon' => 'fab fa-kickstarter-k' ),
				array( 'url' => 'last.fm', 'icon' => 'fab fa-lastfm' ),
				array( 'url' => 'linkedin.com', 'icon' => 'fab fa-linkedin-in' ),
				array( 'url' => 'medium.com', 'icon' => 'fab fa-medium-m' ),
				array( 'url' => 'patreon.com', 'icon' => 'fab fa-patreon' ),
				array( 'url' => 'pinterest.com', 'icon' => 'fab fa-pinterest-p' ),
				array( 'url' => 'reddit.com', 'icon' => 'fab fa-reddit-alien' ),
				array( 'url' => 'slack.com', 'icon' => 'fab fa-slack-hash' ),
				array( 'url' => 'slideshare.net', 'icon' => 'fab fa-slideshare' ),
				array( 'url' => 'snapchat.com', 'icon' => 'fab fa-snapchat-ghost' ),
				array( 'url' => 'soundcloud.com', 'icon' => 'fab fa-soundcloud' ),
				array( 'url' => 'spotify.com', 'icon' => 'fab fa-spotify' ),
				array( 'url' => 'stackoverflow.com', 'icon' => 'fab fa-stack-overflow' ),
				array( 'url' => 'tumblr.com', 'icon' => 'fab fa-tumblr' ),
				array( 'url' => 'twitch.tv', 'icon' => 'fab fa-twitch' ),
				array( 'url' => 'twitter.com', 'icon' => 'fab fa-twitter' ),
				array( 'url' => 'vimeo.com', 'icon' => 'fab fa-vimeo-v' ),
				array( 'url' => 'weibo.com', 'icon' => 'fab fa-weibo' ),
				array( 'url' => 'youtube.com', 'icon' => 'fab fa-youtube' )
			);
			if( $args->theme_location == 'header_social_menu' ) {
				foreach( $mgmr_social_icons as $icon ) {
					$name = $icon[ 'url' ];
					$name = substr( $name, 0, strrpos( $name, '.' ) );
					$cls = '<i class="' . $icon[ 'icon' ] . '"></i>';
					$items = str_ireplace( '>' . $name . '<', '>' . $cls . '<', $items );
				}
			}
			if( $args->theme_location == 'footer_social_menu' ) {
				foreach( $mgmr_social_icons as $icon ) {
					$name = $icon[ 'url' ];
					$name = substr( $name, 0, strrpos( $name, '.' ) );
					$cls = '<i class="' . $icon[ 'icon' ] . '"></i>';
					$items = str_ireplace( '>' . $name . '<', '>' . $cls . '<', $items );
				}
			}
			return $items;
		}
		add_filter( 'wp_nav_menu_items', 'mgmr_add_icons_to_social_menu', 10, 2 );

		/*
		 * Add Social Links to WordPress User Profile
		 *
		 * @link https://developer.wordpress.org/reference/hooks/user_contactmethods/
		 */
		function mgmr_add_user_social_links( $user_contact ) {
			$user_contact[ 'facebook' ] = __( 'Facebook Link', 'magmerize' );
			$user_contact[ 'twitter' ] = __( 'Twitter Link', 'magmerize' );
			$user_contact[ 'linkedin' ] = __( 'LinkedIn Link', 'magmerize' );

			return $user_contact;
		}
		add_filter( 'user_contactmethods', 'mgmr_add_user_social_links' );

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
		add_theme_support( 'custom-background', apply_filters( 'magmerize_custom_background_args', array(
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
add_action( 'after_setup_theme', 'magmerize_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function magmerize_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'magmerize_content_width', 640 );
}
add_action( 'after_setup_theme', 'magmerize_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function magmerize_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'magmerize' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'magmerize' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'magmerize_widgets_init' );

// Register widgets
require_once( 'widgets/widget-recent.php' );
require_once( 'widgets/widget-trending.php' );

/**
 * Enqueue scripts and styles.
 */
function magmerize_scripts() {
	// load style.min.css if exists, otherwise style.css
	if( @file_exists( get_stylesheet_directory() . '/style.min.css' ) ) wp_enqueue_style( 'magmerize-style', get_stylesheet_directory_uri() . '/style.min.css' );
	else wp_enqueue_style( 'magmerize-style', get_stylesheet_uri() );

	wp_enqueue_script( 'magmerize-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'magmerize-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// font Awesome
	wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-12/css/all.css');
}
add_action( 'wp_enqueue_scripts', 'magmerize_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
