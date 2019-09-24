<?php

class SODADIVISHORT_MyCustomHeadline extends ET_Builder_Module {

	public $slug       = 'disodadivishort_custom_headline';
	public $vb_support = 'partial';

	protected $module_credits = array(
		'module_uri' => '',
		'author'     => 'Soda Studios',
		'author_uri' => 'https://soda.today',
	);

	public function init() {
		$this->name = esc_html__( 'Custom Headline', 'sodadividomain' );
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
			'font-size'           => array(
				'label'            => esc_html__( 'Font Size', 'sodadividomain' ),
				'type'             => 'range',
				'mobile_options'   => false,
				'default'          => 20,
				'allow_empty'      => false,
				'option_category'  => 'basic_option',
				'description'      => esc_html__( 'Font Size in vw.', 'sodadividomain' ),
				'toggle_slug'      => 'main_content',
				'range_settings'   => array(
					'min'            	=> 1,
					'max'            	=> 100,
					'step'           	=> 1,
				),
      ),
			'headline-content' => array(
				'label'           => esc_html__( 'Content', 'sodadividomain' ),
				'type'            => 'textarea',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'sodadividomain' ),
				'toggle_slug'     => 'toggle',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {

    $content   = $this->props['headline-content'];
    $font_size = $this->props['font-size'];

		$output = sprintf(
			'<div%3$s class="%2$s">
				<div class="page-header">
					<p style="font-size: %4$svw;">%1$s</p>
				</div>
			</div>',
			$content,
			$this->module_classname($render_slug),
      $this->module_id(),
      $font_size
		);

		return $output;
	}
}

new SODADIVISHORT_MyCustomHeadline;
