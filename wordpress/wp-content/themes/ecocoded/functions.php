<?php
/**
 * ecocoded functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ecocoded
 */


if ( ! function_exists( 'ecocoded_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */

	function ecocoded_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ecocoded, use a find and replace
		 * to change 'ecocoded' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ecocoded', get_template_directory() . '/languages' );

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
		set_post_thumbnail_size( 300 );

		add_image_size( 'ecocoded-grid', 350 , 230, true );
		add_image_size( 'ecocoded-slider', 850 );
		add_image_size( 'ecocoded-small', 300 , 180, true );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1'	=> esc_html__( 'Primary', 'ecocoded' ),
		) );

		/*
         * Add support for starter content
        */
        // Starter Content Begin
		$nav_items = array(
			'home'                 => array(
				'title'      => 'Home',
				'url'    => '#',
			),
			'custom_blog'           => array(
				'title'      => 'Blog',
				'url'    => '#',
			),
			'custom_news'      => array(
				'title'      => 'News',
				'url'    => '#',
			),
			'custom_categories' => array(
				'title'      => 'Categories',
				'url'    => '#',
			),
			'custom_about'            => array(
				'title'      => 'About',
				'url'    => '#',
			),
			'custom_contact'            => array(
				'title'      => 'Contact',
				'url'    => '#',
			),
		);

		$header_widgets = array('custom' => array('custom_html',
			array(
				'title' => '',
				'content' => '<div style="text-align:center;"><img src="'.get_template_directory_uri().'/inc/starter_content/img/1.png" style="max-height: 80px; margin-bottom: 20px;"></div><h3 style="text-align:center;">Lorem ipsum dolor sit amet</h3><p style="text-align:center;">Accusantium et doloremque veritatis architecto, eaque ipsa quae ab illo.</p>'
			)));

		$header_widgets_two = array('custom' => array('custom_html',
			array(
				'title' => '',
				'content' => '<div style="text-align:center;"><img src="'.get_template_directory_uri().'/inc/starter_content/img/2.png" style="max-height: 80px; margin-bottom: 20px;"></div><h3 style="text-align:center;">Lorem ipsum dolor sit amet</h3><p style="text-align:center;">Accusantium et doloremque veritatis architecto, eaque ipsa quae ab illo.</p>'
			)));

		$header_widgets_three = array('custom' => array('custom_html',
			array(
				'title' => '',
				'content' => '<div style="text-align:center;"><img src="'.get_template_directory_uri().'/inc/starter_content/img/3.png" style="max-height: 80px; margin-bottom: 20px;"></div><h3 style="text-align:center;">Lorem ipsum dolor sit amet</h3><p style="text-align:center;">Accusantium et doloremque veritatis architecto, eaque ipsa quae ab illo.</p>'
			)));

		$footer_widgets = array('custom' => array(
			'custom_html',
			array(
				'title' => 'LOREM IPSUM',
				'content' => '<p>Sed ut perspiciatis unde omnis iste natus voluptatem fringilla tempor dignissim at, pretium et arcu. Sed ut perspiciatis unde omnis iste tempor dignissim at, pretium et arcu natus voluptatem fringilla.</p>'
			)
		));

		$starter_content = array(
			'attachments' => array(
				'featured-image-nothing-breaks-new-york' => array(
					'post_title'   => 'Featured Image 1',
					'post_content' => 'Attachment Description',
					'post_excerpt' => 'Attachment Caption',
					'file'         => 'inc/starter_content/img/nothing-breaks-new-york.png',
				),
				'featured-image-getting-what-you-want' => array(
					'post_title'   => 'Featured Image 2',
					'post_content' => 'Attachment Description',
					'post_excerpt' => 'Attachment Caption',
					'file'         => 'inc/starter_content/img/getting-what-you-want.png',
				),
				'featured-image-are-you-sabotaging-your-creativity' => array(
					'post_title'   => 'Featured Image 3',
					'post_content' => 'Attachment Description',
					'post_excerpt' => 'Attachment Caption',
					'file'         => 'inc/starter_content/img/are-you-sabotaging-your-creativity.png',
				),
				'featured-image-what-ive-learned-from-road-trips' => array(
					'post_title'   => 'Featured Image 4',
					'post_content' => 'Attachment Description',
					'post_excerpt' => 'Attachment Caption',
					'file'         => 'inc/starter_content/img/what-ive-learned-from-road-trips.png',
				),
				'featured-image-how-to-write-10000-words-a-week' => array(
					'post_title'   => 'Featured Image 5',
					'post_content' => 'Attachment Description',
					'post_excerpt' => 'Attachment Caption',
					'file'         => 'inc/starter_content/img/how-to-write-10000-words-a-week.png',
				),
			),
			'posts' => array(
				'custom_post_1' => require dirname(__FILE__). "/inc/starter_content/posts/nothing_beats_new_york.php",
				'custom_post_2' => require dirname(__FILE__). "/inc/starter_content/posts/getting_what_you_want.php",
				'custom_post_3' => require dirname(__FILE__). "/inc/starter_content/posts/are_you_sabotaging_your_creativity.php",
				'custom_post_4' => require dirname(__FILE__). "/inc/starter_content/posts/how-to-write-10000-words-a-week.php",
				'custom_post_5' => require dirname(__FILE__). "/inc/starter_content/posts/what_ive_learned_from_road_trips.php",
			),
			'nav_menus' => array(
				'menu-1' => array(
					'name' => 'Primary',
					'items' => $nav_items,
				),
			),
			'widgets' => array(
				'headerwidget-1' => $header_widgets,
				'headerwidget-2' => $header_widgets_two,
				'headerwidget-3' => $header_widgets_three,
				'footerwidget-1' => $footer_widgets,
				'footerwidget-2' => $footer_widgets,
				'footerwidget-3' => $footer_widgets,
				'sidebar-1' => array(
					'recent-posts' => array(
						'recent-posts',
						array(
							'title' => 'Recent Posts'
						)
					),

					'custom_banner' => array(
						'custom_html',
						array(
							'title' => 'Advertise',
							'content' => '<img src="'.get_template_directory_uri().'/inc/starter_content/img/banner.png"/>'
						)
					),
				),
			),
			'theme_mods' => array(
				'header_button_link' => '#',
				'header_button_text' => 'Read More',
				'header_img_text_tagline' => 'Taking sustainability to a whole other level.',
				'header_img_text' => "Let's Reduce Carbon Emissions Together!"
			),
		);

		add_theme_support('starter-content', $starter_content);
        // Starter Content End

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
		add_theme_support( 'custom-background', apply_filters( 'ecocoded_custom_background_args', array(
			'default-color' => '#d8d8d8',
			'default-image' => '',
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
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'ecocoded_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ecocoded_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ecocoded_content_width', 640 );
}
add_action( 'after_setup_theme', 'ecocoded_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ecocoded_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Header Widget (1)', 'ecocoded' ),
		'id'            => 'headerwidget-1',
		'description'   => esc_html__( 'Add widgets here.', 'ecocoded' ),
		'before_widget' => '<section id="%1$s" class="header-widget widget swidgets-wrap %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
		'after_title'   => '</h3></div></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Widget (2)', 'ecocoded' ),
		'id'            => 'headerwidget-2',
		'description'   => esc_html__( 'Add widgets here.', 'ecocoded' ),
		'before_widget' => '<section id="%1$s" class="header-widget widget swidgets-wrap %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
		'after_title'   => '</h3></div></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Widget (3)', 'ecocoded' ),
		'id'            => 'headerwidget-3',
		'description'   => esc_html__( 'Add widgets here.', 'ecocoded' ),
		'before_widget' => '<section id="%1$s" class="header-widget widget swidgets-wrap %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
		'after_title'   => '</h3></div></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (1)', 'ecocoded' ),
		'id'            => 'footerwidget-1',
		'description'   => esc_html__( 'Add widgets here.', 'ecocoded' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (2)', 'ecocoded' ),
		'id'            => 'footerwidget-2',
		'description'   => esc_html__( 'Add widgets here.', 'ecocoded' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (3)', 'ecocoded' ),
		'id'            => 'footerwidget-3',
		'description'   => esc_html__( 'Add widgets here.', 'ecocoded' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ecocoded' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ecocoded' ),
		'before_widget' => '<section id="%1$s" class="fbox swidgets-wrap widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="sidebar-headline-wrapper"><div class="sidebarlines-wrapper"><div class="widget-title-lines"></div></div><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );
	
}




add_action( 'widgets_init', 'ecocoded_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function ecocoded_scripts() {
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'ecocoded-style', get_stylesheet_uri() );
	wp_enqueue_script( 'ecocoded-navigation', get_template_directory_uri() . '/js/navigation.min.js', array(), '20160720', true );
	wp_enqueue_script( 'ecocoded-script', get_template_directory_uri() . '/js/script.min.js', array(), '20160720', true );
	wp_enqueue_script( 'ecocoded-accessibility-jquery', get_template_directory_uri() . '/js/accessibility.min.js', array('jquery'), '20160720', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ecocoded_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Google fonts
 */

function ecocoded_google_fonts() {

	wp_enqueue_style( 'ecocoded-google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', false ); 
}

add_action( 'wp_enqueue_scripts', 'ecocoded_google_fonts' );


/**
 * Dots after excerpt
 */

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');



/**
 * Deactivate Elementor Wizard
 */
function ecocoded_remove_elementor_onboarding() {
    update_option( 'elementor_onboarded', true );
}
add_action( 'after_switch_theme', 'ecocoded_remove_elementor_onboarding' );


/**
 * Blog Pagination 
 */
if ( !function_exists( 'ecocoded_numeric_posts_nav' ) ) {
	
	function ecocoded_numeric_posts_nav() {
		
		$prev_arrow = is_rtl() ? 'Previous' : 'Next';
		$next_arrow = is_rtl() ? 'Next' : 'Previous';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; 
		if( $total > 1 )  {
			if( !$current_page = get_query_var('paged') )
				$current_page = 1;
			if( get_option('permalink_structure') ) {
				$format = 'page/%#%/';
			} else {
				$format = '&paged=%#%';
			}
			echo wp_kses_post(paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> 'Previous',
				'next_text'		=> 'Next',
			) ));
		}
	}	
}


