<?php

class SODADIVISHORT_DiviLoader extends DiviExtension {

	/**
	 * The gettext domain for the extension's translations.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $gettext_domain = 'sodadividomain';

	/**
	 * The extension's WP Plugin name.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $name = 'divi-sodadividomain';

	/**
	 * The extension's version
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $version = '1.0.0';

	/**
	 * DIsodadivishort_DiviGroteskMedium constructor.
	 *
	 * @param string $name
	 * @param array  $args
	 */
	public function __construct( $name = 'divi-sodadividomain', $args = array() ) {
		$this->plugin_dir     = plugin_dir_path( __FILE__ );
		$this->plugin_dir_url = get_template_directory_uri() . '/';

		parent::__construct( $name, $args );
	}


	/**
	 * Overwrite the function so no additional scripts are being loaded
	 */
	public function wp_hook_enqueue_scripts() {}
}

new SODADIVISHORT_DiviLoader;
