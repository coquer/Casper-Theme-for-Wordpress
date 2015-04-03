<?php
/*
Copyright 2015 Jorge Rodriguez(jycr753)

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

   http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
 */

if ( ! function_exists( 'casper_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function casper_setup() {
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Casper, use a find and replace
	 * to change 'casper' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'casper', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'casper' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );


	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'casper_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );

	function new_excerpt_more( $more ) {
		if ( false != get_theme_mod( 'casper_read_more_link')) {
			return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . get_theme_mod( 'casper_read_more_link') . '</a>';
		} else {
			return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __( '&hellip;&nbsp;<span class="meta-nav">&rarr;</span>', 'casper' ) . '</a>';
		}
	}
	add_filter( 'excerpt_more', 'new_excerpt_more' );

	// Enable automatic theme updates
	add_filter( 'auto_update_theme', '__return_true' );
}
endif; // casper_setup
add_action( 'after_setup_theme', 'casper_setup' );

if ( ! function_exists( 'casper_widgets_init' ) ) :
/**
 * Register widgetized area and update sidebar with default widgets.
 */
function casper_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Bar', 'casper' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
endif; // casper_widgets_init
add_action( 'widgets_init', 'casper_widgets_init' );

if ( ! function_exists( 'casper_scripts' ) ) :
/**
 * Enqueue scripts and styles.
 */
function casper_scripts() {
	wp_enqueue_style( 'jycr753-style', get_stylesheet_uri() );
    wp_enqueue_script( 'jycr753-taker', get_template_directory_uri() . '/js/colorTaker.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'jycr753-index', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );
    wp_enqueue_style('main-jycr753', get_template_directory_uri(). '/css/sass/main.css', '1.0', true);

	//lets change all ajax calls to be with angular for version 2.0 --> WHY? becuase I can.
	wp_enqueue_script('angular', get_template_directory_uri(). '/js/libs/angular.js', array('jquery'), true, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
endif; // casper_scripts
add_action( 'wp_enqueue_scripts', 'casper_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

if ( ! function_exists( 'casper_add_editor_styles' ) ) :
/**
 * Custom Editor Styles
 */
function casper_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
endif; // casper_add_editor_styles
add_action( 'after_setup_theme', 'casper_add_editor_styles' );

if ( ! function_exists( 'casper_customizer_head' ) ) :


/**
 * Admin CSS
 */
function casper_admin_css(){
	wp_enqueue_style ('casper_admin_style', get_template_directory_uri() . '/css/admin.css', array(), false, false);
}
add_action('admin_head', 'casper_admin_css');


/**
 * Customizer hook
 */
function casper_customizer_head() {
   	if (get_theme_mod( 'casper_custom_meta' )!=false) { echo get_theme_mod( 'casper_custom_meta' ); } ?>

   	<style type="text/css">
		<?php if(get_header_textcolor()){ ?>
		<?php } ?>

		<?php if('blank' === get_header_textcolor()) { ?>
		<?php } ?>
		<?php if(false != get_theme_mod( 'casper_header_textcolor' ) && false != get_theme_mod( 'casper_display_header' )){ ?>
        	body:not(.home) .blog-title a, body:not(.home) .blog-description, body:not(.home) .social-icons a {
        		color: <?php echo get_theme_mod( 'casper_header_textcolor' ); ?>;
        	}
        <?php } ?>
		<?php if(get_theme_mod('casper_header_color')){ ?>
		    .site-head { background-color: <?php echo get_theme_mod( 'casper_header_color' ); ?>; }
		<?php } ?>
        <?php if(false != get_theme_mod( 'casper_display_header' )) { ?>
        	body:not(.home) #masthead{ background: none; }
        <?php } ?>
        <?php if(false != get_theme_mod( 'casper_display_header_all' )) { ?>
        	body:not(.home) .site-head:after { display: none; }
        	body:not(.home) #masthead{ height: auto; border: none; }
        	body:not(.home) .blog-title, body:not(.home) .blog-description { display: none; }
        	body:not(.home) .inner { padding-top: 1em; }
        	body:not(.home) .main-navigation { position: relative; }
        <?php } ?>

		<?php if( get_theme_mod( 'casper_link_color' )) { ?>
			section a { color: <?php echo get_theme_mod( 'casper_link_color' ); ?>; }
		<?php } ?>

		<?php if(get_theme_mod( 'casper_hover_color' )) { ?>
			a:hover, body .blog-title a:hover, body .social-icons a:hover { color: <?php echo get_theme_mod( 'casper_hover_color' ); ?>; }
		<?php } ?>
		<?php if(!get_theme_mod( 'casper_display_header' )){ ?>
		<?php } ?>
        <?php if(get_theme_mod( 'casper_menu_color' )){ ?>
        <?php } ?>
        <?php if(get_theme_mod( 'casper_home_menu_color' )){ ?>
        <?php } ?>
        <?php if( false != get_theme_mod( 'casper_logo_circle' ) ) { ?>
			.blog-logo img {
				-webkit-border-radius: 50%;
			    -moz-border-radius: 50%;
			    border-radius: 50%;
			}
        <?php } ?>
        <?php if( false != get_theme_mod( 'casper_logo_frame' ) ) { ?>
			.blog-logo img {
			    border: 3px solid white;
			    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.3);
			    -moz-box-shadow: 0 1px 1px rgba(0,0,0,0.3);
			    box-shadow: 0 1px 1px rgba(0,0,0,0.3);
			}
        <?php } ?>
        <?php if( false != get_theme_mod( 'casper_hide_page_header_dot' ) ) { ?>

        <?php } ?>
    </style>
    <?php
}
endif;
//add_action( 'wp_head', 'casper_customizer_head' );

/**
 * Get Header image.
 * @return absolute path for the image
 */
function getHeaderImage(){
	if(has_post_thumbnail()){
		$image_url_arr = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full');
		return $image_url_arr[0];
	} elseif(get_header_image()){
		return get_header_image();
	}
}


?>