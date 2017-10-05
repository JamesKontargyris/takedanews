<?php
/**
 * takedanews functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package takedanews
 */

if ( ! function_exists( 'takedanews_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function takedanews_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on takedanews, use a find and replace
		 * to change 'takedanews' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'takedanews', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'takedanews' ),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'takedanews_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function takedanews_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'takedanews_content_width', 640 );
}
add_action( 'after_setup_theme', 'takedanews_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function takedanews_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'takedanews' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'takedanews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'takedanews_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function takedanews_scripts() {
	wp_enqueue_style( 'takedanews-style', get_stylesheet_uri() );

	wp_enqueue_script( 'takedanews-jquery', 'https://code.jquery.com/jquery-3.2.1.min.js', array(), '20170926', true );
	wp_enqueue_script( 'takedanews-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'takedanews-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'takedanews-site-js', get_template_directory_uri() . '/js/site.js', array(), '20170926', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'takedanews_scripts' );

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

add_image_size('post-image', 900);

/**
 * Remove 'protected:' and 'private:' from post titles
 *
 * @param $content
 *
 * @return string
 */
function title_format($content) {
	return '%s';
}
add_filter('private_title_format', 'title_format');
add_filter('protected_title_format', 'title_format');

/**
 * Add css styles to back-end WYSIWYG editor
 */
function add_editor_styles() {
	add_editor_style( 'style.css' );
}
add_action( 'admin_init', 'add_editor_styles' );

/**
 * Check if the current section id is contained within the current URL
 *
 * @param string $section_id
 *
 * @return bool
 */
function url_has_section_id($section_id = '')
{
	if (strpos($_SERVER['REQUEST_URI'], '#' . $section_id) !== false) {
		return true;
	} else {
	}
	return false;
}

function get_latest_newsletter()
{
	return get_posts([
		'post_type' => 'newsletter',
		'posts_per_page' => 1,
	]);
}

function get_past_newsletters()
{
	return get_posts([
		'post_type' => 'newsletter',
		'posts_per_page' => 999999,
		'offset' => 1,
	]);
}

function sanitize($string, $force_lowercase = true, $anal = true) {
	$strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
		"}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
		"â€”", "â€“", ",", "<", ".", ">", "/", "?");
	$clean = trim(str_replace($strip, "", strip_tags($string)));
	$clean = preg_replace('/\s+/', "-", $clean);
	$clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
	return ($force_lowercase) ?
		(function_exists('mb_strtolower')) ?
			mb_strtolower($clean, 'UTF-8') :
			strtolower($clean) :
		$clean;
}

/**
 * Add All Custom Post Types to search
 *
 * Returns the main $query.
 *
 * @access      public
 * @since       1.0
 * @return      $query
 */

function rc_add_cpts_to_search($query) {

	// Check to verify it's search page
	if( is_search() ) {
		// Get post types
		$post_types = get_post_types(array('public' => true, 'exclude_from_search' => false), 'objects');
		$searchable_types = array();
		// Add available post types
		if( $post_types ) {
			foreach( $post_types as $type) {
				$searchable_types[] = $type->name;
			}
		}
		$query->set( 'post_type', $searchable_types );
	}
	return $query;
}
add_action( 'pre_get_posts', 'rc_add_cpts_to_search' );

/**
 * [list_searcheable_acf list all the custom fields we want to include in our search query]
 * @return [array] [list of custom fields]
 */
function list_searcheable_acf(){
	$list_searcheable_acf = array("display_title", "display_date", "title", "what_this_means_for_takeda", "potential_actions", "article_title", "article_content");
	return $list_searcheable_acf;
}
/**
 * [advanced_custom_search search that encompasses ACF/advanced custom fields and taxonomies and split expression before request]
 * @param  [query-part/string]      $where    [the initial "where" part of the search query]
 * @param  [object]                 $wp_query []
 * @return [query-part/string]      $where    [the "where" part of the search query as we customized]
 * see https://vzurczak.wordpress.com/2013/06/15/extend-the-default-wordpress-search/
 * credits to Vincent Zurczak for the base query structure/spliting tags section
 */
function advanced_custom_search( $where, &$wp_query ) {
	global $wpdb;

	if ( empty( $where ))
		return $where;

	// get search expression
	$terms = $wp_query->query_vars[ 's' ];

	// explode search expression to get search terms
	$exploded = explode( ' ', $terms );
	if( $exploded === FALSE || count( $exploded ) == 0 )
		$exploded = array( 0 => $terms );

	// reset search in order to rebuilt it as we wish
	$where = '';

	// get searcheable_acf, a list of advanced custom fields you want to search content in
	$list_searcheable_acf = list_searcheable_acf();
	foreach( $exploded as $tag ) :
		$where .= " 
          AND (
            (wp_posts.post_title LIKE '%$tag%')
            OR (wp_posts.post_content LIKE '%$tag%')
            OR EXISTS (
              SELECT * FROM wp_postmeta
	              WHERE post_id = wp_posts.ID
	                AND (";
		foreach ($list_searcheable_acf as $searcheable_acf) :
			if ($searcheable_acf == $list_searcheable_acf[0]):
				$where .= " (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
			else :
				$where .= " OR (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
			endif;
		endforeach;
		$where .= ")
            )
            OR EXISTS (
              SELECT * FROM wp_comments
              WHERE comment_post_ID = wp_posts.ID
                AND comment_content LIKE '%$tag%'
            )
            OR EXISTS (
              SELECT * FROM wp_terms
              INNER JOIN wp_term_taxonomy
                ON wp_term_taxonomy.term_id = wp_terms.term_id
              INNER JOIN wp_term_relationships
                ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
              WHERE (
          		taxonomy = 'post_tag'
            		OR taxonomy = 'category'          		
            		OR taxonomy = 'myCustomTax'
          		)
              	AND object_id = wp_posts.ID
              	AND wp_terms.name LIKE '%$tag%'
            )
        )";
	endforeach;
	return $where;
}
add_filter( 'posts_search', 'advanced_custom_search', 500, 2 );

/**
 * Adds emphasis to the parts passed in $content that are equal to $search_query.
 *
 * @param $content The content to alter.
 * @param $search_query The search query to match against.
 *
 * @return string The emphasized text.
 */
function emphasize( $content, $search_query ) {
	$keys = array_map( 'preg_quote', explode(" ", $search_query ) );
	return preg_replace( '/(' . implode('|', $keys ) .')/iu', '<strong class="search__found-keywords">\0</strong>', $content );
}