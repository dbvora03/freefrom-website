<?php
/**
 * FreeFrom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FreeFrom
 */

if ( ! defined( 'FREEFROM_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'FREEFROM_VERSION', '1.0.0' );
}

if ( ! function_exists( 'freefrom_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function freefrom_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on FreeFrom, use a find and replace
		 * to change 'freefrom' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'freefrom', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'freefrom' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Theme support for full-width blocks.
		add_theme_support( 'align-wide' );

		// Theme support for custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 170,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		// Disable Custom Colors
		add_theme_support( 'disable-custom-colors' );

		// Editor Color Palette
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => __( 'Black', 'freefrom' ),
				'slug'  => 'black',
				'color'	=> '#000',
			),
			array(
				'name'  => __( 'White', 'freefrom' ),
				'slug'  => 'white',
				'color' => '#FFF',
			),
			array(
				'name'  => __( 'Yellow', 'freefrom' ),
				'slug'  => 'yellow',
				'color' => '#FFB600',
			),
			array(
				'name'	=> __( 'Pink', 'freefrom' ),
				'slug'	=> 'pink',
				'color'	=> '#FF9797',
			),
			array(
				'name'	=> __( 'Orange', 'freefrom' ),
				'slug'	=> 'orange',
				'color'	=> '#F06449',
			),
			array(
				'name'	=> __( 'Teal', 'freefrom' ),
				'slug'	=> 'teal',
				'color'	=> '#47CCCC',
			),
			array(
				'name'	=> __( 'Dark Grey', 'freefrom' ),
				'slug'	=> 'dark-grey',
				'color'	=> '#404040',
			),
			array(
				'name'	=> __( 'Off White', 'freefrom' ),
				'slug'	=> 'off-white',
				'color'	=> '#F5F6F4',
			),
		) );
	}