/**
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme EcoCoded for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'ecocoded_register_required_plugins' );

function ecocoded_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'      => 'Superb Helper',
			'slug'      => 'superb-helper',
			'required'  => false,
		),

		array(
			'name'      => 'Elementor',
			'slug'      => 'elementor',
			'required'  => false,
		),

	);

	$config = array(
		'id'           => 'ecocoded',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}



/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function ecocoded_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
		/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'ecocoded_skip_link_focus_fix' );


require_once(trailingslashit(get_template_directory()) . 'inc/info_content/loader.php');






add_action('admin_init', 'ecocoded_spbThemesNotification', 8);

function ecocoded_spbThemesNotification(){
	$notifications = include('inc/admin_notification/Autoload.php');
	$notifications->Add("ecocoded_notification", "Unlock All Features with EcoCoded Premium – Limited Time Offer", "
		
		Take advantage of the up to <span style='font-weight:bold;'>40% discount</span> and unlock all features with EcoCoded Premium. 
		The discount is only available for a limited time.

		<div>
		<a style='margin-bottom:15px;' class='button button-large button-secondary' target='_blank' href='https://superbthemes.com/ecocoded/'>Read More</a> <a style='margin-bottom:15px;' class='button button-large button-primary' target='_blank' href='https://superbthemes.com/ecocoded/'>Upgrade Now</a>
		</div>

		", "info");




	$options_notification_start = array("delay"=> "-1 seconds", "wpautop" => false);
	$notifications->Add("ecocoded_notification_start", "Let's get you started with EcoCoded!", '
		<span class="st-notification-wrapper">
		<span class="st-notification-column-wrapper">
		<span class="st-notification-column">
		<img src="'. esc_url( get_template_directory_uri() . '/inc/admin_notification/src/preview.png' ).'" width="150" height="177" />
		</span>

		<span class="st-notification-column">
		<h2>Why EcoCoded</h2>
		<ul class="st-notification-column-list">
		<li>Easy to Use & Customize</li>
		<li>Search Engine Optimized</li>
		<li>Lightweight and Fast</li>
		<li>Top-notch Customer Support</li>
		</ul>
		<a href="https://superbthemes.com/demo/ecocoded/" target="_blank" class="button">View EcoCoded Demo <span aria-hidden="true" class="dashicons dashicons-external"></span></a> 

		</span>
		<span class="st-notification-column">
		<h2>Customize EcoCoded</h2>
		<ul>
		<li><a href="'. esc_url( admin_url( 'customize.php' ) ) .'" class="button button-primary">Customize The Design</a></li>
		<li><a href="'. esc_url( admin_url( 'widgets.php' ) ) .'" class="button button-primary">Add/Edit Widgets</a></li>
		<li><a href="https://superbthemes.com/customer-support/" target="_blank" class="button">Contact Support <span aria-hidden="true" class="dashicons dashicons-external"></span></a> </li>
		</ul>
		</span>
		</span>
		<span class="st-notification-footer">
		EcoCoded is created by SuperbThemes. We have 100.000+ users and are rated <strong>Excellent</strong> on Trustpilot <img src="'. esc_url( get_template_directory_uri() . '/inc/admin_notification/src/stars.svg' ).'" width="87" height="16" />
		</span>
		</span>

		<style>.st-notification-column-wrapper{width:100%;display:-webkit-box;display:-ms-flexbox;display:flex;border-top:1px solid #eee;padding-top:20px;margin-top:3px}.st-notification-column-wrapper h2{margin:0}.st-notification-footer img{margin-bottom:-3px;margin-left:10px}.st-notification-column-wrapper .button{min-width:180px;text-align:center;margin-top:10px}.st-notification-column{margin-right:10px;padding:0 10px;max-width:250px;width:100%}.st-notification-column img{border:1px solid #eee}.st-notification-footer{display:inline-block;width:100%;padding:15px 0;border-top:1px solid #eee;margin-top:10px}.st-notification-column:first-of-type{padding-left:0;max-width:160px}.st-notification-column-list li{list-style-type:circle;margin-left:15px;font-size:14px}@media only screen and (max-width:1000px){.st-notification-column{max-width:33%}}@media only screen and (max-width:800px){.st-notification-column{max-width:50%}.st-notification-column:first-of-type{display:none}}@media only screen and (max-width:600px){.st-notification-column-wrapper{display:block}.st-notification-column{width:100%;max-width:100%;display:inline-block;padding:0;margin:0}span.st-notification-column:last-of-type{margin-top:30px}}</style>

		', "info", $options_notification_start);
	$notifications->Boot();
}
