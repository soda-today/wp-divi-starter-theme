<?php


class Sodadivi_Setup {
  /**
   * Loads post type related actions and filters
   *
   * @return void
   */
  public function load()
  {
		add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'load_scrips' ], 99 );
  }


  public function setup_theme() {
    // Make theme available for translation
    load_theme_textdomain( 'sodadivi', get_template_directory() . '/languages' );

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
    set_post_thumbnail_size( 1568, 9999 );

// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'sodadivi' ),
				'footer' => __( 'Footer Menu', 'sodadivi' ),
				'social' => __( 'Social Links Menu', 'sodadivi' ),
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
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 82,
				'width'       => 524,
				'flex-width'  => true,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'sodadivi' ),
					'shortName' => __( 'S', 'sodadivi' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'sodadivi' ),
					'shortName' => __( 'M', 'sodadivi' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'sodadivi' ),
					'shortName' => __( 'L', 'sodadivi' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'sodadivi' ),
					'shortName' => __( 'XL', 'sodadivi' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);


		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
  }

  public function load_scrips() {
		wp_enqueue_style( 'sodadivi-style', get_template_directory_uri() . '/dist/scss/style.css', array(), wp_get_theme()->get( 'Version' ) );
		wp_enqueue_script( 'sodadivi-script', get_template_directory_uri() . '/dist/js/main.js', array(), wp_get_theme()->get( 'Version' ), true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
  }

}