endif;
add_action( 'after_setup_theme', 'freefrom_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function freefrom_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'freefrom_content_width', 640 );
}
add_action( 'after_setup_theme', 'freefrom_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function freefrom_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 1', 'freefrom' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Left column of the footer.', 'freefrom' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 2', 'freefrom' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Middle column of the footer.', 'freefrom' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 3', 'freefrom' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Right column of the footer.', 'freefrom' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'freefrom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function freefrom_scripts() {
	wp_enqueue_style( 'freefrom-style', get_stylesheet_uri(), array(), FREEFROM_VERSION );
	wp_style_add_data( 'freefrom-style', 'rtl', 'replace' );

	wp_enqueue_script( 'freefrom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), FREEFROM_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'freefrom_scripts' );

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

/** Initialize block pattern category */
function freefrom_register_block_pattern_categories() {
	register_block_pattern_category(
		'freefrom',
		array( 'label' => __( 'FreeFrom', 'freefrom' ) )
	);
}

add_action( 'init', 'freefrom_register_block_pattern_categories' );

/** Initialize block patterns */
function freefrom_register_block_patterns() {

	if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {

		register_block_pattern(
			'freefrom/image-cta',
			array(
				'title'       => 'Image CTA',
				'categories'    => array( 'freefrom' ),
				'content'     => "<!-- wp:columns --> <div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"33.33%\"} --> <div class=\"wp-block-column\" style=\"flex-basis:33.33%\"><!-- wp:image {\"id\":7,\"width\":236,\"height\":133,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} --> <figure class=\"wp-block-image size-large is-resized\"><img src=\"http://localhost/wordpress/wp-content/uploads/2021/05/background-1024x576.jpg\" alt=\"\" class=\"wp-image-7\" width=\"236\" height=\"133\"/></figure> <!-- /wp:image --></div> <!-- /wp:column --> <!-- wp:column {\"width\":\"98.66%\"} --> <div class=\"wp-block-column\" style=\"flex-basis:98.66%\"><!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":22},\"color\":{\"background\":\"#febd00\"}},\"textColor\":\"white\"} --> <p class=\"has-white-color has-text-color has-background\" style=\"background-color:#febd00;font-size:22px\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non mattis lacus, vel hendrerit nisi.</p> <!-- /wp:paragraph --></div> <!-- /wp:column --></div> <!-- /wp:columns -->"
			)
		);

		register_block_pattern(
			'freefrom/impact-cta',
			array(
				'title'       => 'Impact CTA',
				'content'     => "<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"cyan-bluish-gray\"} --> <div class=\"wp-block-group alignfull has-cyan-bluish-gray-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns --> <div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"66.66%\"} --> <div class=\"wp-block-column\" style=\"flex-basis:66.66%\"><!-- wp:paragraph --> <p><strong>Intimate partner violence is a structural issue.  We need to stop addressing it with bandaids.</strong></p> <!-- /wp:paragraph --></div> <!-- /wp:column --> <!-- wp:column {\"width\":\"33.33%\"} --> <div class=\"wp-block-column\" style=\"flex-basis:33.33%\"><!-- wp:buttons --> <div class=\"wp-block-buttons\"><!-- wp:button {\"backgroundColor\":\"luminous-vivid-amber\",\"textColor\":\"white\"} --> <div class=\"wp-block-button\"><a class=\"wp-block-button__link has-white-color has-luminous-vivid-amber-background-color has-text-color has-background\">Learn More</a></div> <!-- /wp:button --></div> <!-- /wp:buttons --></div> <!-- /wp:column --></div> <!-- /wp:columns --></div></div> <!-- /wp:group -->"
			)
		);

		register_block_pattern(
			'freefrom/featured-cta-bottom',
			array(
				'title'       => 'Featured CTA (Bottom)',
				'content'     => "<!-- wp:group {\"backgroundColor\":\"pale-pink\",\"textColor\":\"white\"} -->\n<div class=\"wp-block-group has-white-color has-pale-pink-background-color has-text-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"id\":34,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"https://freefrom.mystagingwebsite.com/wp-content/uploads/2021/04/masked-crowd-771x771.png\" alt=\"\" class=\"wp-image-34\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":3} -->\n<h3>Survivors know best</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>How to disrupt intimate partner violence during COVID-19 and beyond</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"contentJustification\":\"right\"} -->\n<div class=\"wp-block-buttons is-content-justification-right\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">Read our report</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:group -->"
			)
		);

		register_block_pattern(
			'freefrom/two-column-call-outs',
			array(
				'title'       => '2-Column Call-Outs',
				'content'     => "<!-- wp:group -->\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3,\"textColor\":\"pale-pink\"} -->\n<h3 class=\"has-pale-pink-color has-text-color\">Myth</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Our society thinks of intimate partner violence as happening over days and weeks and so our solutions offer only temporary relief.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3,\"textColor\":\"pale-cyan-blue\"} -->\n<h3 class=\"has-pale-cyan-blue-color has-text-color\">Fact</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Intimate partner violence happens over years and generations.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"backgroundColor\":\"luminous-vivid-amber\",\"textColor\":\"white\"} -->\n<p class=\"has-white-color has-luminous-vivid-amber-background-color has-text-color has-background\">Freefrom is reframing IPV as a structural economic issue that intersects with other systems of oppression.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->"
			)
		);

		register_block_pattern(
			'freefrom/stats',
			array(
				'title'       => 'Statistics',
				'content'     => "<!-- wp:group -->\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"verticalAlignment\":null} -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"46.33%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:46.33%\"><!-- wp:paragraph {\"align\":\"right\",\"style\":{\"typography\":{\"fontSize\":86}},\"textColor\":\"pale-cyan-blue\"} -->\n<p class=\"has-text-align-right has-pale-cyan-blue-color has-text-color\" style=\"font-size:86px\"><strong>$2.1MM+</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"52%\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:52%\"><!-- wp:paragraph -->\n<p><strong>Total cash we\'ve distributed to survivors through our safety fund, savings matching program, and social enterprise</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:columns {\"verticalAlignment\":null} -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"46.33%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:46.33%\"><!-- wp:paragraph {\"align\":\"right\",\"style\":{\"typography\":{\"fontSize\":86}},\"textColor\":\"luminous-vivid-orange\"} -->\n<p class=\"has-text-align-right has-luminous-vivid-orange-color has-text-color\" style=\"font-size:86px\"><strong>15k+</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"52%\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:52%\"><!-- wp:paragraph -->\n<p><strong>Survivors served by our various programs and resources</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:columns {\"verticalAlignment\":null} -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"46.33%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:46.33%\"><!-- wp:paragraph {\"align\":\"right\",\"style\":{\"typography\":{\"fontSize\":86}},\"textColor\":\"luminous-vivid-amber\"} -->\n<p class=\"has-text-align-right has-luminous-vivid-amber-color has-text-color\" style=\"font-size:86px\"><strong>500+</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"52%\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:52%\"><!-- wp:paragraph -->\n<p><strong>Nonprofit, corporate, government, and philanthropic partners in our network</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->"
			)
		);

		register_block_pattern(
			'freefrom/impact-statement',
			array(
				'title'       => 'Impact Statement',
				'content'     => "<!-- wp:group {\"backgroundColor\":\"pale-cyan-blue\"} -->\n<div class=\"wp-block-group has-pale-cyan-blue-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":28}},\"textColor\":\"white\"} -->\n<p class=\"has-white-color has-text-color\" style=\"font-size:28px\"><strong>GET CASH DIRECTLY TO SURVIVORS</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"backgroundColor\":\"luminous-vivid-amber\"} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-luminous-vivid-amber-background-color has-background\">Donate</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:quote {\"className\":\"is-style-large\"} -->\n<blockquote class=\"wp-block-quote is-style-large\"><p>The cash came just in time to fix my car.  Not having a vehicle makes it difficult to get groceries (I use EBT so I can\'t order online). [...] So, the timing of this grant was a huge relief!</p></blockquote>\n<!-- /wp:quote --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->"
			)
		);


		register_block_pattern(
			'freefrom/featured-cta-top',
			array(
				'title'       => 'Featured CTA (Top)',
				'content'     => "<!-- wp:group {\"style\":{\"color\":{\"background\":\"#ffa09e\"}},\"textColor\":\"white\"} -->\n<div class=\"wp-block-group has-white-color has-text-color has-background\" style=\"background-color:#ffa09e\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"id\":64,\"width\":759,\"height\":497,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large is-resized\"><img src=\"https://freefrom.mystagingwebsite.com/wp-content/uploads/2021/05/LFP_Summer19_FreeFrom_SurvivorWealth_IMG_1621_edit-1-1.png\" alt=\"\" class=\"wp-image-64\" width=\"759\" height=\"497\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":3,\"fontSize\":\"large\"} -->\n<h3 class=\"has-large-font-size\">Growing our Collective Power →</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":24}}} -->\n<p style=\"font-size:24px\">Creating tools, resources and environments to support survivors\' collective economic and community power.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->"
			)
    );

		register_block_pattern(
			'freefrom/featured-media-panel',
			array(
				'title'       => 'Featured Media Panel',
				'content'     => "<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"cyan-bluish-gray\"} -->\n<div class=\"wp-block-group alignfull has-cyan-bluish-gray-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:embed {\"url\":\"https://vimeo.com/358545074\",\"type\":\"video\",\"providerNameSlug\":\"vimeo\",\"responsive\":true,\"className\":\"wp-embed-aspect-16-9 wp-has-aspect-ratio\"} -->\n<figure class=\"wp-block-embed is-type-video is-provider-vimeo wp-block-embed-vimeo wp-embed-aspect-16-9 wp-has-aspect-ratio\"><div class=\"wp-block-embed__wrapper\">\nhttps://vimeo.com/358545074\n</div><figcaption>Video caption</figcaption></figure>\n<!-- /wp:embed -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"textAlign\":\"right\",\"style\":{\"typography\":{\"fontSize\":65}}} -->\n<h2 class=\"has-text-align-right\" style=\"font-size:65px\">Survivor Wealth Summit 2019</h2>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph -->\n<p>The 2019 Survivor Wealth Summit was a two-day convening, bringing together survivors, gender-based violence movement leaders and activists, asset building experts, funders, policy makers and key stakeholders to innovate, cross-pollinate, and build an ecosystem to support financial security and long-term safety for everyone.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Please check back in September for more information on our 2022 Survivor Wealth Summit or subscribe to our newsletter to be the first to know when tickets are available.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">Learn More</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->"
			)
		);
		
		register_block_pattern(
			'freefrom/video-w-statement',
			array(
				'title'       => 'Video w/ Statement',
				'content'     => "<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"cyan-bluish-gray\"} -->\n<div class=\"wp-block-group alignfull has-cyan-bluish-gray-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"verticalAlignment\":null} -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"verticalAlignment\":\"top\"} -->\n<div class=\"wp-block-column is-vertically-aligned-top\"><!-- wp:heading {\"textAlign\":\"right\",\"align\":\"wide\",\"style\":{\"typography\":{\"fontSize\":72}}} -->\n<h2 class=\"alignwide has-text-align-right\" style=\"font-size:72px\">Everyone Has a Part to Play</h2>\n<!-- /wp:heading -->\n\n<!-- wp:separator {\"color\":\"pale-cyan-blue\",\"className\":\"is-style-default\"} -->\n<hr class=\"wp-block-separator has-text-color has-background has-pale-cyan-blue-background-color has-pale-cyan-blue-color is-style-default\"/>\n<!-- /wp:separator --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:embed {\"url\":\"https://www.youtube.com/watch?v=u_vN-kZV9kY\",\"type\":\"video\",\"providerNameSlug\":\"youtube\",\"responsive\":true,\"className\":\"wp-embed-aspect-16-9 wp-has-aspect-ratio\"} -->\n<figure class=\"wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio\"><div class=\"wp-block-embed__wrapper\">\nhttps://www.youtube.com/watch?v=u_vN-kZV9kY\n</div></figure>\n<!-- /wp:embed --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->"
			)
		);
		
		register_block_pattern(
			'freefrom/image-w-paragraph',
			array(
				'title'       => 'Image w/ Paragraph',
				'content'     => "<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"cyan-bluish-gray\"} -->\n<div class=\"wp-block-group alignfull has-cyan-bluish-gray-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3} -->\n<h3>Our Team</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Starting from within, we are building an ecosystem of support rooted in respect for the wisdom of survivors who always know best what we need and how to innovate solutions to meet those needs.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">Learn more about our team</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":85,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"https://freefrom.mystagingwebsite.com/wp-content/uploads/2021/05/LFP_Summer19_FreeFrom_SurvivorWealth_IMG_2161_edit-2.png\" alt=\"\" class=\"wp-image-85\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->"
			)
			);
		
		register_block_pattern(
			'freefrom/detailed-image-grid',
			array(
				'title'       => 'Detailed Image Grid',
				'content'     => "<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":92,\"width\":256,\"sizeSlug\":\"large\",\"linkDestination\":\"none\",\"className\":\"is-style-rounded\"} -->\n<figure class=\"wp-block-image size-large is-resized is-style-rounded\"><img src=\"https://freefrom.mystagingwebsite.com/wp-content/uploads/2021/05/pexels-karolina-grabowska-7875836-edited-3-scaled.jpg\" alt=\"\" class=\"wp-image-92\" width=\"256\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph -->\n<p><strong>SONYA PASSI</strong><br>Founder and CEO<br><em>She / Her / Hers</em><br>sonya.passi[at]freefrom.org</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">More about Sonya</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":92,\"width\":256,\"sizeSlug\":\"large\",\"linkDestination\":\"none\",\"className\":\"is-style-rounded\"} -->\n<figure class=\"wp-block-image size-large is-resized is-style-rounded\"><img src=\"https://freefrom.mystagingwebsite.com/wp-content/uploads/2021/05/pexels-karolina-grabowska-7875836-edited-3-scaled.jpg\" alt=\"\" class=\"wp-image-92\" width=\"256\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph -->\n<p><strong>SONYA PASSI</strong><br>Founder and CEO<br><em>She / Her / Hers</em><br>sonya.passi[at]freefrom.org</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">More about Sonya</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":92,\"width\":256,\"sizeSlug\":\"large\",\"linkDestination\":\"none\",\"className\":\"is-style-rounded\"} -->\n<figure class=\"wp-block-image size-large is-resized is-style-rounded\"><img src=\"https://freefrom.mystagingwebsite.com/wp-content/uploads/2021/05/pexels-karolina-grabowska-7875836-edited-3-scaled.jpg\" alt=\"\" class=\"wp-image-92\" width=\"256\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph -->\n<p><strong>SONYA PASSI</strong><br>Founder and CEO<br><em>She / Her / Hers</em><br>sonya.passi[at]freefrom.org</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">More about Sonya</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->"
			)
		);

		register_block_pattern(
			'freefrom/copy-grid',
			array(
				'title'       => 'Copy Grid',
				'content'     => "<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph -->\n<p><strong>Colin Cabral</strong><br>Proskauer Rose LLP <br><em>Los Angeles, CA</em></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph -->\n<p><strong>Colin Cabral</strong><br>Proskauer Rose LLP<br><em>Los Angeles, CA</em></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph -->\n<p><strong>Colin Cabral</strong><br>Proskauer Rose LLP<br><em>Los Angeles, CA</em></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph -->\n<p><strong>Colin Cabral</strong><br>Proskauer Rose LLP<br><em>Los Angeles, CA</em></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->"
			)
		);
		
		register_block_pattern(
			'freefrom/preview-cta',
			array(
				'title'       => 'Preview CTA',
				'content'     => "<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"41%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:41%\"><!-- wp:image {\"id\":7,\"width\":339,\"height\":191,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large is-resized\"><img src=\"http://localhost/wordpress/wp-content/uploads/2021/05/background-1024x576.jpg\" alt=\"\" class=\"wp-image-7\" width=\"339\" height=\"191\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"52%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:52%\"><!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":22}},\"textColor\":\"black\"} -->\n<p class=\"has-black-color has-text-color\" style=\"font-size:22px\"><strong>Campaigns Director</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Full-time director level position</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">Apply Here</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->"
			)
		);
		
		register_block_pattern(
			'freefrom/four-column-call-outs',
			array(
				'title'       => '4-Column Call-Outs',
				'content'     => "<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"align\":\"center\",\"id\":41,\"width\":100,\"height\":100,\"sizeSlug\":\"large\",\"linkDestination\":\"none\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"aligncenter size-large is-resized\"><img src=\"https://freefrom.mystagingwebsite.com/wp-content/uploads/2021/04/pexels-photo-2559941-1-771x514.jpeg\" alt=\"brown mountains\" class=\"wp-image-41\" width=\"100\" height=\"100\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\"><strong>BRING YOUR KIDS TO WORK POLICY</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"align\":\"center\",\"id\":41,\"width\":100,\"height\":100,\"sizeSlug\":\"large\",\"linkDestination\":\"none\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"aligncenter size-large is-resized\"><img src=\"https://freefrom.mystagingwebsite.com/wp-content/uploads/2021/04/pexels-photo-2559941-1-771x514.jpeg\" alt=\"brown mountains\" class=\"wp-image-41\" width=\"100\" height=\"100\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\"><strong>100% COVERED HEALTH, VISION, AND DENTAL INSURANCE</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"align\":\"center\",\"id\":41,\"width\":100,\"height\":100,\"sizeSlug\":\"large\",\"linkDestination\":\"none\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"aligncenter size-large is-resized\"><img src=\"https://freefrom.mystagingwebsite.com/wp-content/uploads/2021/04/pexels-photo-2559941-1-771x514.jpeg\" alt=\"brown mountains\" class=\"wp-image-41\" width=\"100\" height=\"100\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\"><strong>UNLIMITED MENSTRUAL LEAVE</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"align\":\"center\",\"id\":41,\"width\":100,\"height\":100,\"sizeSlug\":\"large\",\"linkDestination\":\"none\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"aligncenter size-large is-resized\"><img src=\"https://freefrom.mystagingwebsite.com/wp-content/uploads/2021/04/pexels-photo-2559941-1-771x514.jpeg\" alt=\"brown mountains\" class=\"wp-image-41\" width=\"100\" height=\"100\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\"><strong>GENDER BASED VIOLENCE PAID AND PROTECTED LEAVE</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->"
			)
		);
		
		register_block_pattern(
			'freefrom/three-column-call-outs',
			array(
				'title'       => '3-Column Call-Outs',
				'content'     => "<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":34,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"https://freefrom.mystagingwebsite.com/wp-content/uploads/2021/04/masked-crowd-771x771.png\" alt=\"\" class=\"wp-image-34\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph -->\n<p><strong>EVENT NAME</strong><br>August 14, 2021<br>9:00a - 5:00p (PST)</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"backgroundColor\":\"luminous-vivid-amber\",\"className\":\"is-style-fill\"} -->\n<div class=\"wp-block-button is-style-fill\"><a class=\"wp-block-button__link has-luminous-vivid-amber-background-color has-background\">Register</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":34,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"https://freefrom.mystagingwebsite.com/wp-content/uploads/2021/04/masked-crowd-771x771.png\" alt=\"\" class=\"wp-image-34\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph -->\n<p><strong>EVENT NAME</strong><br>August 14, 2021<br>9:00a - 5:00p (PST)</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"backgroundColor\":\"luminous-vivid-amber\",\"className\":\"is-style-fill\"} -->\n<div class=\"wp-block-button is-style-fill\"><a class=\"wp-block-button__link has-luminous-vivid-amber-background-color has-background\">Register</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":34,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"https://freefrom.mystagingwebsite.com/wp-content/uploads/2021/04/masked-crowd-771x771.png\" alt=\"\" class=\"wp-image-34\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph -->\n<p><strong>EVENT NAME</strong><br>August 14, 2021<br>9:00a - 5:00p (PST)</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"backgroundColor\":\"luminous-vivid-amber\",\"className\":\"is-style-fill\"} -->\n<div class=\"wp-block-button is-style-fill\"><a class=\"wp-block-button__link has-luminous-vivid-amber-background-color has-background\">Register</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->"
			)
		);
		
		register_block_pattern(
			'freefrom/image-w-cta',
			array(
				'title'       => 'Image w/ CTA',
				'content'     => "<!-- wp:group {\"style\":{\"color\":{\"background\":\"#e8e8e8\"}}} -->\n<div class=\"wp-block-group has-background\" style=\"background-color:#e8e8e8\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"id\":55,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"https://freefrom.mystagingwebsite.com/wp-content/uploads/2021/05/Union.png\" alt=\"\" class=\"wp-image-55\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":24}}} -->\n<p style=\"font-size:24px\"><strong>See how your state scores for survivor wealth →</strong></p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->"
			)
		);

		register_block_pattern(
			'freefrom/topic-detail-panel',
			array(
				'title'       => 'Topic Detail Panel',
				'content'     => "<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"37%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:37%\"><!-- wp:image {\"id\":7,\"width\":299,\"height\":168,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large is-resized\"><img src=\"http://localhost/wordpress/wp-content/uploads/2021/05/background-1024x576.jpg\" alt=\"\" class=\"wp-image-7\" width=\"299\" height=\"168\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"59%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:59%\"><!-- wp:paragraph {\"textColor\":\"black\",\"fontSize\":\"large\"} -->\n<p class=\"has-black-color has-text-color has-large-font-size\"><strong>Growing Our Collective Power</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":19}}} -->\n<p style=\"font-size:19px\">Creating tools, resources, and environments to support survivors\' collective economic and community power.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph -->\n<p><strong>SAVINGS MATCHING PROGRAM</strong><br>Our savings matching program supports survivors in building up to $500 in emergency savings over 6 months.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"textColor\":\"vivid-cyan-blue\"} -->\n<p class=\"has-vivid-cyan-blue-color has-text-color\"><strong>→ LEARN MORE</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><strong>SAVINGS MATCHING PROGRAM</strong><br>Our savings matching program supports survivors in building up to $500 in emergency savings over 6 months.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"textColor\":\"vivid-cyan-blue\"} -->\n<p class=\"has-vivid-cyan-blue-color has-text-color\"><strong>→ LEARN MORE</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><strong>SAVINGS MATCHING PROGRAM</strong><br>Our savings matching program supports survivors in building up to $500 in emergency savings over 6 months.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"textColor\":\"vivid-cyan-blue\"} -->\n<p class=\"has-vivid-cyan-blue-color has-text-color\"><strong>→ LEARN MORE</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph -->\n<p><strong>SAVINGS MATCHING PROGRAM</strong><br>Our savings matching program supports survivors in building up to $500 in emergency savings over 6 months.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"textColor\":\"vivid-cyan-blue\"} -->\n<p class=\"has-vivid-cyan-blue-color has-text-color\"><strong>→ LEARN MORE</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><strong>SAVINGS MATCHING PROGRAM</strong><br>Our savings matching program supports survivors in building up to $500 in emergency savings over 6 months.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"textColor\":\"vivid-cyan-blue\"} -->\n<p class=\"has-vivid-cyan-blue-color has-text-color\"><strong>→ LEARN MORE</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><strong>SAVINGS MATCHING PROGRAM</strong><br>Our savings matching program supports survivors in building up to $500 in emergency savings over 6 months.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"textColor\":\"vivid-cyan-blue\"} -->\n<p class=\"has-vivid-cyan-blue-color has-text-color\"><strong>→ LEARN MORE</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":119,\"width\":401,\"height\":142,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large is-resized\"><img src=\"https://freefrom.mystagingwebsite.com/wp-content/uploads/2021/05/LFP_Summer19_FreeFrom_SurvivorWealth_IMG_1621_edit-1-1-edited.png\" alt=\"\" class=\"wp-image-119\" width=\"401\" height=\"142\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:image {\"id\":120,\"width\":403,\"height\":146,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large is-resized\"><img src=\"https://freefrom.mystagingwebsite.com/wp-content/uploads/2021/05/masked-crowd-edited.png\" alt=\"\" class=\"wp-image-120\" width=\"403\" height=\"146\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:image {\"id\":121,\"width\":403,\"height\":149,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large is-resized\"><img src=\"https://freefrom.mystagingwebsite.com/wp-content/uploads/2021/05/LFP_Summer19_FreeFrom_SurvivorWealth_IMG_2161_edit-2-edited.png\" alt=\"\" class=\"wp-image-121\" width=\"403\" height=\"149\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->"
			)
		);

	}

}
add_action( 'init', 'freefrom_register_block_patterns' );
