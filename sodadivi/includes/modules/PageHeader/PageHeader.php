<?php

class SODADIVISHORT_PageHeader extends ET_Builder_Module {

	public $slug       = 'sodadivishort_page_header';
	public $vb_support = 'partial';

	protected $module_credits = array(
		'module_uri' => '',
		'author'     => 'Soda Studios',
		'author_uri' => 'https://soda.today',
	);

	public function init() {
		$this->name = esc_html__( 'Page Header', 'sodadividomain' );
		$this->advanced_fields = array(
			'link_options'   => [],
			'background'     => [],
			'border'         => [],
			'box_shadow'     => [],
			'button'         => [],
			'filters'        => [],
			'fonts'          => [],
			'margin_padding' => [],
			'max_width' 	   => [],
			'text'           => [],
			'text_shadow'    => [],
			'width' 				 => [],
		);
	}

	public function get_fields() {
		return array(
			'lead' => array(
				'label'           => esc_html__( 'Lead Text', 'sodadividomain' ),
				'type'            => 'textarea',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'sodadividomain' ),
				'toggle_slug'     => 'main_content',
			),
			'content' => array(
				'label'           => esc_html__( 'Content', 'sodadividomain' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'sodadividomain' ),
				'toggle_slug'     => 'main_content',
			),
			'header_images' => array(
				'label'            => esc_html__( 'Header Images', 'et_builder' ),
				'description'      => esc_html__( 'One of the header images is randomly picked and displayed.', 'et_builder' ),
				'type'             => 'upload-gallery',
				'computed_affects' => array(
					'__gallery',
				),
				'option_category'  => 'basic_option',
				'toggle_slug'      => 'main_content',
			),
			'lead_max_width' => array(
				'label'            => esc_html__( 'Text Max Width on Desktop', 'sodadividomain' ),
				'type'             => 'range',
				'unitless'        => true,
				'mobile_options'   => true,
				'default'          => 70,
				'allow_empty'      => false,
				'option_category'  => 'basic_option',
				'toggle_slug'      => 'main_content',
				'range_settings'   => array(
					'min'            	=> 30,
					'max'            	=> 100,
					'step'           	=> 5,
				),
			),
		);
	}

	// get the necessary header image information
	static function get_header_images( $args ) {

		$args = array(
			'include'        => $args['image_ids'],
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'post__in',
		);

		$images = [];
		$attachements = get_posts( $args );

		if( $attachements ) {

			foreach ( $attachements as $key => $val ) {

				$this_image = wp_get_attachment_image_src( $val->ID, 'full' );

				$images[$key]         = new stdClass();
				$images[$key]->url    = $this_image[0];
				$images[$key]->width  = $this_image[1];
				$images[$key]->height = $this_image[2];
				$images[$key]->alt    = get_post_meta( $val->ID, '_wp_attachment_image_alt', true);

			}

		}

		return $images;

	}

	public function render( $attrs, $content = null, $render_slug ) {

		// gather all header images
		if( $this->props['header_images'] ) {

			$header_images = $this->get_header_images( [
				'image_ids'     => explode( ",", $this->props['header_images'] ),
			]);
			$header_images = htmlspecialchars( json_encode($header_images) );

		}

		$lead    = $this->props['lead'];
		$content = $this->props['content'];
		$lead_max_width = $this->props['lead_max_width'];

		ob_start();
		$title_id = 'page-header-lead-'.uniqid();
		?>
			<style>
			@media(min-width: 700px) {
			.et-db #et-boc .et-l .et_pb_module .page-header__lead h1#<?php echo $title_id; ?> {
				 max-width: <?php echo $lead_max_width; ?>%;
				}
			}
			</style>
			<div <?php echo $this->module_id(); ?> class="<?php echo $this->module_classname($render_slug); ?>">
				<div class="page-header<?php echo isset($header_images) ? ' page-header--with-image' : ''; ?>">
					<?php if ( isset($header_images) ): ?>
						<div class="page-header__image">
							<div
								class="page-header__image__inner"
								data-images="<?php echo $header_images ?>"
							>
							</div>
						</div>
					<?php endif; ?>
					<div class="page-header__content">
						<div class="page-header__lead">
							<h1 id="<?php echo $title_id; ?>"><?php echo $lead; ?></h1>
						</div>
						<div><?php echo $content; ?></div>
					</div>
				</div>
			</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
}

new SODADIVISHORT_PageHeader;
